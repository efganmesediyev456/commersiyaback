@if($posts->count())

                    @foreach($posts as $post)
                    <div class="col-md-6">
                        <a href="{{ route('article',[$post->type,$post->id,$post->slug]) }}" class="administration__item">
                            <div class="administration__image">
                                <img src="{{ config('app.url') . $post->image}}" alt="{{ mb_strimwidth($post->title,0,90,'...') }}" alt="">
                            </div>
                            <div class="administration__text">
                                <span class="administration__date">{{ $post->date }}</span>
                                <span style="overflow: hidden;
text-overflow: ellipsis;
display: -webkit-box;
-webkit-line-clamp: 3;
-webkit-box-orient: vertical;" class="administration__title">{{ mb_strimwidth($post->title,0,90,'...') }}</span>
                                <span class="administration__position" style="height: 40px">{{ mb_strimwidth($post->subtitle,0,100,'...') }}</span>
                            </div>
                            
                        </a>
                    </div>
                    @endforeach

@endif
