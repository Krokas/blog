@extends('shared.templates.email')
@section('content')
<h1>@lang('email.user.created.h1')</h1>
<p>@lang('email.user.created.preamble')</p>
<p><strong>@lang('email.user.created.email_used'): {{$user->email}}</strong></p>
@endsection
