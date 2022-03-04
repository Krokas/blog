<a href="#" class="card">
        <div class="card__image-container"  style="--image-color: {{ $post->image ? $post->image->average_color : '#fff'}};">
            @if($post->image)
                <img src="{{asset('/storage/images/' . $post->image->path)}}" alt="{{$post->image->title}}">
            @endif
        </div>
        <div class="card__preamble">
            <div class="card__category">
                {{-- TODO: implement categories --}}
                <span class="card__badge">{{__('categories.politics')}}</span>
            </div>
            <h3>{{$item->title}}</h3>
        </div>
</a>
