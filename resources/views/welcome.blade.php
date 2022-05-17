@extends('shared.templates.public')
@section('title', "Index")
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

@endif
@endsection
