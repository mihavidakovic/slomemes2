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

    public function profilUrediGet() {
        if (Auth::check()) {
            $user = User::find(Auth::user()->id);
            return view('uredi-profil', ['user' => $user]);
        }
        return redirect()->route('domov');
    }
    public function profilUrediPost(Request $request) {
        if (Auth::check()) {
             $this->validate($request, [
                'forum_podpis' => 'max:100',
                'avatar' => 'mimes:jpeg,bmp,png|max:5000'
            ]);
            $user = User::find(Auth::user()->id);
            if ($request->hasFile('avatar')) {
                $path = $request->file('avatar')->store(
                    'avatars/'.$request->user()->id, 's3'
                );
                $user->avatar = $path;
            }
            $user->forum_podpis = $request->input('forum_podpis');
            $user->save();
            \Session::flash('flash_message','Spremembe uspešno shranjene.');
            return back();
        }
        return redirect()->route('domov');
    }
}
