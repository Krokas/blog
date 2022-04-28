<section class="consent" style="visibility: hidden;" data-consent>
    <div class="consent__preamble">
        @if($consentModal['title'])
            <h2>{{ $consentModal['title'] }}</h2>
        @endif
        @if($consentModal['body'])
            {!! $consentModal['body'] !!}
        @endif
    </div>
    <div class="consent__cta">
        <button data-essentials class="button">@lang('settings.consent.essentials')</button>
        <button data-analytics class="button button--secondary">@lang('settings.consent.analytics')</button>
    </div>
</section>
