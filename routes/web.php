<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get("/sample", "App\Http\Controllers\Sample\IndexController@show");
Route::get("/sample/{id}", "App\Http\Controllers\Sample\IndexController@showId");

Route::get("/tweet", "App\Http\Controllers\Tweet\IndexController")
->name("tweet.index");
Route::post("/tweet/create", "App\Http\Controllers\Tweet\CreateController")
->name("tweet.create");
Route::get("/tweet/update/{tweetId}", "App\Http\Controllers\Tweet\Update\IndexController")
->name("tweet.update.index")
->where("tweetId", "[0-9]+");
Route::put("/tweet/update/{tweetId}", "App\Http\Controllers\Tweet\Update\PutController")
->name("tweet.update.put")
->where("tweetId", "[0-9]+");
Route::delete("/tweet/delete/{tweetId}", "App\Http\Controllers\Tweet\DeleteController")
->name("tweet.delete");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
