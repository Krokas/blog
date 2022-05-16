<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewPostSaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\Admin\UpdatePostRequest;
use App\Http\Resources\Admin\Post as PostResource;
use App\Models\Image;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate();
        return view('admin.post.list')->with(['posts' => $posts]);
    }

    public function create()
    {
        $images = Image::all();
        $categories = Category::all();
        return view('admin.post.create')->with(['images' => $images, 'categories' => $categories]);
    }

    public function saveNew(NewPostSaveRequest $request)
    {

        $user = Auth::user();
        $post = new Post();
        $post->user_id = $user->id;
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->image_id = $request->input('image_id');
        $post->category_id = $request->input('category_id');
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
        $images = Image::all();
        $categories = Category::all();
        return view('admin.post.create')->with(['post' => $post, 'images' => $images, 'categories' => $categories]);
    }

    public function update(Post $post, UpdatePostRequest $request)
    {
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->image_id = $request->input('image_id');
        $post->category_id = $request->input('category_id');
        if($post->save()) {
            // TODO: redirect with a Success message
            return redirect()->back();
        }
        abort(400);
    }

    public function apiToggle(Post $post)
    {
        $toggleTo = $post->active > 0 ? 0 : 1;
        $post->active = $toggleTo;
        $post->save();
        return response()->json(new PostResource($post));
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
