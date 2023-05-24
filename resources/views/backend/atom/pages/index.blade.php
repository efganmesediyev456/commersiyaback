@extends('backend.layouts.default')


@section('content')
    @include('backend.includes.breadcrumb')

    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">

            <div class="row">
                <div class="col-lg-12">


                    <div class="card">
                        <div class="div-table">

                            <div class="div-row">
                                <div class="serial" style="width: 60px">#</div>
                                <div class="serial">Name</div>
                                <div class="serial" style="width: 90px">Sıralama</div>
                                <div class="serial" style="width: 200px">Idarə</div>
                            </div>
                        </div>
                        @foreach($page as $key => $p)
                            <div class="div-w active ">
                                <div class="tabb">
                                    <div class="" style="width: 60px">{{$p->id}}</div>

                                    <div class="" style="width: calc(100% - 330px);position: relative">
                                        @if($p->child->count())
                                            <a href="javascript:void(0)" class="btn  btn-outline-warning page-drop active" data-id="{{$p->id}}"></a>
                                        @endif

                                        {{$p->title}}

                                        @if(config_json('templates.'. $p->template .'.simple_items'))
                                            @foreach(config_json('templates.'. $p->template .'.simple_items') as $value => $simple_item)
                                                <a href="{{route('simple-item.index',[
                                                                        'model'   => config_json('templates.'. $p->template .'.type'),
                                                                        'page_id' => $p->id,
                                                                        'type'    => $value,
                                                                        'on_iframe' => 1
                                                                        ])}}" target="_blank" class="btn btn-sm btn-grey simple_item_button btn-outline-primary m-1">
                                                    {{$simple_item}}
                                                </a>
                                            @endforeach
                                        @endif

                                    </div>
                                    <div class="" style="width: 90px">{{$p->ordering}}</div>
                                    <div  style="width: 200px">

                                        @if(\Helper::roleChecker($routeName . '.create'))
                                            <a class="badge btn mr-2 badge-info p-0" href="{{ route($routeName . '.create',['parent_id'=>$p->id]) }}"><i class="far fa-plus size32"></i></a>
                                        @endif
                                        @if($p->id !== 1)

                                        <?php
                                        $link=\App\Helpers\Helper::linkGenerator($p);


                                        ?>




                                            <a class="badge btn mr-2 badge-warning p-0 copy-text-to-clipboard"  data-href="{{ config('app.url') . '/' .app()->getLocale().'/'. $link }}"><i class="far fa-copy size32"></i></a>
                                        @endif
                                        @if(\Helper::roleChecker($routeName . '.edit'))
                                            <a class="badge btn mr-2 badge-complete p-0" href="{{ route($routeName . '.edit',$p->id) }}"><i class="far fa-pencil-alt size32"></i></a>
                                        @endif

                                        @if(\Helper::roleChecker($routeName . '.destroy') && $p->id !== 1)
                                            <form class="d-inline" action="{{ route($routeName . '.destroy',$p->id) }}" method="POST">
                                                {{ method_field('DELETE')}} @csrf
                                                <button class="badge btn badge-danger p-0" onclick="if (!confirm('Silmək istədiyinizdən əminsiniz?')) { return false }"><i class="far fa-trash-alt size32"></i> </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                                <div class="div-child" style="display: none">

                                    {!! $p->getChildren2($p->child,0,$p) !!}

                                </div>
                            </div>
                        @endforeach








                    </div>
                    {{ $page->withQueryString()->links('vendor.pagination.default') }}

                </div>
            </div>


        </div>
        <!-- .animated -->
    </div>
@endsection



@section('js')
    <script>

        $('.page-drop').on('click',function () {
            console.log($(this).parents('.div-w').eq(0).find('.div-child'))

            if ( $(this).parents('.div-w').eq(0).hasClass('active'))
            {
                $(this).parents('.div-w').eq(0).removeClass('active').find('.div-child').eq(0).fadeIn(0) ;
                $(this).removeClass('active')
            }
            else
            {
                $(this).parents('.div-w').eq(0).addClass('active').find('.div-child').eq(0).fadeOut(0) ;
                $(this).addClass('active')
            }

        })


        function copyToClipboard(text) {
            const el = document.createElement('textarea');
            el.value = text;
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
        };

        $('.copy-text-to-clipboard').on('click',function (e) {
            e.preventDefault();
            copyToClipboard($(this).attr('data-href'));
        })

    </script>

@endsection
