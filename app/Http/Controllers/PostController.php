<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Case_;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::withTrashed()->paginate(8);
        return view('posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // return $request->all();
        Post::create([
            'title'=> $request->title,
            'user_id' => 1,
            'description'=>$request->description,
            'is_publish'=>$request->is_publish,
            'is_active'=>$request->is_active
        ]);
        $request->session()->flash('alert-info','Post Update Successfully');
        return to_route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        if(!$post){
            abort(403);
        }
        return view('posts.show', ['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        if(!$post){
            abort(404);
        }
        return view('posts.edit', ['post'=>$post]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        if(!$post){
            abort(404);
        }
        $post->update([
            'title'=> $request->title,
            'description'=>$request->description,
            'is_publish'=>$request->is_publish,
            'is_active'=>$request->is_active
        ]);
        $request->session()->flash('alert-info','Post Update Successfully');
        return to_route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(!$post){
            abort(404);
        }
        $post->delete();
        request()->session()->flash('alert-info','Post Delete Successfully');
        return to_route('posts.index');

    }
    public function softDelete($id){
        $post = Post::onlyTrashed()->find($id);
        if(!$post){
            abort(404);
        }
        $post->update([
            'deleted_at' => null
        ]);
        request()->session()->flash('alert-message','Post Recoved Successfully');
        return to_route('posts.index');
    }
    public function getPosts()
    {
      return DB::table('posts')->first();  
    }
}
