<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model {
/**
	 * 参与者模型
	 */

	protected $fillable = [
		'uid',
		'pid',
		'is_active',
		];

}
