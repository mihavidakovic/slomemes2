<?php

namespace App\Http\Controllers;

use App\Post;
use App\Glas;
use App\Comment;
use Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        return redirect()->route('domov');
    }
    public function getMeme($id) {
        $post = Post::find($id);
        $comments = Comment::where('post_id', '=', $id)->get();
        $upvoti = Glas::where('post_id', '=', $post->id)->where('type', '=', 1)->count();
        $downvoti = Glas::where('post_id', '=', $post->id)->where('type', '=', 2)->count();
        $skupni_glasovi = $upvoti - $downvoti;
        return view('meme', ['post' => $post, 'comments' => $comments, 'skupni_glasovi' => $skupni_glasovi]);
    }
    public function domov()
    {
        if (Auth::check()) {
            $posti = Post::whereBetween('posts.created_at', array(Carbon::now()->subHours(48), Carbon::now()))
                ->doesntHave('glas')
                ->take(100)
                ->latest()
                ->get();
            $post_id = $posti[rand(0, count($posti) - 2)];
            if (Glas::where('user_id', '=', Auth::user()->id)->exists() && Glas::where('post_id', '=', $post_id->id)->exists()) {
            } else {
                $post = Post::find($post_id->id);
                $comments = Comment::where('post_id', '=', $post->id)->get();
                $upvoti = Glas::where('post_id', '=', $post->id)->where('type', '=', 1)->count();
                $downvoti = Glas::where('post_id', '=', $post->id)->where('type', '=', 2)->count();
                $skupni_glasovi = $upvoti - $downvoti;
                return view('domov', ['post' => $post, 'comments' => $comments, 'skupni_glasovi' => $skupni_glasovi]);        
            }
        } else {
             $posti = DB::table('posts')
                ->select('posts.id')
                ->whereBetween('posts.created_at', array(Carbon::now()->subHours(48), Carbon::now()))
                ->get();
            if ($posti->isEmpty()) {
                $post = [];
                return view('domov', ['post' => $post]);                     
            } else {
                $post_id = $posti[rand(0, count($posti) - 1)];
                $post = Post::find($post_id->id);
                $comments = Comment::where('post_id', '=', $post->id)->get();
                $upvoti = Glas::where('post_id', '=', $post->id)->where('type', '=', 1)->count();
                $downvoti = Glas::where('post_id', '=', $post->id)->where('type', '=', 2)->count();
                $skupni_glasovi = $upvoti - $downvoti;
                return view('domov', ['post' => $post, 'comments' => $comments, 'skupni_glasovi' => $skupni_glasovi]);  
       
            }
        }
    }
}
