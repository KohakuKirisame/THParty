<?php

namespace App\Models;

class Party extends \Illuminate\Database\Eloquent\Model {

	protected $fillable=[
		'title',
		'subtitle',
		'start',
		'end',
		'location',
		'domain',
		'leader',
	];

	public function user(){
		//与User模型建立一对一关系
		return $this->belongsTo(User::class, 'leader', 'id');
	}

}
