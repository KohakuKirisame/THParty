<?php

namespace App\Http\Controllers;
use App\Models\Party;
use App\Models\User;
use App\Models\Show;
use Illuminate\Routing\Controller as BaseController;

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

}
