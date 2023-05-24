@if(count($gallery))

<div class="col-12 mt-24 image">
    <div class="slider owl-carousel">
        @foreach($gallery as $key => $value)
            <div class="cover" data-id="{{$loop->iteration}}"><img alt="{{$post->title}}" src="{{$value}}"></div>
        @endforeach


    </div>
    @if(count($gallery) > 1)
    <div class="slide-photos-container">
        <div class="slide-photos owl-carousel mt-8">
            @foreach($gallery as $key => $value)
                <div class="cover" data-id="{{$loop->iteration}}"><img alt="{{$post->title}}" src="{{$value}}"></div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endif
