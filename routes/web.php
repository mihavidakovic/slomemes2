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

Route::get('posti',[
	'as' => 'posti',
	'uses' => 'HomeController@posti'
]);

Route::get('test',[
	'as' => 'test',
	'uses' => 'HomeController@test'
]);


Route::get('login/{service}',[
	'as' => 'login-service',
	'uses' => 'Auth\SocialLoginController@redirect'
]);

Route::get('login/{service}/callback',[
	'as' => 'login-service-callback',
	'uses' => 'Auth\SocialLoginController@callback'
]);


Route::get('meme/{id}',[
	'as' => 'meme',
	'uses' => 'HomeController@getMeme'
])->where('id', '[0-9]+');


// PROFIL
Route::get('uporabnik/{name}',[
	'as' => 'profil',
	'uses' => 'UserController@profilGet'
]);

Route::get('uporabnik/{name}/liked',[
	'as' => 'profil-lied',
	'uses' => 'UserController@profilGetLiked'
]);

Route::get('uporabnik/{name}/disliked',[
	'as' => 'profil-dislied',
	'uses' => 'UserController@profilGetDisliked'
]);


// UREDI PROFIL
Route::get('profil/uredi',[
	'as' => 'profil-uredi',
	'uses' => 'UserController@profilUrediGet'
]);
Route::post('profil/uredi',[
	'uses' => 'UserController@profilUrediPost'
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

// KOMENTARJI
Route::post('comment/{id}/add',[
	'as' => 'add-comment',
	'uses' => 'CommentsController@addComment'
]);


