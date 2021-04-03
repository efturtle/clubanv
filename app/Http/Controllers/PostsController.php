<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{
    
    public function index()
    {
        return view('posts.index', [
            'postlist' => Posts::all()
        ]);
    }


    public function store(Request $request)
    {
        $post = Posts::create($this->validatePost());
        return redirect(route('post.show', $post));
    }


    public function show(Posts $post)
    {
        return view('posts.show', compact('post'));
    }

    
    public function edit(Posts $post)
    {
        return view('posts.edit', compact('post'));
    }


    public function update(Request $request, Posts $post)
    {
        $post->update($this->validatePost());

        return redirect(route('post.show', $post));
    }
    
    public function delete(Posts $post){
        $post->delete();

        $post->save();

        return redirect('/posts');
    }

    
    protected function validatePost(){
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
    }

}
