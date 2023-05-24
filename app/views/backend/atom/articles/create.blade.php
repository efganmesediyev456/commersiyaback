@extends('backend.layouts.default')


@section('content')
    @include('backend.includes.breadcrumb')

    <div class="content">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body card-block">

                            @php
                                $appends = [

                                                             'type'         => request()->get('type'),
                                                             'category'     => request()->get('category')

                                                        ];

                            @endphp

                            <form action="{{route($routeName . '.store',$appends)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf

                                <!-- TABS MULTI LANGUAGE -->

                                    <ul class="nav nav-pills mb-3    nav-sticky" id="pills-tab" role="tablist">
                                        @foreach(config('app.locales') as $locale)
                                            <li class="nav-item">
                                                <a class="nav-link @if($loop->iteration == 1) active show @endif "  data-toggle="pill" href="#tab-{{$loop->iteration}}" role="tab"  aria-selected="true">{{$locale}}</a>
                                            </li>
                                        @endforeach
                                    </ul>


                                    <div class="tab-content" id="pills-tabContent">
                                        @foreach(config('app.locales') as $lang => $locale)
                                            <div class="tab-pane fade @if($loop->iteration == 1) active show @endif" id="tab-{{$loop->iteration}}" role="tabpanel" aria-labelledby="pills-home-tab">

                                                @if(in_object('title', 'article-types.'.request()->get('category') . '.'  . request()->get('type')))
                                                <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label  class=" form-control-label">Başlıq</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text"  name="title[{{$lang}}]" placeholder="" value="{{old('title.'.$lang)}}" class="form-control">
                                                        </div>
                                                    </div>
                                                @endif

                                                    @if(in_object('subtitle', 'article-types.'.request()->get('category') . '.'  . request()->get('type')))
                                                    <div class="row form-group">
                                                                <div class="col col-md-3">
                                                                    <label  class=" form-control-label">Qısa mətn</label>
                                                                </div>
                                                                <div class="col-12 col-md-9">
                                                                    <input type="text"  name="subtitle[{{$lang}}]" placeholder="" value="{{old('subtitle.'.$lang)}}" class="form-control">
                                                                </div>
                                                            </div>
                                                    @endif

                                                    @if(in_object('description', 'article-types.'.request()->get('category') . '.'  . request()->get('type')))
                                                    <div class="row form-group">
                                                                <div class="col col-md-3">
                                                                    <label  class=" form-control-label">Mətn</label><br/>

                                                                </div>
                                                                <div class="col-12 col-md-9">
                                                                    <textarea name="description[{{$lang}}]" class="editor" style="height: 80px">{{old('description.'.$lang)}}</textarea>
                                                                </div>
                                                            </div>
                                                    @endif
                                            </div>
                                        @endforeach
                                    </div>


                                    <!-- END TABS MULTI LANGUAGE -->


                                    @if(in_object('link', 'article-types.'.request()->get('category') . '.'  . request()->get('type')))
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label  class=" form-control-label">Sosial Platforma keçidi</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text"  name="link" value="{{old('link')}}" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                    @endif


                                    @if(in_object('iframe', 'article-types.'.request()->get('category') . '.'  . request()->get('type')))
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label  class=" form-control-label">Youtube link</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text"  name="iframe" value="{{old('iframe')}}" placeholder="https://www.youtube.com/watch?v=UaxbCxJy96w" class="form-control">
                                            </div>
                                        </div>
                                    @endif


                                    @if(in_object('date', 'article-types.'.request()->get('category') . '.'  . request()->get('type')))
                                    <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label  class=" form-control-label">Tarix</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <div class="input-group">
                                                    <input data-toggle="datepicker" type="text" name="date" value="{{old('date')}}" class="form-control">
                                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                </div>

                                            </div>
                                        </div>
                                    @endif





                                    @if(in_object('image', 'article-types.'.request()->get('category') . '.'  . request()->get('type')))
                                    <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label  class=" form-control-label">Şəkil</label>
                                            </div>
                                            <div class="col-12 col-md-9 pb-5 pt-5">
                                                <input type="file" value="{{old('file')}}"  name="image" >
                                            </div>
                                        </div>
                                    @endif




                                    <!-- ACTIVE & DEACTIVE RADIO -->
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label  class=" form-control-label">Status</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <div class="form-check-inline form-check ">
                                                <label for="inline-radio1" class="form-check-label mr-4">
                                                    <input type="radio" name="status" value="1" checked  class="form-check-input">Aktiv
                                                </label>
                                                <label for="inline-radio2" class="form-check-label ">
                                                    <input type="radio"  name="status" value="0"  class="form-check-input">Deaktiv
                                                </label>

                                            </div>
                                        </div>
                                    </div>

                                    @if(!in_object('noValidateImage', 'article-types.'.request()->get('category') . '.'  . request()->get('type')))
                                        <input type="hidden"  name="photo-is-gallery" placeholder="" value="" class="form-control photo-is-gallery">
                                    @endif



                                    <!--END ACTIVE & DEACTIVE RADIO -->
                                    @if(in_object('gallery', 'article-types.'.request()->get('category') . '.'  . request()->get('type')))
                                        <hr/>

                                        <input type="hidden" name="checkGallery" value="{{$idForSimpleItem}}">
                                        <div class="row form-group pt-2">
                                        <div class="col-12 col-md-12">
                                            <iframe id="frameID" src="/admin/simple-item?model=Article&page_id={{$idForSimpleItem}}&type=gallery&on_iframe=1&uniq_id={{session('uniq_id')}}" width="100%" style="border: none;height: 800px" ></iframe>
                                        </div>
                                    </div>
                                @endif




                                <!-- SUBMIT BUTTONS -->
                                <div class="row form-group">
                                    <div class="col col-md-3"></div>
                                    <div class="col-12 col-md-9">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </div>
                                <!-- END SUBMIT BUTTONS -->

                            </form>
                        </div>

                    </div>

                </div>
            </div>



    </div>
@endsection

@section('js')
    <script>
        // $('[data-toggle="datepicker"]').datepicker({
        //     format: 'yyyy-mm-dd',
        //     autoPick: true,
        //     autoHide: true,
        // });
        $(function () {
            $('[data-toggle="datepicker"]').datetimepicker({
                defaultDate: new Date(),
                locale: 'az',
                icons: {
                    time: 'far fa-clock',
                    date: 'far fa-calendar',
                    up: 'fas fa-arrow-up',
                    down: 'fas fa-arrow-down',
                    previous: 'fas fa-chevron-left',
                    next: 'fas fa-chevron-right',
                    today: 'fas fa-calendar-check',
                    clear: 'far fa-trash-alt',
                    close: 'far fa-times-circle'
                }
            });
        });


        $(document).ready(function(){

            let check = false ;
            let text = null ;
            console.log($('#frameID').on('load',function (){
                $($('#frameID').contents()).on('click',function (e){
                    $(this).find('.table-image').parents('tr').removeClass('selected-image')
                    if (e.target.className === 'table-image')
                    {
                        check = e.target.src.includes(text) ;
                        if (check)
                        {
                            $(e.target).parents('tr').removeClass('selected-image');
                            text = null ;
                            $('.photo-is-gallery').val(text)

                        }
                        else
                        {
                            $(e.target).parents('tr').addClass('selected-image')
                            text = $(e.target).attr('src').match(/\/storage.*/gi) ;
                            text = text[0]
                            $('.photo-is-gallery').val(text)


                        }


                    }
                })
            }))


        });

    </script>
@endsection
