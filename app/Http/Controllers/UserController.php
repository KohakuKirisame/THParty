<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class UserController extends BaseController{
	/*
	 * 用户控制器
	 */
	public function login(Request $request){
		/*
		 * 登录
		 * @param Request $request
		 * 参数为请求，包含用户名和密码
		 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
		 * 返回值为一个重定向
		 */
		if(Auth::check()){
			//已登录，返回上一页
			return back();
		}else{
			//未登录，验证登录信息
			$credentials = $request->validate([
				//验证规则，用户名和密码不能为空，密码最小长度为8
				'username' => ['required', 'max:255'],
				'password' => ['required', 'min:8'],
			]);
			//验证通过，尝试登录
			if(Auth::attempt($credentials)){
				//登录成功，重定向
				$request->session()->regenerate();
				return redirect();
			}
			//登录失败，返回上一页
			return back()->withErrors([
				//错误信息
				'username' => [
					'required' => '用户名不能为空',
					'max' => '用户名最大长度为255',
				],
				'password' => [
					'required' => '密码不能为空',
					'min' => '密码最小长度为8',
				],
			])->withInput();
		}
	}

	public function logout(Request $request){
		/*
		 * 登出
		 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
		 * 返回值为一个重定向
		 */
		if(Auth::check()){
			//已登录，登出
			Auth::logout();
			$request->session()->invalidate();
			$request->session()->regenerateToken();
		}
		//返回上一页
		return back();
	}

	public function register(Request $request){
		/*
		 * 注册
		 * @param Request $request
		 * 参数为请求，包含用户名和密码
		 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
		 * 返回值为一个重定向
		 */
		if(Auth::check()){
			//已登录，返回上一页
			return back();
		}else{
			//未登录，验证注册信息
			$credentials = $request->validate([
				//验证规则，用户名和密码不能为空，密码最小长度为8
				'username' => ['required', 'max:255'],
				'captcha' => ['required'],
				'phone' => ['required'],
				'password' => ['required', 'min:8'],
			]);
			//验证通过，尝试注册
			$user=new User();
			$user->username=$credentials['username'];
			$user->phone=$credentials['phone'];
			$user->password=Hash::make($credentials['password']);
			if($user->save()){
				//注册成功，重定向
				$request->session()->regenerate();
				return redirect();
			}
			//注册失败，返回上一页
			return back()->withErrors([
				//错误信息
				'username' => [
					'required' => '用户名不能为空',
					'max' => '用户名最大长度为255',
				],
				'password' => [
					'required' => '密码不能为空',
					'min' => '密码最小长度为8',
				],
			])->withInput();
		}
	}
}
