@extends('shared.templates.admin')
@section('title', __('admin.image.list.title'))
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>
        @lang('admin.image.list.h1')
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a class="btn btn-success btn-toolbar" href="{{ route('admin.image.create') }}">@lang('admin.image.list.add')</a>
    </div>
</div>
@if(count($images) > 0)
<div class="row mb-4">
    @foreach($images as $image)
    <div class="col-2">
        @include('shared.components.admin.imageCard', ['image' => $image])
    </div>
    @endforeach
</div>
<div class="row">
    <div class="col-12 d-flex justify-content-center">
        @include('shared.components.admin.pagination', ['collection' => $images])
    </div>
</div>
@else
<div class="row justify-content-center">
    <div class="col-6">
        @include('shared.components.admin.warning',
        [
            'icon' => 'cloud-rain',
            'variant' => 'warning',
            'title' => __('admin.image.errors.no-images.title'),
            'message' => __('admin.image.errors.no-images.preamble')
        ])
    </div>
</div>
@endif
@endsection
