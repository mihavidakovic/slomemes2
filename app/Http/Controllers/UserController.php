<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Glas;
use App\Comment;
use Auth;
use DB;
use Carbon\Carbon;

class UserController extends Controller
{
    public function profilGet($name) {
    	$user = User::where('name', '=', $name)->first();
    	$posti = Post::where('user_id', '=', $user->id)->paginate(21);

    	return view('profil', ['user' => $user, 'posti' => $posti]);
    }
    public function profilGetLiked($name) {
    	$user = User::where('name', '=', $name)->first();
    	$posti = DB::table('posts')
    				->join('glasovi', 'posts.id', '=', 'glasovi.post_id')
    				->where('glasovi.type', '=', 1)
    				->get();

    	return response()->json($posti);
    }

    public function profilGetDisliked($name) {
    	$user = User::where('name', '=', $name)->first();
    	$posti = DB::table('posts')
    				->join('glasovi', 'posts.id', '=', 'glasovi.post_id')
    				->where('glasovi.type', '=', 2)
    				->get();

    	return response()->json($posti);
    }
}
