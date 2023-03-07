<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Developer;

class HomeController extends BaseController {
	/**
	 * 主站控制器
	 */
	public function aboutPage() {
		/**
		 * 关于页面
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 * 返回值为一个视图
		 */
		$developers = Developer::all();
		$dev=[];
		foreach ($developers as $developer) {
			$dev[]=[
				'id'=>$developer->id,
				'name'=>$developer->user->username,
				'job'=>$developer->job,
				'github'=>$developer->github,
				'qq'=>$developer->user->qq,
				'avatar'=>UserController::getAvatar($developer->user->id),
				];
		}
		return view('about', ['developers' => $dev]);
	}
}
