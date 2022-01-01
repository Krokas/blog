<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Login as LoginRequest;

class UserController extends Controller
{
    public function index() {
        return view('admin.login');
    }

    public function login(LoginRequest $request) {
        dd($request);
    }
}
