<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model {

	protected $fillable=[
		'uid',
		'job',
		'github',
	];

	public function user(){
		return $this->belongsTo(User::class, 'uid', 'id');
	}

}
