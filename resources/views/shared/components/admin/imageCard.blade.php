<div class="card h-100" data-hex-color="{{$image->average_color}}">
    <img
        src="{{Storage::disk('public')->url("images/".$image->path)}}"
        class="card-img-top mb-auto"
        alt="{{$image->title}}">
    <div class="card-body flex-grow-0 mt-auto">
        @if($image->title)
        <p class="card-text">{{$image->title}}</p>
        @endif
        <a href="{{ route('admin.image.update', ['image' => $image->id]) }}" class="btn btn-primary">@lang('admin.image.list.edit')</a>
        <button
            class="btn btn-danger"
            data-delete-image="{{$image->id}}">
            @lang('admin.image.list.delete')
        </button>
    </div>
</div>
