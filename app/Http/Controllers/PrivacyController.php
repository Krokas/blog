<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class PrivacyController extends Controller
{
    public function index()
    {
        $privacy = Setting::where('code', 'privacy_body')->first();
        if (!$privacy) abort(404);
        return view('privacy')->with(['privacy' => $privacy]);
    }
}
