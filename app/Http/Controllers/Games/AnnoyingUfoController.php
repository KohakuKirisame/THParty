<?php

namespace App\Http\Controllers\Games;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Room;
use App\Models\Games\GameAnnoyingufo;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

class AnnoyingUfoController {

	public function chooseWord(int $rid){
		$room = Room::find($rid);
		$valuesArray=json_decode($room->config,true)["words"];
		$randomID = $valuesArray[array_rand($valuesArray)];
		$GameAnnoyingufo = GameAnnoyingufo::find($randomID);
		$wordsArray=json_decode($GameAnnoyingufo->words,true);
		$randomWord = $wordsArray[array_rand($wordsArray)];
		return $randomWord;
	}

	public function showWord(Request $request){
		$rid=intval($request->input('room'));
		$room = Room::find($rid);
		if(UserController::checkPrivilege(Auth::id(),2,$room->party)){
			$word=$this->chooseWord($rid);
			return $word;
		}else{
			return "没有权限";
		}

	}

	static public function gamePage(int $rid){
		$room=Room::find($rid);
		return view('game.AnnoyingUfo',['room'=>$room]);
	}
}
