<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Comment extends Model {


	protected $fillable=[
		'uid',
		'post',
		'contents',
	];
	protected $appends=[
		'comments',
	];
	public function getCommentsAttribute(){
		$comments=Comment::where(['pid'=>$this->pid])->get();
		return $comments;
	}

}
