<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;
use Auth;

class CommentsController extends Controller
{
 	public function __construct()
    {
        $this->middleware('auth');
    }
    public function addComment($id, Request $request) {
        $this->validate($request, [
            'content' => 'required|min:5|max: 255',
        ]);

    	$c = new Comment;
    	$c->post_id = $id;
    	$c->user_id = Auth::user()->id;
    	$c->content = $request->input('content');
    	$c->save();

        $user = User::find(Auth::user()->id);
    	return response()->json(['success' => true, 'comment' => $c, 'user' => $user]);
    }
}
