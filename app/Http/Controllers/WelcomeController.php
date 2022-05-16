<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class WelcomeController extends Controller
{
    public function index()
    {
        $posts = Post::active()->with(['image', 'category'])->get();
        return view('welcome')->with(['posts' => $posts]);
    }
}
