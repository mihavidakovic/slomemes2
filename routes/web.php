<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();


Route::get('home',[
	'as' => 'home',
	'uses' => 'HomeController@home'
]);
Route::get('/',[
	'as' => 'domov',
	'uses' => 'HomeController@domov'
]);


// DODAJ MEME
Route::get('meme/dodaj',[
	'as' => 'meme-dodaj',
	'uses' => 'PostsController@dodajGet'
]);

Route::post('meme/dodaj',[
	'as' => 'meme-dodaj-post',
	'uses' => 'PostsController@dodajPost'
]);


// USTVARI MEME
Route::get('meme/ustvari',[
	'as' => 'meme-ustvari',
	'uses' => 'PostsController@ustvariGet'
]);


// GLASOVANJE
Route::get('post/{id}/upvote',[
	'as' => 'post-upvote',
	'uses' => 'PostsController@postUpvote'
]);

Route::get('post/{id}/downvote',[
	'as' => 'post-downvote',
	'uses' => 'PostsController@postDownvote'
]);

Route::get('add/{num}/posts',[
	'as' => 'add-posts-faker',
	'uses' => 'FakerController@addPosts'
]);