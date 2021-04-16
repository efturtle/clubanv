<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{   
    public function index()
    {
        //who is trying to see posts
        //$tempo = DB::table('users')->where('id', '=', Auth::id());

        //if is a member
        if(Auth::user()->memberinfo->id != 0){
            return view('posts.index', [
                'postlist' => Posts::all()
                ->where('club', '=', Auth::user()->memberinfo->club)
                ->where('category', '=', Auth::user()->memberinfo->category )
            ]);
        }
        //if is a Director
        if(Auth::user()->directorinfo->id != 0){
            return view('posts.index', [
                'postlist' => Posts::all()
                ->where('club', '=', Auth::user()->directorinfo->club)
                ->where('category', '=', Auth::user()->directorinfo->category )
            ]);
        }
    }
    
    /* public function indexMember()
    {
        $user = DB::table('users')->where('');
        return view('posts.index', [
            'postlist' => Posts::all()->where('')
        ]);
    } */

/* try out Auth::user()->name */
    public function store(Request $request)
    {
        //query the current user
        $user = DB::table('users')
        ->where('id', '=', Auth::id())
        ->first();

        //post data
        $temp = $this->validatePost();
        
        //user who made the post
        $temp += [
            'privilegio'=>3,
            'club'=>$user->directorinfo->club,
            'category'=>$user->directorinfo->category,
            'user_id'=>Auth::id(),
        ];
        return redirect(route('post.show', Posts::create($temp)));
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
        //query the current user
        $user = DB::table('users')
        ->where('id', '=', Auth::id())
        ->first();

        //post data
        $temp = $this->validatePost();
        
        //user who made the post
        $temp += [
            'privilegio'=>3,
            'club'=>$user->directorinfo->club,
            'category'=>$user->directorinfo->category,
            'user_id'=>Auth::id(),
        ];
        return redirect(route('post.show', $post->update($temp)));
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