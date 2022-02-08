@extends('shared.templates.public')
@section('title', "Index")
@section('content')
    <ul class="post-list">
    @foreach ($posts as $post)
        <li class="post-list__item">
            @include('shared.components.public.card', ['item' => $post])
        </li>
    @endforeach
    </ul>
@endsection
