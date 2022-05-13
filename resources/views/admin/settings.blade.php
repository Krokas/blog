@extends('shared.templates.admin')
@section('title', __('admin.settings.title'))
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>
            @lang('admin.settings.h1')
        </h1>
        <div class="btn-toolbar mb-2 mb-md-0"></div>
    </div>
    <div class="border-bottom admin-page">
        <h2>
            @lang('admin.settings.privacy.consent.h2')
        </h2>
        <form method="POST" action="{{ route('admin.settings.consent_modal') }}">
            @csrf
            <div class="mb-3">
                <label for="consent_title">@lang('admin.settings.privacy.consent.title')</label>
                <input type="text" name="consent_title" class="form-control" value="{{old('consent_title', isset($consentModal['title']) ? $consentModal['title'] : null)}}">
            </div>
            <div class="mb-3">
                <label for="consent_body">@lang('admin.settings.privacy.consent.body')</label>
                <textarea name="consent_body">
                    {{old('consent_body', isset($consentModal['body']) ? $consentModal['body'] : null)}}
                </textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">
                    @lang('admin.settings.privacy.consent.submit')
                </button>
            </div>
        </form>
    </div>
    <div class="border-bottom admin-page">
        <h2>@lang('admin.settings.privacy.privacy.h2')</h2>
        <form method="POST" action="{{ route('admin.settings.privacy') }}">
            @csrf
            <div class="mb-3">
                <label for="privacy_body">@lang('admin.settings.privacy.privacy.body_label')</label>
                <textarea name="privacy_body">
                    {{ old('privacy_body', isset($privacy) ? $privacy : null) }}
                </textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">@lang('admin.settings.privacy.privacy.submit')</button>
            </div>
        </form>
    </div>
@endsection
