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
<div class="row">
    @foreach($images as $image)
    <div class="col">
        @include('shared.components.admin.imageCard', ['image' => $image])
    </div>
    @endforeach
</div>
@endsection
