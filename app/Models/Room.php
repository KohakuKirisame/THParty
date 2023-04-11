<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model{

	protected $fillable=[
		'game',
		'party',
		'config',
		'is_started',
		'is_active',
	];

	protected $appends=['game_info'];



	public function getGameInfoAttribute(){
		return Game::where('id',$this->game)->first();
	}

	public function party(){
		return $this->belongsTo('App\Models\Party', 'party', 'id');
	}

}
