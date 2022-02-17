@extends('shared.templates.admin')
@section('title', __('admin.image.create.title'))
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>
        @lang('admin.image.create.h1')
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0"></div>
</div>
<form method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">@lang('admin.image.create.labels.title')</label>
        <input type="text" name="title" class="form-control">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">@lang('admin.image.create.labels.image')</label>
        <input type="file" name="image" class="form-control" accept="image/*">
    </div>
    <div class="mb-3"></div>
    <button type="submit" class="btn btn-primary">
        @lang('admin.image.create.submit')
    </button>
</form>
@endsection
