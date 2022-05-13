@extends('shared.templates.public')
@section('title', __('privacy.title'))
@section('content')
<h1>@lang('privacy.title')</h1>
<section>
    {!! $privacy->value !!}
</section>
@endsection
