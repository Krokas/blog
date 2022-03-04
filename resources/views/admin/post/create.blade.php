@extends('shared.templates.admin')

@if(Route::current()->getName() === 'admin.post.create')
    @section('title', __('admin.post.create.title'))
@else
    @section('title', $post->title . " | " . __('admin.post.update.title'))
@endif
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>
            @if(Route::current()->getName() === 'admin.post.create')
                @lang('admin.post.create.h1')
            @else
                @lang('admin.post.update.h1')
            @endif
        </h1>
        <div class="btn-toolbar mb-2 mb-md-0"></div>
    </div>
    <div id="typing"></div>
    <div class="post__edit">
        <form id="post" method="POST">
            <div class="row g-2 mb-3">
                <div class="col-6">
                    <label for="title" class="form-label">@lang('admin.post.title')</label>
                    <input type="text" name="title" class="form-control" value="{{old('title', isset($post) ? $post->title : null)}}">
                </div>
                <div class="col-6">
                    <label for="slug" class="form-label">@lang('admin.post.slug')</label>
                    <input type="text" name="slug" class="form-control" value="{{old('slug', isset($post) ? $post->slug : null)}}">
                </div>
            </div>
            <div class="mb-3">
                <label for="image_id" class="form-label">@lang('admin.post.image')</label>
                <select
                    name="image_id"
                    value="{{old('slug', isset($post) ? $post->image_id : null)}}"
                    class="form-control">
                    <option value="">@lang('admin.labels.emptySelect')</option>
                    @foreach($images as $image)
                        <option
                            value="{{$image->id}}"
                            @if(isset($post) && $image->id === $post->image_id) selected @endif
                            >{{$image->id}}: {{ $image->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <textarea name="body">
                    {{ old('body', isset($post) ? $post->body : null) }}
                </textarea>
            </div>
            @csrf
        </form>
    </div>
@endsection
