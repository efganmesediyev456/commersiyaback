@if($posts->count())
@foreach($posts as $post)
<div class="col-sm-6 col-lg-4">
    <a class="card" href="{{ route('article',[$post->type,$post->id,$post->slug]) }}">
        <div class="cover">
            <img class="image" alt="{{ mb_strimwidth($post->title,0,90,'...') }}" src="{{ config('app.url') . $post->image}}">
        </div>
        <time>
            {{ $post->date }}
        </time>
        <p>
            {{ mb_strimwidth($post->title,0,90,'...') }}
        </p>
    </a>
</div>
@endforeach
@else
    <div class="col-12">
        <h3 class="not-found">Melumat tapilmadi</h3>
    </div>

@endif

