<?php

namespace App\Http\Controllers;
use App\Models\Party;
use App\Models\Staff;
use App\Models\User;
use App\Models\Show;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class ShowController extends BaseController {
	/**
	 * 节目控制器
	 */
	static public function getShows(int $pid){
		/**
		 * 获取所有节目
		 * @param int $pid
		 * 参数为聚会ID
		 * @return \Illuminate\Database\Eloquent\Collection|static[]
		 * 返回值为一个集合
		 */
		$shows=explode(",",Party::where('id',$pid)->first()->shows);
		$shows=Show::whereIn('id',$shows)
			->oederByRaw('FIND_IN_SET(id,"'.implode(',',$shows).'")')
			->get();
		foreach($shows as $show){
			$actors=$show->actors;
			if(!empty($actors)) {
				$show->actors = [];
				$actors=explode(',',$actors);
				foreach ($actors as $actor) {
					$show->actors[] = User::where('id', $actor)->first();
				}
			}else{
				continue;
			}
		}
		return $shows;
	}

	public function addShow(Request $request){
		/**
		 * 添加节目
		 * @param Request $request
		 * 参数为请求，包含节目信息
		 * @return int|string
		 * 返回值为一个整数或字符串，成功返回节目ID，失败返回错误信息
		 */

		$credentials = $request->validate([
			/**
			 * 验证规则
			 * 节目标题不能为空，最大长度为255
			 * 演员不能为空
			 * 聚会ID不能为空，必须为数字
			 * 公开状态不能为空，必须为数字，0或1
			 * 开始时间不能为空，格式为H:i
			 * 结束时间不能为空，格式为H:i
			 */
			'title' => ['required', 'max:255'],
			'actors' => ['required',],
			'pid' => ['required', 'numeric'],
			'introduction' => [],
			'public' => ['required', 'numeric', 'min:0', 'max:1'],
			'start' => ['required','date_format:H:i'],
			'end' => ['required','date_format:H:i'],
		],
		[
			'title.required' => '请输入未遁入幻想的节目',
			'title.max' => '请控制节目在大结界内',
			'actors.required' => '请输入演出成员',
			'pid.required' => '节目正在三途川迷路',
			'pid.numeric' => '请输入的派对',
			'public.required' => '请确认节目是否要寄存在紫的隙间内',
			'start.required' => '节目的开始时间不能像阿空脑袋一样空',
			'start.date_format' => '时间的正确格式为H:M',
			'end.required' => '节目的结束时间不能像阿空脑袋一样空',
			'end.date_format' => '时间的正确格式为H:M',
		]);
		if (Auth::check()&&UserController::checkPrivilege(Auth::id(),1,$credentials['pid'])){
			try {
				$show=new Show();
				$show->title=$credentials['title'];
				$show->actors=$credentials['actors'];
				$show->pid=intval($credentials['pid']);
				$show->introduction=$credentials['introduction'];
				$show->public=intval($credentials['public']);
				$show->start=$credentials['start'];
				$show->end=$credentials['end'];
				$show->save();
				return $show->id;
			}catch (\Exception $e){
				return json_encode(['error'=>'添加失败']);
			}
		}else{
			return json_encode(['error'=>'权限不足']);
		}


	}

}
