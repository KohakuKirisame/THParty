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
		/**
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
			],[
				//错误信息
				'username.required' => '用户名不能为空',
				'username.max' => '用户名最大长度为255',
				'password.required' => '密码不能为空',
				'password.min' => '密码最小长度为8',
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
				'login' => '用户名或密码错误',
			])->withInput();
		}
	}

	public function logout(Request $request){
		/**
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
		/**
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
	public function changeUserInfo(Request $request) {
		/**
		 * 更改用户名
		 * @param Request $request
		 * 包含修改后的 用户名、邮箱、QQ号、个人简介、个人签名
		 * @return \Illuminate\Routing\Redirector
		 * 返回重定向
		 */
		if (Auth::check()) {
			$uid = Auth::id();
			$credentials = $request->validate([
				'username' => ['required', 'max:255'],
				'email' => ['required', 'email', 'max:255'],
				'qq' => ['numeric','integer','min:100000','max:9999999999999'],
				'introduction' => [],
				'sign' => ['max:255']
			],[
				'username.required' => '你是？',
				'username.max' => '名称过长',
				'email.required' => '幻想乡也有邮箱啦',
				'email.max' => '就没有短一点的邮箱吗',
				'qq.numeric' => '你这QQ丁真吗',
				'qq.max' => '你这QQ丁真吗',
				'sign' => '短些撒'
			]);
			$u = User::where(["id"=>$uid])->first();
			$u->username = $credentials['username'];
			$u->email = $credentials['email'];
			$u->qq = $credentials['qq'];
			$u->introduction = $credentials['introduction'];
			$u->sign = $credentials['sign'];
			$u->save();
			return back()->with('message','修改成功喵！');
		}
		return back()->with('message','操作被摩多罗神必吞掉了，，，');
	}
}
