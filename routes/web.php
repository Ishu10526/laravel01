<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\userController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $posts = [];
    if (auth()->check()){
        $posts = auth()->user()->usersPosts()->latest()->get();
    }
  //  $posts = Post::where('user_id',auth()->id())->get();
    return view('home',['posts'=> $posts]);
});

Route::post('/register',[userController::class, 'register']);
Route::post('/logout',[userController::class,'logout']);
Route::post('/login',[userController::class,'login']);

//post routes
Route::post('/create-post',[postController::class,'createPost']);
Route::get('/edit-post/{post}',[postController::class,'editPost']);
Route::put('/edit-post/{post}',[postController::class,'updatePost']);
Route::delete('/delete-post/{post}',[postController::class,'deletePost']);