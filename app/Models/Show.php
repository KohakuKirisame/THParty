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
	];

}
