<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;


use App\Models\Party;
use Illuminate\Support\Facades\Auth;

class PartyController extends BaseController {
	/**
	 * THP控制器
	 */

	public function createParty(Request $request) {
		/**
		 * 创建活动
		 * @param Request $request
		 * 参数为请求，包含活动信息
		 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
		 * 返回值为一个重定向
		 */
		if(Auth::check()){ //验证登录
			$uid = Auth::id(); //获取用户ID
			$credentials = $request->validate([
				/**
				 * 验证规则:
				 * 活动名称不能为空，最大长度为255
				 * 活动副标题最大长度为255
				 * 活动开始时间不能为空，格式为日期
				 * 活动结束时间不能为空，格式为日期
				 * 活动地点不能为空，最大长度为255
				 * 活动域名不能为空，最大长度为64，只能包含字母、数字、破折号（-）以及下划线（_）
				 * 活动域名不能重复
				 */

				'title' => ['required', 'max:255'],
				'subtitle' => ['max:255'],
				'type' => ['required', 'numeric', 'min:0', 'max:2'],
				'start' => ['required','date'],
				'end' => ['required','date'],
				'location' => ['required','max:255'],
				'domain' => ['required','max:64','alpha_dash','unique:parties,domain'],
			],[
				'title.required' => '举办了幻想的活动？活动名称不能为空！',
				'title.max' => '活动名称过长啦！',
				'subtitle.max' => '活动副标题过长啦',
				'type.required' => '活动类型不能为空',
				'type.numeric' => '⑨!不要用F12乱改前端!',
				'start.required' => '咲夜表示你对时间的理解有所欠缺，活动开始时间不能为空',
				'start.date' => '活动开始时间格式错误',
				'end.required' => '咲夜表示你对时间的理解有所欠缺，活动结束时间不能为空',
				'end.date' => '活动结束时间格式错误',
				'location.required' => '地点不能进入幻想，活动地点不能为空',
				'location.max' => '就算是铃仙的全名也没这么长！',
				'domain.required' => '东方活动域名不能为空',
				'domain.max' => '阿求的岁月史书无法记录过长的域名',
				'domain.alpha_dash' => '阿求的岁月史书所记录的域名只能包含字母、数字、破折号（——）以及下划线（_）',
			]);
			//验证通过，创建活动
			$party = new Party();
			$party->title = $credentials['title'];
			$party->subtitle = $credentials['subtitle'];
			$party->type = $credentials['type'];
			$party->start = $credentials['start'];
			$party->end = $credentials['end'];
			$party->location = $credentials['location'];
			$party->domain = $credentials['domain'];
			if($party->type == 0){
				$party->actived = 1; //如果是个人活动，直接激活
			}else{
				$party->actived = 0; //如果是高校例会和商业THP，不激活
			}
			$party->leader = $uid;
			$party->save();
			return redirect("https://".$credentials['domain'].".thparty.fun/Admin/");
		}
		return redirect("/Login");
	}
	public function editPartyInfo(Request $request){
		/**
		 * 更改活动信息
		 * @param Request $request
		 * 参数为请求，包含活动信息
		 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
		 * 返回值为一个重定向
		 */
		if(Auth::check()){ //验证登录
			$uid = Auth::id(); //获取用户ID
			$credentials = $request->validate([
				/**
				 * 验证规则:
				 * 活动名称不能为空，最大长度为255
				 * 活动副标题最大长度为255
				 * 活动开始时间不能为空，格式为日期
				 * 活动结束时间不能为空，格式为日期
				 * 活动地点不能为空，最大长度为255
				 * 活动域名不能为空，最大长度为64，只能包含字母、数字、破折号（-）以及下划线（_）
				 * 活动域名不能重复
				 */
                  'pid' => ['required'],
				'title' => ['required', 'max:255'],
				'subtitle' => ['max:255'],
				'type' => ['required', 'numeric', 'min:0', 'max:2'],
				'start' => ['required','date'],
				'end' => ['required','date'],
				'location' => ['required','max:255'],
				'domain' => ['required','max:64','alpha_dash','unique:parties,domain'],
			],[
				'pid.required'=>'pid不能为空！',
				'title.required' => '举办了幻想的活动？活动名称不能为空！',
				'title.max' => '活动名称过长啦！',
				'subtitle.max' => '活动副标题过长啦',
				'type.required' => '活动类型不能为空',
				'type.numeric' => '⑨!不要用F12乱改前端!',
				'start.required' => '咲夜表示你对时间的理解有所欠缺，活动开始时间不能为空',
				'start.date' => '活动开始时间格式错误',
				'end.required' => '咲夜表示你对时间的理解有所欠缺，活动结束时间不能为空',
				'end.date' => '活动结束时间格式错误',
				'location.required' => '地点不能进入幻想，活动地点不能为空',
				'location.max' => '就算是铃仙的全名也没这么长！',
				'domain.required' => '东方活动域名不能为空',
				'domain.max' => '阿求的岁月史书无法记录过长的域名',
				'domain.alpha_dash' => '阿求的岁月史书所记录的域名只能包含字母、数字、破折号（-）以及下划线（_）',
			]);
			//信息合理性验证通过，开始鉴权，先根据pid找到活动信息表
			$party = Party::where(["id"=>$credentials['pid']])->first();
			if($party->leader == $uid){
				//鉴权通过，用新信息填充覆盖
				$party->title = $credentials['title'];
				$party->subtitle = $credentials['subtitle'];
				$party->type = $credentials['type'];
				$party->start = $credentials['start'];
				$party->end = $credentials['end'];
				$party->location = $credentials['location'];
				$party->domain = $credentials['domain'];
				$party->information = $credentials['information'];
				if($party->type == 0){
					$party->actived = 1; //如果是个人活动，直接激活
				}else{
					$party->actived = 0; //如果是高校例会和商业THP，不激活
				}
				$party->save();
				return redirect("https://".$credentials['domain'].".thparty.fun/Admin/");
			}
			//鉴权失败，不是主人也想改THPinfo？
			else return back()->with('message','您没有权限修改本Party的信息');
		}
		//没登录的回去登录
		return redirect("/Login");

	}

	public function partyHomepage(Request $request,string $domain){
		/**
		 * 活动主页
		 * @param Request $request
		 * @param string $domain
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		$party = Party::where('domain',$domain)->first();
		$leader=$party->user;
		if($party == null){
			return view('errors.404');
		}
		$shows=ShowController::getShows($party->id);
		$staffs=StaffController::getStaff($party->id);
		$posts=PostController::postPreview($party->id);
		return view('party.home',[
			'party' => $party,
			'leader' => $leader,
			'shows' => $shows,
			'staffs'=>$staffs,
			'posts'=>$posts
		]);
	}

	public function partyPostspage(Request $request,string $domain){
		/**
		 * 活动主页
		 * @param Request $request
		 * @param string $domain
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		$party = Party::where('domain',$domain)->first();
		if($party == null){
			return view('errors.404');
		}
		$posts=PostController::getPosts($party->id);
		return view('party.posts',[
			'party' => $party,
			'posts'=>$posts
		]);
	}
}

