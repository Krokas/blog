<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewPostSaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Http\Requests\Admin\UpdatePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate();
        return view('admin.post.list')->with(['posts' => $posts]);
    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function saveNew(NewPostSaveRequest $request)
    {

        $user = Auth::user();
        $post = new Post();
        $post->user_id = $user->id;
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->position = 0;
        $post->active = 0;

        if($post->save()) {
            //TODO: Might want to add Success message
            return redirect()->route('admin.post.index');
        }
        abort(400);
    }

    public function edit(Post $post)
    {
        return view('admin.post.create')->with(['post' => $post]);
    }

    public function update(Post $post, UpdatePostRequest $request)
    {
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        if($post->save()) {
            // TODO: redirect with a Success message
            return redirect()->back();
        }
        abort(400);
    }
}
