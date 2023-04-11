<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Games\AnnoyingUfoController;
use App\Models\Party;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends BaseController {

	static public function getRooms(int $pid){
		/**
		 * @param int $pid
		 * @return \Illuminate\Database\Eloquent\Collection|static[]
		 * 通过pid获取游戏房间
		 */
		$rooms = Room::where(['party'=>$pid,'is_active'=>1])->get();
		return $rooms;
	}

	public function switchGames($domain, $rid){
		$rid=intval($rid);
		$party = Party::where('domain',$domain)->first();
		$room = Room::find($rid);
		$game = $room->game_info;
		if($party->id != $room->party||$room->is_active==0) {
			return redirect('/');
		}
		if($game->is_public==0){
			if(!UserController::checkPrivilege(Auth::id(),2,$party->id)){
				return redirect('/');
			}
		}
		$room->is_started=1;
		$room->save();
		switch ($room->game){
			case 1: // AnnoyingUfo
				return AnnoyingUfoController::gamePage($rid);
				break;
			default:
				return redirect('/');
				break;
		}

	}


}
