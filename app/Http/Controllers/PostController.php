<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class PostController extends BaseController{
	static public function postPreview(int $pid){ //根据pid获取两个最新的动态
		$posts = Post::where(['pid'=>$pid,'is_active'=>1])
			-> orderByDesc('created_at')
			-> limit(2)
			-> get();
		return $posts;
	}

	public function createPosts(Request $request){
		if(Auth::check()){ //验证是否登陸
			$uid = Auth::id();
			$credentials = $request->validate([
				'content' => ['required'],
			],[
				'content.requried' => '发布动态的文字不能为空哦',
			]);
			//验证通过，发布动态
			$post = new Post();
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

	public function deletePosts(Request $request,$post){
		$post=intval($post);
		if(Post::find($post)->first()->uid==Auth::id()){
			Post::where('id',$post) -> update(['is_active'=>0]);
			return back() -> with('success');
		}
		return false;

	}

	static public function getPosts(int $pid){
		$posts = Post::where(['pid'=>$pid,'is_active'=>1])
			-> orderByDesc('created_at')
			-> paginate(10);
		return $posts;
	}

	public function newComment(Request $request, $pid){
		$uid=Auth::id();
		$credentials = $request->validate([
			'content' => ['required'],
		],[
			'content.requried' => '发布评论的文字不能为空哦',
		]);
		//验证通过，发布评论
		$comment = new Comment();
		$comment -> uid = $uid;
		$comment -> pid = intval($pid);
		$comment -> content = $credentials['content'];
		$comment -> is_active = 1;
		$comment -> save();
	}

}
