@extends('shared.templates.public')
@section('title', $post->title)
@section('content')
    <div class="post">
        <h1>{{$post->title}}</h1>
        <section>
            {!!$post->body!!}
        </section>
    </div>
@endsection
