<div class="card" style="width: 28.8rem;" data-hex-color="{{$image->average_color}}">
    <img src="{{Storage::disk('public')->url("images/".$image->path)}}" class="card-img-top" alt="{{$image->title}}">
    <div class="card-body">
        @if($image->title)
        <p class="card-text">{{$image->title}}</p>
        @endif
        <a href="#" class="btn btn-primary">@lang('admin.image.list.edit')</a>
    </div>
</div>
