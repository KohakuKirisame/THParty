<?php

namespace App\Models\Games;
use Illuminate\Database\Eloquent\Model;

class GameAnnoyingufo extends Model{
	protected $table= 'game_annoyingufo';

	protected $fillable=[
		'name',
		'words',
		'created_by',
		'is_active',
	];

	public function user(){
		return $this->belongsTo('App\Models\User', 'created_by', 'id');
	}

}
