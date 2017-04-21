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

    public function test() {
        return view('test');
    }

    public function komentarjiJSON($id, Request $request) {
        $komentarji = Comment::where('post_id', '=', $id)->with('user')->get();
        return response()->json(['komentarji' => $komentarji])->withCallback($request->input('callback'));
    }

    public function postiJSON(Request $request) {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $posti = Post::with('user')
            ->whereDoesntHave("glasovi")
            ->whereBetween('posts.created_at', array(Carbon::now()->subHours(48), Carbon::now()))
            ->orderBy('posts.created_at', 'DESC')
            ->orderByVotes()
            ->take(20)
            ->get();
            return response()->json(['posti' => $posti])->withCallback($request->input('callback')); 
            // if ($posti->isEmpty()) {
            //    $post = [];
            //    $comments = [];
            //    $skupni_glasovi = 0;
            //     return response()->json(['posti' => $post, 'comments' => $comments, 'skupni_glasovi' => $skupni_glasovi]);        
            // } else {
            //     $post_id = $posti[rand(0, count($posti) - 2)];
            //     if (Glas::where('user_id', '=', Auth::user()->id)->exists() && Glas::where('post_id', '=', $post_id->id)->exists()) {
            //     } else {
            //         $post = Post::find($post_id->id);
            //         $comments = Comment::where('post_id', '=', $post->id)->get();
            //         $upvoti = Glas::where('post_id', '=', $post->id)->where('type', '=', 1)->count();
            //         $downvoti = Glas::where('post_id', '=', $post->id)->where('type', '=', 2)->count();
            //         $skupni_glasovi = $upvoti - $downvoti;
            //         return response()->json(['posti' => $post, 'comments' => $comments, 'skupni_glasovi' => $skupni_glasovi]);        
            //     }
            // }
        } else {
            $posti = Post::with('user')
            ->whereBetween('posts.created_at', array(Carbon::now()->subHours(48), Carbon::now()))
            ->orderBy('posts.created_at', 'DESC')
            ->orderByVotes()
            ->take(20)
            ->get();
            return response()->json(['posti' => $posti])->withCallback($request->input('callback')); 
            // if ($posti->isEmpty()) {
            //     $post = [];
            //     return response()->json(['post' => $post]);                     
            // } else {
            //     $post_id = $posti[rand(0, count($posti) - 1)];
            //     $post = Post::find($post_id->id);
            //     $comments = Comment::where('post_id', '=', $post->id)->get();
            //     $upvoti = Glas::where('post_id', '=', $post->id)->where('type', '=', 1)->count();
            //     $downvoti = Glas::where('post_id', '=', $post->id)->where('type', '=', 2)->count();
            //     $skupni_glasovi = $upvoti - $downvoti;
            //     return response()->json(['posti' => $post, 'comments' => $comments, 'skupni_glasovi' => $skupni_glasovi]);        
       
            // }
        }
    }
    public function domov()
    {
        return view('domov');
    }
}
