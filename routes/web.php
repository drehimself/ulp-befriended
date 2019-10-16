<?php

use App\User;
use App\Tweet;

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

Route::get('/', function () {
    $user1 = User::find(1);
    $user2 = User::find(2);
    $user3 = User::find(3);

    $user1->unfollow($user3);

    dd(User::followedBy($user1)->get());

    dd($user1->following()->get());

    return view('welcome');
});

Route::get('/feed', function () {
    $following = auth()->user()->following()->get();
    $ids = $following->pluck('id');

    $tweets = Tweet::whereIn('user_id', $ids)->get();

    return $tweets;
});

Route::get('/likes', function () {
    $user1 = User::find(1);

    $tweet5 = Tweet::find(5);
    $tweet6 = Tweet::find(6);

    $user1->like($tweet5);
    $user1->like($tweet6);

    return $user1->liking(Tweet::class)->get();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
