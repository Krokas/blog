@extends('shared.templates.public')
@section('title', $post->title)
@section('content')
    <div class="post">
        <section class="post__preamble">
            <h1>{{$post->title}}</h1>
            <p>
                @if($post->published_at)
                    {{Carbon::parse($post->published_at)->toDateString()}}
                @endif
            </p>
        </section>
        <section>
            {!!$post->body!!}
        </section>
    </div>
@endsection
