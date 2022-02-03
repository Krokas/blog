@extends('shared.templates.admin')
@section('title', __('admin.post.list.title'))
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>
            @lang('admin.post.list.h1')
        </h1>
        <div class="btn-toolbar mb-2 mb-md-0"></div>
    </div>
    @if(count($posts) > 0)
    <table class="post__table">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">@lang('admin.post.list.title')</th>
              <th scope="col">@lang('admin.post.list.active')</th>
              <th scope="col">@lang('admin.post.list.actions')</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($posts as $post)
              <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>
                    <a href="{{ route('admin.post.update', ['post' => $post->id]) }}">
                        {{ $post->title }}
                    </a>
                </td>
                <td>
                    <span class="badge @if($post->active > 0) bg-success @else bg-danger @endif">
                        @if($post->active > 0)
                            @lang('admin.post.list.published')
                        @else
                            @lang('admin.post.list.draft')
                        @endif
                    </span>
                </td>
                <td>
                    <button
                        class="btn @if($post->active > 0) btn-danger @else btn-success @endif"
                        data-post-toggle="{{$post->id}}">
                        @if($post->active > 0)
                            @lang('admin.post.list.unpublish')
                        @else
                            @lang('admin.post.list.publish')
                        @endif
                    </button>
                    <button
                        class="btn btn-danger"
                        data-delete="{{$post->id}}">
                        @lang('admin.post.list.delete')
                    </button>
                </td>
              </tr>
              @endforeach
          </tbody>
    </table>
    @else
        {{-- //TODO: message for no pots. --}}
    @endif
@endsection
