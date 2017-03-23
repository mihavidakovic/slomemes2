<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostsController extends Controller
{
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
	    $p->visible = 1;
	    $p->save();
	    return 'dodano';
	}


	// USTVARI MEME
	public function ustvariGet() {
		return view('ustvari');
	}
}
