<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Image;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/greeting', function () {
//     return "Hello world";
// });


// Route::get('/greeting/{id?}', function ($id) {
//     return "User id is ".$id;
// }); 


// Route::get('/user/{name}', function ($name) {
//         return "Test User";
//     })->where('name', '[A-Za-z]');


// Route::get('/user/{id}', function ($id) {
//     return "Test User";
// })->where('id', '[0-9]');


// Route::get('/', function () {
//     return 'welcome';
// });

// Route::redirect('/','login');

// Route::get('login', function(){
// return "Login page";    
// });


// Route::get('login', function(){
// return "<a href='about'>About</a>";    
// });

// Route::get('about', function(){
//     return "About Page";
// });

// Route::view('greeting','greeting');

// Route::get('greeting',function(){
//     $name='Shoaib';
//     // return view('greeting',['name'=>$name]);
//     // return view('greeting',compact('name'));
//     return view('greeting')->with('name',$name);
// });

Route::view('/','layouts.master');
// Route::view('user','user');

Route::get('users',[UserController::class, 'index']);

Route::get('users/show/{id}', [UserController::class,'show']);

// Route::resource('posts', PostController::class);

// Route::get('/connection', function(){
//     try{
//     DB::connection()->getPdo();
//     return "Successfull connected";
//     }
//     catch(\Exception $ex){
//         dd($ex->getMessage());
//     }
// });


// Route::get('post', function(){

//     Post::create([
//         'title' => 'Laravel 9.1.1',
//         'description' => 'This series is from beginner lavel to advance.',
//         'is_publish' => false,
//         'is_active' => false,

//     ]);

    // $posts = Post::all();

    // $posts = Post::findOrFail(2);
    // $posts->update([
    //     'title' =>'Larravel 9.1.1'
    // ]);
    // return $posts;


    // $post = Post::findOrFail(3);
    // $post->delete();
    // return "Delete Successfully";

// });

// Route::get('posts',[PostController::class,'index']);
// Route::get('posts/store',[PostController::class,'store']);
// Route::get('posts/update',[PostController::class,'update']);
// Route::get('posts/destroy',[PostController::class,'destroy']);


// Route::get('test',function(){

//     Session::put('login','You are login');
//     // Session::flush();
//     if (Session::has('login')) {
//        return'Session set';
//     } else {
//         return'Session not set';
//     }
    
// });

Route::resource('posts',PostController::class);
Route::get('posts/soft-delete/{id}',[PostController::class, 'softDelete'])->name('posts.soft-delete');

// Route::get('get/posts', [PostController::class , 'getPosts'])->name('get.posts');

Route::get('test',function(){
    // $user= User::first();
    // return $user->post;

    // $user = User::first();
    // return $user->posts;
    
    // $user = User::first();
    // return $user->postComment;

    //  $user = User::first();
    //  $post = Post::first();

    //  return $user->roles()->attach($post);


    //   $user = User::first();
    //   return $user->image;

    // $post=Post::first();
    // return $post->image;

    // $image=Image::first();
    // return $image->imageable;
    
    //   $user = User::first();
    //   return $user->images;

    // $post=Post::first();
    // return $post->images;

    $post = Post::first();
    return $post->tags;

});
