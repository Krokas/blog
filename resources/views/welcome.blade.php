@extends('shared.templates.public')
@section('title', "Index")
@section('content')
    @foreach ($posts as $post)
        <article>
            <h3>{{$post->title}}</h3>
        </article>
    @endforeach
@endsection
