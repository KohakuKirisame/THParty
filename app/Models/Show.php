<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Show extends Model {
	protected $fillable=[
		'title',
		'actor',
		'pid',
		'introduction',
		'public',
		'start',
		'end',
	];

	protected $appends=[
		'actor_info',
	];

	public function getActorInfoAttribute(){
		$actors = $this->actor;
		if (!empty($actors)) {
			$o = [];
			$actors = explode(',', $actors);
			foreach ($actors as $actor) {
				$o[] = User::where('id', $actor)->first();
			}
		} else {
			$o = [];
		}
		return $o;
	}

}
