<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class EmailController extends Controller
{
    public function preview(Request $request) {
        if ($request->template) {
            $template = 'emails.'.$request->template;
            if(View::exists($template)) {
                return view($template);
            }
        }
        abort(404);
    }
}
