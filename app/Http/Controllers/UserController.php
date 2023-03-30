<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Participant;
use App\Models\Party;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Qcloud\Cos\Client;
use TencentCloud\Sms\V20210111\SmsClient;
use TencentCloud\Sms\V20210111\Models\SendSmsRequest;
use TencentCloud\Common\Exception\TencentCloudSDKException;
use TencentCloud\Common\Credential;

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
				'phone' => ['required', 'max:255'],
				'password' => ['required', 'min:8'],
			],[
				//错误信息
				'phone.required' => '手机号不能为空',
				'phone.max' => '手机号最大长度为255',
				'password.required' => '密码不能为空',
				'password.min' => '密码最小长度为8',
			]);
			//验证通过，尝试登录
			if(Auth::attempt($credentials,filter_var($request->input("remember"), FILTER_VALIDATE_BOOLEAN))){
				//登录成功，重定向
				$request->session()->regenerate();
				$user=User::where(['phone'=>$credentials['phone']])->first();
				$user->last_ip=$request->ip();
				$user->save();
				if($request->session()->has('urlPrevious')){
					$url=$request->session()->get('urlPrevious');
					$request->session()->forget('urlPrevious');
					return redirect($url);
				}else{
					return redirect('/');
				}
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
				'phone' => ['required','unique:users'],
				'password' => ['required', 'min:8'],
			],[
				//错误信息
				'username.required' => '用户名不能为空',
				'username.max' => '用户名最大长度为255',
				'captcha.required' => '验证码不能为空',
				'phone.required' => '手机号不能为空',
				'phone.unique' => '手机号已被注册',
				'password.required' => '密码不能为空',
				'password.min' => '密码最小长度为8',
			]);
			//验证验证码
			if(time()>$request->session()->get('time')+300){
				$request->session()->forget('code');
				$request->session()->forget('phone');
				$request->session()->forget('time');
				return back()->withErrors([
					//错误信息
					'captcha' => '验证码已过期',
				])->withInput();
			}
			if (strval($credentials['captcha']) != $request->session()->get('code') || $credentials['phone'] != $request->session()->get('phone')) {
				return back()->withErrors([
					//错误信息
					'captcha' => '验证码错误',
				])->withInput();
			}
			//验证通过，尝试注册
			$user=new User();
			$user->username=$credentials['username'];
			$user->phone=intval($credentials['phone']);
			$user->password=Hash::make($credentials['password']);
			$user->reg_ip=$request->ip();
			if($user->save()){
				//注册成功，重定向
				$request->session()->forget('code');
				$request->session()->forget('phone');
				$request->session()->regenerate();
				return back();
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

	public function sendCaptcha(Request $request){
		/**
		 * 发送验证码
		 * @param Request $request
		 * 包含手机号
		 * @return 0
		 */
		$credentials = $request->validate([
			'phone' => ['required'],
		]);
		$phone = strval($credentials['phone']);
		$code = strval(rand(100000,999999));
		try{
			$cred = new Credential(env("TC_SECRET_ID"), env("TC_SECRET_KEY"));
			$client=new SmsClient($cred, "ap-beijing");
			$req = new SendSmsRequest();
			$req->SmsSdkAppId = env("TC_SMS_APPID");
			$req->SignName = env("TC_SMS_SIGN");
			$req->TemplateId = env("TC_SMS_TEMPLATEID");
			$req->PhoneNumberSet = array($phone);
			$req->TemplateParamSet = array($code);
			$resp = $client->SendSms($req);

			$request->session()->put("phone",$phone);
			$request->session()->put("code",$code);
			$request->session()->put("time",time());
			print_r($resp->toJsonString());

		}catch (TencentCloudSDKException $e) {
			echo($e);
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
			$uid = Auth::id();
			$credentials = $request->validate([
				'username' => ['required', 'max:255'],
				'email' => ['required', 'email', 'max:255'],
				'qq' => ['numeric','integer','min:100000','max:9999999999999'],
				'introduction' => [],
				'sign' => ['max:255']
			],[
				'username.required' => '你是？',
				'username.max' => '你是兔子？',
				'email.required' => '幻想乡也有邮箱啦',
				'email.max' => '就没有短一点的邮箱吗',
				'qq.numeric' => '你这QQ丁真吗',
				'qq.max' => '你这QQ丁真吗',
				'sign.max' => '短些撒'
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
	public function changePassword(Request $request) {
		/**
		 * 修改密码，登录状态下输入旧密码+验证码修改新密码；非登录状态下通过session中的手机号查找修改新密码
		 * @param Request $request
		 * 在登录状态下：含新密码、旧密码、验证码；再非登录状态下，含验证码、新密码
		 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
		 * 返回重定向
		 */
		if(Auth::check()) {
			$uid = Auth::id();
			//验证数据
			$credentials = $request->validate([
				'captcha' => ['required'],
				'oldPassword' => ['required','min:8'],
				'newPassword' => ['required','min:8']
			],[
				"captcha.required" => "验证码不能为空",
				"oldPassword.required" => "旧密码不能为空！",
				"oldPassword.min" => "旧密码这么短吗？",
				"newPassword.required" => "你到底要改成啥啊",
				"newPassword.min" => "新密码不少于8位"
			]);
			//验证验证码
			if(time()>$request->session()->get('time')+300){
				$request->session()->forget('code');
				$request->session()->forget('phone');
				$request->session()->forget('time');
				return back()->withErrors([
					//错误信息
					'captcha' => '验证码已过期',
				])->withInput();
			}
			if (strval($credentials['captcha']) != $request->session()->get('code') || $credentials['phone'] != $request->session()->get('phone')) {
				return back()->withErrors([
					//错误信息
					'captcha' => '验证码错误',
				])->withInput();
			}
			//验证旧密码
			$user = User::where(["id"=>$uid])->first();
			if (!Hash::check($credentials['oldPassword'],$user->password)) {
				return back()->withErrors([
					//错误信息
					'oldPassword' => '旧密码错误，这下⑨了',
				])->withInput();
			}
			//验证通过，修改密码
			$user->password=Hash::make($credentials['newPassword']);
			if($user->save()){
				//注册成功，重定向
				$request->session()->forget('code');
				$request->session()->forget('phone');
				$request->session()->regenerate();
				return redirect("/");
			}
		} else {
			$credentials = $request->validate([
				'captcha' => ['required'],
				'newPassword' => ['required','min:8']
			],[
				"captcha.required" => "验证码不能为空",
				"newPassword.required" => "新密码不能为空",
				"newPassword.min" => "新密码不少于8位"
			]);
			//验证验证码
			if(time()>$request->session()->get('time')+300){
				$request->session()->forget('code');
				$request->session()->forget('phone');
				$request->session()->forget('time');
				return back()->withErrors([
					//错误信息
					'captcha' => '验证码已过期',
				])->withInput();
			}
			if (strval($credentials['captcha']) != $request->session()->get('code') || $credentials['phone'] != $request->session()->get('phone')) {
				return back()->withErrors([
					//错误信息
					'captcha' => '验证码错误',
				])->withInput();
			}
			//验证通过，修改密码
			$user = User::where(["phone"=>$request->session()->get('phone')])->first();
			$user->password=Hash::make($credentials['newPassword']);
			if($user->save()){
				//注册成功，重定向
				$request->session()->forget('code');
				$request->session()->forget('phone');
				$request->session()->regenerate();
				return redirect("/");
			}
		}
	}

	public function loginPage(){
		/**
		 * 登录页面
		 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
		 * 返回登录页面
		 */
		if(Auth::check()){
			return back();
		}else{
			return view("login");
		}
	}

	static public function getAvatar(int $uid=0){
		/**
		 * 获取用户头像，未指定用户则返回自己，如果用户没有头像则返回默认头像
		 * @param $uid
		 * 用户id
		 * @return string
		 * 返回头像地址
		 */
		if($uid==0){
			if (Auth::check()) {
				$uid=Auth::id();
			}else{
				return env("TC_COS_CDNURL")."/avatar/default.png";
			}
		}
		$cosClient= new Client([
			'region' => env("TC_COS_REGION"),
			'schema' => 'https',
			'credentials' => [
				'secretId' => env("TC_SECRET_ID"),
				'secretKey' => env("TC_SECRET_KEY"),
			],
		]);
		$result = $cosClient->doesObjectExist(env("TC_COS_BUCKET"), "/avatar/".$uid.".png");
		if($result){
			return env("TC_COS_CDNURL")."/avatar/".$uid.".png";
		}else{
			if (Developer::where(["uid"=>$uid])->exists()){
				$git=Developer::where(["uid"=>$uid])->first()->github;
				return "https://avatars.githubusercontent.com/".$git;
			}
			return env("TC_COS_CDNURL")."/avatar/default.png";
		}

	}

	static function checkPrivilege(int $uid,int $privilege,int $pid=0) {
		/**
		 * 检查用户权限
		 * @param $uid
		 * 用户id
		 * @param $privilege
		 * 权限
		 * @param $pid
		 * 聚会id
		 * @return bool
		 * 返回是否有权限
		 */
		if($pid==0){
			//查网站管理员（还没写）
		}else{
			$party=Party::where(["id"=>$pid])->first();
			if ($party->leader==$uid){
				return true;
			}
			$staffs=Staff::where('pid',$pid)->get();
			$s=[];
			foreach ($staffs as $staff){
				$s[]=$staff->uid;
			}
			if (in_array($uid,$s)){
				$staff=Staff::where(["uid"=>$uid,"pid"=>$pid])->first();
				if (in_array($privilege,explode(",",$staff->privilege))||$staff->role==0) {
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
		return false;
	}

	public function changeAvatar(Request $request){
		/**
		 * 修改头像
		 * @param Request $request
		 * @return \Illuminate\Http\RedirectResponse
		 * 返回重定向
		 */
		$uid=Auth::id();
		if(!$request->hasFile('avatar')){
			return back()->withErrors([
				//错误信息
				'avatar' => '请选择头像',
			])->withInput();
		}
		$img=Image::make($request->file('avatar'));
		$scale=$img->width()/$request->input("width");
		$x=intval(intval($request->input("x"))*$scale);
		$y=intval(intval($request->input("y"))*$scale);
		$w=intval(intval($request->input("w"))*$scale);
		$h=intval(intval($request->input("h"))*$scale);
		$img->crop($w,$h,$x,$y);
		$img->resize(512,512);
		$imgContent=$img->encode("png");
		$cosClient= new Client([
			'region' => env("TC_COS_REGION"),
			'schema' => 'https',
			'credentials' => [
				'secretId' => env("TC_SECRET_ID"),
				'secretKey' => env("TC_SECRET_KEY"),
			],
		]);
		try{
			$cosClient->upload(
				bucket: env("TC_COS_BUCKET"),
				key: "/avatar/".$uid.".png",
				body: $imgContent,
			);
		}catch (\Exception $e){
			return $e;
		}
		return 0;
	}

	public function changeProfilePage(Request $request){
		/**
		 * 修改个人资料页面
		 * @param Request $request
		 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
		 * 返回修改个人资料页面
		 */
		$uid=Auth::id();
		$user=User::where(["id"=>$uid])->first();
		return view("user.changeUserInfo",["user"=>$user]);
	}


	public function getPartyforuid(int $uid, int $type){
		/**
		 * 给定uid和聚会类型，返回所有聚会（按时间顺序排列）
		 * @param int $uid
		 * @param int $type
		 * 参数为请求，包含uid和type（0:leader,1:staff,2:participant）
		 * @return \Illuminate\Database\Eloquent\Collection|static[]
		 * 返回值为一个集合
		 */

			    switch ($type){
					case 0://leader
						$parties = Party::where('leader', '=',$uid)
							->orderBy('start', 'desc')
							->get();
						return $parties;
					case 1:
						$parties = Party::addSelect(['pid' =>
								Staff::select('pid')->whereColumn('uid', $uid)
							  ])->orderByDesc('start')
								->get();
						return $parties;
					case 2:
						$parties = Party::addSelect(['pid' =>
							Participant::select('pid')->whereColumn('uid', $uid)->whereColumn('is_active', 1)
						])->orderByDesc('start')
							->get();
						return $parties;
				}

	}
}
