@extends('shared.templates.admin')
@if(Route::current()->getName() === 'admin.image.create')
    @section('title', __('admin.image.create.title'))
@else
    @section('title', __('admin.image.update.title'))
@endif
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>
        @if(Route::current()->getName() === 'admin.image.create')
            @lang('admin.image.create.h1')
        @else
            @lang('admin.image.update.h1')
        @endif
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0"></div>
</div>
<form method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">@lang('admin.image.create.labels.title')</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', isset($image) ? $image->title : null) }}">
    </div>
    <div class="mb-3">
        @if(Route::current()->getName() === 'admin.image.create')
            <label for="image" class="form-label">@lang('admin.image.create.labels.image')</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        @else
            <div class="card w-50">
                <img src="{{asset("storage/images/".$image->path)}}" alt="" class="@if($image->average_color) card-img-top @else card-img @endif">
                @if($image->average_color)
                    <div class="card-body d-flex justify-content-center average-color" style="--average-color:{{$image->average_color}};">
                        <span>{{$image->average_color}}</span>
                    </div>
                @endif
            </div>
        @endif
    </div>
    <div class="mb-3"></div>
    <button type="submit" class="btn btn-primary">
        @lang('admin.image.create.submit')
    </button>
</form>
@endsection
