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

    	return view('profil', ['user' => $user]);
    }
}
