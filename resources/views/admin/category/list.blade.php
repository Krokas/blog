@extends('shared.templates.admin')
@section('title', __('admin.category.list.title'))
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>
        @lang('admin.category.list.title')
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a class="btn btn-success btn-toolbar" href="{{ route('admin.category.create') }}">@lang('admin.category.list.add')</a>
    </div>
</div>
@if(count($categories) > 0)
<div class="row mb-4">
    <table class="post__table">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">@lang('admin.category.form.name')</th>
              <th scope="col">@lang('admin.category.form.slug')</th>
              <th scope="col">@lang('admin.category.list.actions')</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($categories as $category)
              <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>
                    <a href="{{ route('admin.category.update', ['category' => $category->id]) }}">
                        {{ $category->name }}
                    </a>
                </td>
                <td>
                    <span>{{ $category->slug }}</span>
                </td>
                <td>
                    <a
                    href="{{route('admin.category.delete', ['category' => $category->id])}}"
                    class="btn btn-danger"
                    data-confirm="@lang('admin.category.confirm.delete')">
                        @lang('admin.category.list.delete')
                    </a>
                </td>
              </tr>
              @endforeach
          </tbody>
    </table>
</div>
<div class="row">
    <div class="col-12 d-flex justify-content-center">
        @include('shared.components.admin.pagination', ['collection' => $categories])
    </div>
</div>
@else
<div class="row justify-content-center">
    <div class="col-6">
        @include('shared.components.admin.warning',
        [
            'icon' => 'cloud-rain',
            'variant' => 'warning',
            'title' => __('admin.category.errors.no-categories.title'),
            'message' => __('admin.category.errors.no-categories.preamble')
        ])
    </div>
</div>
@endif
@endsection
