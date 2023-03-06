<?php

namespace App\Models;
use \Illuminate\Database\Eloquent\Model;

class Staff extends Model {
	protected $fillable=[
		'uid',
		'pid',
		'role',//0为管理员，1为普通员工
		'privilege',//权限组，每个权限用逗号分隔
	];

	public function user(){
		return $this->belongsTo('App\Models\User','uid');
	}

	public function party(){
		return $this->belongsTo('App\Models\Party','pid');
	}
}
