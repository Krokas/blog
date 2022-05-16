<div class="alert alert-{{isset($variant) ? $variant : 'primary'}}" role="alert">
    @if(isset($title))
    <h2 class="alert-heading">
        @if(isset($icon))
        <i data-feather="{{$icon}}"></i>
        @endif
        {{$title}}
    </h2>
    @endif
    <p>{!! $message !!}</p>
</div>
