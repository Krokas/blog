@if(Route::current()->getName() !== 'privacy' && $consentModal['privacyUpdatedAt'])
<privacy-modal
    title="{{$consentModal['title']}}"
    body="{{$consentModal['body']}}"
    essentials-button-label="@lang('settings.consent.essentials')"
    analytics-button-label="@lang('settings.consent.analytics')"
    consent-version="{{$consentModal['privacyUpdatedAt']->updated_at}}"
/>
@endif
