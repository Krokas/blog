@extends('shared.templates.email')
@section('content')
<h1>@lang('email.user.verify.h1')</h1>
<p style="margin: 0 0 2rem;">@lang('email.user.verify.description')</p>
<a
    style="padding: 1rem 2rem; border: 1px transparet; border-radius: 0.25rem; background-color: #0d6efd; color: #ffffff; font-weight: 700;
        text-decoration: none;"
    href="{{ $url ?? '' }}" target="_blank">@lang('email.user.verify.button')</a>

<style>
    a:hover { background-color: #0b5ed7 !important; }
</style>
@endsection
