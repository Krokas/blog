<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Login as LoginRequest;
use App\Http\Requests\Admin\UserUpdate as UserUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Verification;
use App\Mail\UserCreated;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    public function index() {
        if(!Auth::check()) {
            return view('admin.login');
        }
        return redirect()->route('admin.dashboard');
    }

    public function login(LoginRequest $request) {

        if(Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withInput()->withErrors(['authenticate.failed' => __('admin.login.authenticate.failed')]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function verify(Request $request) {
        if ($request->hash) {
            $verification = Verification::where('hash', $request->hash)->first();
            if($verification && $verification->user) {
                return view('admin.user.verify')->with(['user' => $verification->user]);
            }
            abort(404);
        }

        abort(400);
    }

    public function create(Request $request)
    {
        if ($request->hash) {
            $verification = Verification::where('hash', $request->hash)->first();
            if($verification && $verification->user) {
                $user = $verification->user;
                $user->name = $request->input('name');
                $user->password = bcrypt($request->input('password'));
                $user->save();

                Mail::to($user->email)->send(new UserCreated($user));
                $verification->delete();

                return redirect()->route('admin.login')->with(['email' => $user->email]);
            }
            abort(404);
        }
        abort(400);
    }
}
