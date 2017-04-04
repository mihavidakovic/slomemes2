<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Glas;
use App\User;
use Auth;
use App\Achievements\Normie;
use App\Achievements\MemeZacetnik;


class PostsController extends Controller
{

 	public function __construct()
    {
        $this->middleware('auth');
    }
	// DODAJ MEME
	public function dodajGet() {
		return view('dodaj');
	}

	public function dodajPost(Request $request) {
		$this->validate($request, [
	        'title' => 'required|max:255',
	        'url' => 'required|url',
	    ]);

	    $p = new Post;
	    $p->title = $request->input('title');
	    $p->url = $request->input('url');
	    $p->user_id = Auth::user()->id;
	    $p->save();

	    $user = User::find(Auth::user()->id);
	    if ($user->rank == "9GAG podpornik") {
	    	$user->addProgress(new Normie(), 1);
	    } elseif ($user->rank == "Normie") {
	    	$user->addProgress(new MemeZacetnik(), 1);
	    }

	    return back();
	}


	// USTVARI MEME
	public function ustvariGet() {
		return view('ustvari');
	}

	// GLASOVANJE
	public function postUpvote($id) {
		$post = Post::find($id);
		$glas = new Glas;
		$glas->user_id = Auth::user()->id;
		$glas->post_id = $id;
		$glas->type = 1;
		$glas->save();

		return redirect('/');
	}

	public function postDownvote($id) {
		$post = Post::find($id);
		$glas = new Glas;
		$glas->user_id = Auth::user()->id;
		$glas->post_id = $id;
		$glas->type = 2;
		$glas->save();

		return redirect('/');
	}

}
