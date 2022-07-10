<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ConsentModalRequest;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function index()
    {
        $consentTitle = Setting::where('code', 'consent_title')->select('value')->first();
        $consentBody = Setting::where('code', 'consent_body')->select('value')->first();
        $consentModal = [
            'title' => $consentTitle ? $consentTitle->value : null,
            'body' => $consentBody ? $consentBody->value : null
        ];

        $privacyBody = Setting::where('code', 'privacy_body')->select('value')->first();
        return view('admin.settings')->with(['consentModal' => $consentModal, 'privacy' => $privacyBody ? $privacyBody->value : null]);
    }

    public function saveConsentModal(ConsentModalRequest $request)
    {
        $title_code = 'consent_title';
        $body_code = 'consent_body';
        $title = Setting::where('code', $title_code)->first();
        $body = Setting::where('code', $body_code)->first();
        if(!$title) {
            $title = new Setting();
        }
        if(!$body) {
            $body = new Setting();
        }
        $title->code = $title_code;
        $title->value = $request->input($title_code);

        $body->code = $body_code;
        $body->value = $request->input($body_code);

        $title->save();
        $body->save();


        return redirect()->route('admin.settings');
    }

    public function savePrivacy(Request $request)
    {
        $body_code = 'privacy_body';
        $body = Setting::where('code', $body_code)->first();
        if(!$body) {
            $body = new Setting();
        }

        $body->code = $body_code;
        $body->value = $request->input($body_code);
        $body->save();

        return redirect()->route('admin.settings');
    }
}
