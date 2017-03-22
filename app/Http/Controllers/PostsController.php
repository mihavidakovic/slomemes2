<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
	public function dodajGet() {
		return view('dodaj');
	}
	public function ustvariGet() {
		return view('ustvari');
	}
}
