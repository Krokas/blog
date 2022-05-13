@extends('shared.templates.public')
@section('title', __('privacy.title'))
@section('content')
<h1>@lang('privacy.title')</h1>
<section class="privacy">
    {!! $privacy->value !!}
</section>
@endsection
