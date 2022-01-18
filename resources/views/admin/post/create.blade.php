@extends('shared.templates.admin')
@section('title', __('admin.post.create.title'))
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>
            @lang('admin.post.create.h1')
        </h1>
        <div class="btn-toolbar mb-2 mb-md-0"></div>
    </div>
    <div id="typing"></div>
    <div class="post__edit">
        <form id="post" method="POST">
            <div class="row g-2 mb-3">
                <div class="col-6">
                    <label for="title" class="form-label">@lang('admin.post.title')</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="col-6">
                    <label for="slug" class="form-label">@lang('admin.post.slug')</label>
                    <input type="text" name="slug" class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <textarea name="body"></textarea>
            </div>
            @csrf
        </form>
    </div>
@endsection
