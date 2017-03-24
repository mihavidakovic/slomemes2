<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Glas;
use Auth;

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
	    return 'dodano';
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

		return back();
	}

	public function postDownvote($id) {
		$post = Post::find($id);
		$glas = new Glas;
		$glas->user_id = Auth::user()->id;
		$glas->post_id = $id;
		$glas->type = 2;
		$glas->save();

		return back();
	}

}
