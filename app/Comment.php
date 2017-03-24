<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = [
		'post_id', 'user_id', 'content'
	];
	protected $table = 'comments';

	public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }



}
