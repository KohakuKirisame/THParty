<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Party extends Model {


	protected $fillable=[
		'title',
		'subtitle',
		'type',
		'start',
		'end',
		'location',
		'domain',
		'leader',
		'actived',
		'information',
	];

	protected $appends=[
		'participants',
		'posts'
	];

	public function user(){
		//与User模型建立一对一关系
		return $this->belongsTo(User::class, 'leader', 'id');
	}

	public function getParticipantsAttribute(){
		//与Participant模型建立一对多关系
		return Participant::where(['pid'=>$this->id,'is_active'=>1])->count();
	}

	public function getPostsAttribute(){
		//与Post模型建立一对多关系
		return Post::where(['pid'=>$this->id,'is_active'=>1])->count();
	}

}
