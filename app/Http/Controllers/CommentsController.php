<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentsController extends Controller
{
 	public function __construct()
    {
        $this->middleware('auth');
    }
    public function addComment($id, Request $request) {
    	$c = new Comment;
    	$c->post_id = $id;
    	$c->user_id = Auth::user()->id;
    	$c->content = $request->input('content');
    	$c->save();
    	return redirect()->route('meme', $id);
    }
}
