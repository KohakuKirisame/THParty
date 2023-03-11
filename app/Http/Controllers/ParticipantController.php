<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Party;
use App\Models\Participant;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends BaseController {

	public function joinParty(Request $request, $pid) {
		/**
		 * 加入活动
		 * @param Request $request
		 * 参数为请求，包含活动ID
		 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
		 * 返回值为一个重定向
		 */
		$pid = intval($pid);
		if (Auth::check()) { //验证登录
			$uid = Auth::id(); //获取用户ID
			if (!Party::where('id', $pid)->exists()) {
				//判断活动是否存在
				return redirect('/');
				//重定向到首页并显示错误信息
			}
			$party = Party::find($pid); //获取活动信息
			if ($party->actived == 0) { //判断活动是否过审
				if(time() < strtotime($party -> end)){//判断活动是否过期
					if (!Participant::where('uid', $uid)->where('pid', $pid)->exists()) {
						//判断用户是否已经参与了这个活动
						$participant = new Participant;
						$participant->uid = $uid;
						$participant->pid = $pid;
						$participant->is_active = 1;
						$participant->save();

					} elseif(Participant::where('uid',$uid)->where('pid',$pid)->first()->is_active == 0) {
						Participant::where('uid',$uid)->where('pid',$pid)->update(['is_active'=>1]);
					}else{
						return redirect('https://' . $party->domain.'.thparty.fun/')->with('error', '你已经参与了这个活动了哦'); //重定向到活动页面并显示错误信息
					}
					return redirect('https://' . $party->domain.'.thparty.fun/'); //重定向到活动页面
				}else{
					return redirect('https://' . $party->domain.'.thparty.fun/')->with('error', '活动已经过期啦'); //重定向到活动页面并显示错误信息
				}
			} else {
				return redirect('https://' . $party->domain.'.thparty.fun/')->with('error', '活动被隙间了！'); //重定向到活动页面并显示错误信息
			}
		} else {
			return redirect('/Login')->withErrors(['login'=>'请先登录']); //重定向到登录页面
		}
	}

	public function quitParty(Request $request, $pid) {
		$pid = intval($pid);
		if (Auth::check()) { //验证登入
			$uid = Auth::id(); //获取用户ID
			if (!Party::where('id', $pid)->exists()) {
				//判断活动是否存在
				return redirect('/');
				//重定向到首页并显示错误信息
			}
			$party = Party::find($pid); //获得活动信息
			if(time() < strtotime($party -> end)){ //判断活动是否过期
				if(Participant::where('uid', $uid)->where('pid', $pid)->exists()){
					//判断用户是否参与了此活动,若参加了，则退出
					$participant = Participant::where('uid',$uid)->wherr('pid',$pid) -> first();
					$participant -> update(['is_active'=>0]);
					$participant -> save();
				}elseif(Participant::where('uid', $uid)->where('pid', $pid)->first() -> is_active == 1){
					Participant::where('uid',$uid)->where('pid',$pid)->update(['is_active'=>0]);
				}elseif(!Participant::where('uid', $uid)->where('pid', $pid)->exists()){
					return redirect('https://' . $party->domain.'.thparty.fun/')->with('error', '你没有参加这个活动哦'); //重定向到活动页面并显示错误信息
				}else{
					return redirect('https://' . $party->domain.'.thparty.fun/')->with('error', '你已经退出了这个活动哦'); //重定向到活动页面并显示错误信息
				}
				return redirect('https://' . $party->domain.'.thparty.fun/'); //重定向到活动页面
			}else{
				return redirect('https://' . $party->domain.'.thparty.fun/')->with('error', '活动已经过期啦'); //重定向到活动页面并显示错误信息
			}
		} else {
			return redirect('/Login')->withErrors(['login'=>'请先登录']); //重定向到登录页面
		}
	}

}
/*Ai is GOD nsdd I think I should start from copying AI*/
