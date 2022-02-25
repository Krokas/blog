<div class="card h-100" data-hex-color="{{$image->average_color}}">
    <img
        src="{{Storage::disk('public')->url("images/".$image->path)}}"
        class="card-img-top mb-auto"
        alt="{{$image->title}}">
    <div class="card-body flex-grow-0 mt-auto">
        @if($image->title)
        <p class="card-text">{{$image->title}}</p>
        @endif
        <a href="#" class="btn btn-primary">@lang('admin.image.list.edit')</a>
    </div>
</div>
