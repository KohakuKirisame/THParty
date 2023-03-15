<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{

	protected $fillable=[
		'uid',
		'pid',
		'content',
		'img',
		'is_active',
	];

	public function user(){
		return $this->belongsTo(User::class,'uid','id');
	}

}
