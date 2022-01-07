@extends('shared.templates.admin')
@section('title', __('admin.dashboard.title'))
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>
            @lang('admin.dashboard.h1')
        </h1>
        <div class="btn-toolbar mb-2 mb-md-0"></div>
    </div>
@endsection
