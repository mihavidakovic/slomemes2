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
    public function scopeOrderByVotes($query)
    {
        $query->leftJoin('glasovi', 'glasovi.post_id', '=', 'posts.id')
            ->selectRaw('posts.*, count(glasovi.id) as aggregate')
            ->groupBy('posts.id')
            ->orderBy('aggregate', 'desc');
    }
    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


}
