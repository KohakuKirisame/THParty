<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StaffController extends BaseController {
	/**
	 * Staff控制器
	 */
	public function creatStaff(Request $request) {
		/**
		 * 创建Staff
		 * @param Request $request
		 * 参数为请求，包含Staff信息
		 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
		 * 返回值为一个重定向
		 */
		if(Auth::check()) { //验证登录
			$uid = Auth::id(); //获取用户ID
			$credentials = $request->validate([
				/**
				 * 验证规则:
				 *
				 */
				/**
				 * 'uid' => ['required', 'max:255'],
				 * 'pid => ['max:255'],
				 * 'role' => ['required', 'numeric', 'min:0', 'max:2'],
				 * 'previlege' => ['required','date'],
				 * ],[
				 * 暂时不会写验证*/
			]);
			$staff = new Staff();
			$staff->uid = $credentials['uid'];
			$staff->pid = $credentials['pid'];
			$staff->role = $credentials['role'];
			$staff->privilege = $credentials['privilege'];
			$staff->save();
			return redirect();
		}
	}
}
