<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\Post;
use GuzzleHttp\Psr7\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class PostController extends BaseController{
	static public function postPreview(int $pid){ //根据pid获取两个最新的动态
		$posts = Post::where(['pid'=>$pid,'is_active'=>1])
			-> orderByDesc('created_at')
			-> limit(2)
			-> get();
	}

	static public function createPosts(Request $request){
		if(Auth::check()){ //验证是否登陸
			$uid = Auth::id();
			$credentials = $request->validate([
				'content' => ['required'],
			],[
				'content.requried' => '发布动态的文字不能为空哦',
			]);
			//验证通过，发布动态
			$post = Post();
			$post -> uid = $credentials['uid'];
			$post -> pid = $credentials['pid'];
			$post -> content = $credentials['content'];
			$post -> img = $credentials['img'];
			$post -> is_active = 1;
			$post -> save();
			return back();
		}
		return redirect("/Login");
	}

	static public function deletePosts(Request $request,$post){
		$post=intval($post);
		if(Post::find($post)->first()->uid==Auth::id()){
			Post::where('id',$post) -> update(['is_active'=>0]);
			return back() -> with('success');
		}
		return false;

	}

}
