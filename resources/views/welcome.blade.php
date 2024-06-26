@extends('shared.templates.public')
@section('title', __('welcome.title'))
@section('content')
@if(count($posts) > 0)
    <ul class="post-list">
    @foreach ($posts as $post)
        <li class="post-list__item">
            @include('shared.components.public.card', ['item' => $post])
        </li>
    @endforeach
    </ul>
@else
    <div class="notice">
        <h1>@lang('welcome.no-posts.title')</h1>
        <p>@lang('welcome.no-posts.preamble')</p>
    </div>
@endif
@endsection
