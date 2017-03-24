<?php

namespace App\Http\Controllers;

use App\Post;
use App\Glas;
use Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        return redirect()->route('domov');
    }
    public function domov()
    {
        if (Auth::check()) {
            $posti = DB::table('posts')
                ->select('posts.id')
                ->whereBetween('posts.created_at', array(Carbon::now()->subHours(25), Carbon::now()))
                ->get();
            $post_id = $posti[rand(0, count($posti) - 1)];
            $post = Post::find($post_id->id);
            $upvoti = Glas::where('post_id', '=', $post->id)->where('type', '=', 1)->count();
            $downvoti = Glas::where('post_id', '=', $post->id)->where('type', '=', 2)->count();
            $skupni_glasovi = $upvoti - $downvoti;
            return view('domov', ['post' => $post, 'skupni_glasovi' => $skupni_glasovi]);        
        } else {
             $posti = DB::table('posts')
                ->select('posts.id')
                ->whereBetween('posts.created_at', array(Carbon::now()->subHours(25), Carbon::now()))
                ->get();
            if ($posti->isEmpty()) {
                $post = [];
                return view('domov', ['post' => $post]);                     
            } else {
                $post_id = $posti[rand(0, count($posti) - 1)];
                $post = Post::find($post_id->id);
                $upvoti = Glas::where('post_id', '=', $post->id)->where('type', '=', 1)->count();
                $downvoti = Glas::where('post_id', '=', $post->id)->where('type', '=', 2)->count();
                $skupni_glasovi = $upvoti - $downvoti;
                return view('domov', ['post' => $post, 'skupni_glasovi' => $skupni_glasovi]);  
       
            }
        }
    }
}
