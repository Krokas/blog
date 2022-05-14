@extends('shared.templates.admin')
@if(Route::current()->getName() === 'admin.category.create')
    @section('title', __('admin.category.create.title'))
@else
    @section('title', __('admin.category.update.title'))
@endif
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>
        @if(Route::current()->getName() === 'admin.category.create')
            @lang('admin.category.create.title')
        @else
            @lang('admin.category.update.title')
        @endif
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0"></div>
</div>
<form method="post">
    @csrf
    <div class="mb-3">
        <label for="name">@lang('admin.category.form.name')</label>
        <input type="text" name="name" class="form-control" value="{{old('name', isset($category['name']) ? $category['name'] : null)}}">
    </div>
    <div class="mb-3">
        <label for="slug">@lang('admin.category.form.slug')</label>
        <input type="text" name="slug" class="form-control" value="{{old('slug', isset($category['slug']) ? $category['slug'] : null)}}">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">
            @lang('admin.category.create.submit')
        </button>
    </div>
</form>
@endsection
