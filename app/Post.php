<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = [
		'naslov', 'url', 'user_id'
	];
	protected $table = 'posts';


}