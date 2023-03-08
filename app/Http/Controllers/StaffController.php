<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Staff;
use App\Models\Party;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class StaffController extends BaseController {
	/**
	 * Staff控制器
	 */
	public function createStaff(Request $request) {
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
				//验证规则：uid和pid必须填写，role只能为0或1（0为管理员，1为普通员工），privilege为特定的权限，由role=0授予，格式为1,2,3,4,5,6,7,...,N
				'uid' => ['required'],
				'pid' => ['required'],
				'role' => ['required', 'numeric', 'min:0', 'max:1'],
				 ],
			[//错误信息
				'uid.required' => 'uid不能为空！',
				'pid.required' => 'pid不能为空！',
				'role.required' => 'role不能为空！',
				'role.min' => 'role只能为0或1（0为管理员，1为普通员工）',
				'role.max' => 'role只能为0或1（0为管理员，1为普通员工）',
			]);
			//信息合理性验证通过，开始鉴权，先根据pid找到活动信息表
			$party = Party::where(["id"=>$credentials['pid']])->first();
			if($party->leader == $uid){
				//鉴权通过，创建staff
				$staff = new Staff();
				$staff->uid = $credentials['uid'];
				$staff->pid = $credentials['pid'];
				$staff->role = $credentials['role'];
				$staff->privilege = $credentials['privilege'];
				$staff->save();
				return redirect();
				//暂时不知道重定向到哪
				//"https://".$credentials['domain'].".thparty.fun/Admin/");
			}
			//鉴权失败，不是leader也想授权staff？
			else return back()->with('message','您没有权限添加staff');
		}
        //没登录的回去登录
		return redirect("/Login");
		}
	public function deleteStaff(Request $request) {
		/**
		 * 删除Staff
		 * @param Request $request
		 * 参数为请求，包含Staff的uid和pid
		 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
		 * 返回值为一个重定向
		 */
		if(Auth::check()) { //验证登录
			$uid = Auth::id(); //获取用户ID
			$credentials = $request->validate([
				//验证规则：uid和pid必须填写，role只能为0或1（0为管理员，1为普通员工），privilege为特定的权限，由role=0授予，格式为1,2,3,4,5,6,7,...,N
				'uid' => ['required'],
				'pid' => ['required'],
			],
				[//错误信息
					'uid.required' => 'uid不能为空！',
					'pid.required' => 'pid不能为空！',
				]);
			//信息合理性验证通过，开始鉴权，先根据pid找到活动信息表
			$party = Party::where(["id"=>$credentials['pid']])->first();
			if($party->leader == $uid){
				//鉴权通过，删除staff
				$Staff = Staff::where(['pid'=>$credentials['pid'],'uid'=>$credentials['uid']])->first();
				$Staff->delete();
				return redirect();
				//暂时不知道重定向到哪
				//"https://".$credentials['domain'].".thparty.fun/Admin/");
			}
			//鉴权失败，不是leader也想删除staff？
			else return back()->with('message','您没有权限删除staff');
		}
		//没登录的回去登录
		return redirect("/Login");
	}
}
