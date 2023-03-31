<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model{

	protected $fillable=[
		'game',
		'party',
		'is_started',
		'is_active',
	];

	public function game(){
		return $this->belongsTo('App\Models\Game', 'game', 'id');
	}

	public function party(){
		return $this->belongsTo('App\Models\Party', 'party', 'id');
	}

}
