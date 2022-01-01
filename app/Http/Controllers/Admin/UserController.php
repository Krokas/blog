<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Login as LoginRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        return view('admin.login');
    }

    public function login(LoginRequest $request) {

        if(Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withInput()->withErrors(['authenticate.failed' => __('admin.login.authenticate.failed')]);
    }
}
