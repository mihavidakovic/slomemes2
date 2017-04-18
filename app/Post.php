<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = [
		'naslov', 'url', 'user_id'
	];
	protected $table = 'posts';

	public function comment()
    {
        return $this->hasOne('App\Comment');
    }

    public function glas()
    {
        return $this->hasOne('App\Glas');
    }
    public function glasovi()
    {
        return $this->hasMany('App\Glas');
    }
    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


}
