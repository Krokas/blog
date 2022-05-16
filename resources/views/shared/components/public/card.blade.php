<a href="{{ route('post', ['post' => $post]) }}" class="card">
        <div class="card__image-container"  style="--image-color: {{ $post->image ? $post->image->average_color : '#fff'}};">
            @if($post->image)
                <img src="{{asset('/storage/images/' . $post->image->path)}}" alt="{{$post->image->title}}">
            @endif
        </div>
        <div class="card__preamble">
            @if($post->category)
            <div class="card__category">
                <span class="card__badge">{{$post->category->name}}</span>
            </div>
            @endif
            <h3>{{$item->title}}</h3>
        </div>
</a>
