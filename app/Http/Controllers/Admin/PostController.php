<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewPostSaveRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function saveNew(NewPostSaveRequest $request)
    {
        dd($request);

    }
}
