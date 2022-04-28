<?php

namespace App\View\Composers;

use App\Models\Setting;
use Illuminate\View\View;

class ConsentComposer
{
    /**
     * The user repository implementation.
     *
     * @var \App\Repositories\UserRepository
     */
    protected $consent;

    /**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct()
    {
        $consentTitle = Setting::where('code', 'consent_title')->select('value')->first();
        $consentBody = Setting::where('code', 'consent_body')->select('value')->first();
        $consentModal = [
            'title' => isset($consentTitle) ? $consentTitle->value : __('settings.consent.title'),
            'body' => isset($consentBody) ? $consentBody->value : __('settings.consent.body')
        ];
        $this->consent = $consentModal;
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('consentModal', $this->consent);
    }
}
