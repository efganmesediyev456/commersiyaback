@extends('backend.layouts.default')


@section('content')
    @include('backend.includes.breadcrumb')

    <div class="content">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body card-block">
                        <form action="{{route($routeName . '.update',[
                                                      $item->id,
                                    'model'        => request()->get('model'),
                                    'page_id'      => request()->get('page_id'),
                                    'type'         => request()->get('type'),
                                    'on_iframe'    => request()->get('on_iframe'),
                                    'uniq_id'    =>   request()->get('uniq_id'),

                                ])}}" method="post"
                              enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            @method('PUT')

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

                                            @if(in_object('title', 'simple-items.'.request()->get('type').'.labels'))
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.title')}}</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text"  name="title[{{$lang}}]" placeholder="" value="{{$item->translate($lang)->title ?? ''}}" class="form-control">
                                                    </div>
                                                </div>
                                            @endif

                                            @if(in_object('subtitle', 'simple-items.'.request()->get('type').'.labels'))
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.subtitle')}}</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text"  name="subtitle[{{$lang}}]" placeholder="" value="{{$item->translate($lang)->subtitle ?? ''}}" class="form-control">
                                                    </div>
                                                </div>
                                            @endif




                                            @if(in_object('medium_text_1', 'simple-items.'.request()->get('type').'.labels'))
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.medium_text_1')}}</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <textarea name="medium_text1[{{$lang}}]" class="form-control" style="height: 80px">{{$item->translate($lang)->medium_text1 ?? ''}}</textarea>
                                                    </div>
                                                </div>
                                            @endif

                                            @if(in_object('medium_text_2', 'simple-items.'.request()->get('type').'.labels'))
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.medium_text_2')}}</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <textarea name="medium_text2[{{$lang}}]" class="form-control" style="height: 80px">{{$item->translate($lang)->medium_text2 ?? ''}}</textarea>
                                                    </div>
                                                </div>
                                            @endif

                                            @if(in_object('text_field', 'simple-items.'.request()->get('type').'.labels'))
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.text_field' )}}</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <textarea name="text_field[{{$lang}}]" class="editor" style="height: 80px">{{html_entity_decode($item->translate($lang)->text_field ?? '') }}</textarea>
                                                        </div>
                                                    </div>
                                                @endif

                                            @if(in_object('medium_text_3', 'simple-items.'.request()->get('type').'.labels'))
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.medium_text_3')}}</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <textarea name="medium_text3[{{$lang}}]" class="form-control" style="height: 80px">{{$item->translate($lang)->medium_text3 ?? ''}}</textarea>
                                                    </div>
                                                </div>
                                            @endif

                                            @if(in_object('medium_text_4', 'simple-items.'.request()->get('type').'.labels'))
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.medium_text_4')}}</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <textarea name="medium_text4[{{$lang}}]" class="form-control" style="height: 80px">{{$item->translate($lang)->medium_text4 ?? ''}}</textarea>
                                                    </div>
                                                </div>
                                            @endif

                                            @if(in_object('link', 'simple-items.'.request()->get('type').'.labels'))
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.link')}}</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text"  name="link[{{$lang}}]" placeholder="" value="{{$item->translate($lang)->link ?? ''}}" class="form-control">
                                                    </div>
                                                </div>
                                            @endif



                                        </div>
                                    @endforeach
                                </div>


                                <!-- END TABS MULTI LANGUAGE -->

                                @if(in_object('text', 'simple-items.'.request()->get('type').'.labels'))
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.text')}}</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text"  name="text" placeholder="" value="{{$item->text ?? ''}}" class="form-control">
                                        </div>
                                    </div>
                                @endif


                                @if(in_object('A', 'simple-items.'.request()->get('type').'.labels'))
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.A')}}</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" step="any"  name="A" placeholder="" value="{{$item->A ?? ''}}" class="form-control">
                                        </div>
                                    </div>
                                @endif

                                @if(in_object('B', 'simple-items.'.request()->get('type').'.labels'))
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.B')}}</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" step="any"  name="B" placeholder="" value="{{$item->B ?? ''}}" class="form-control">
                                        </div>
                                    </div>
                                @endif

                                @if(in_object('C', 'simple-items.'.request()->get('type').'.labels'))
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.C')}}</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" step="any"  name="C" placeholder="" value="{{$item->C ?? ''}}" class="form-control">
                                        </div>
                                    </div>
                                @endif


                                @if(in_object('date', 'simple-items.'.request()->get('type').'.labels'))
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.date')}}</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input data-toggle="datepicker" name="date" value="{{$item->original_date ?? ''}}" class="form-control">
                                        </div>
                                    </div>
                                @endif

                                @if(in_object('file', 'simple-items.'.request()->get('type').'.labels'))
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.file')}}</label>
                                        </div>
                                        <div class="col-12 col-md-9 pb-5 pt-5" style="display: flex; align-items: center">
                                            <input type="file"  name="file" placeholder="" >
                                            @foreach($item->getMedia($item->type) as $media)
                                                @if(!is_null($media) && !str_contains($media->mime_type , 'image'))
                                                    <a href="{{$media->getFullUrl() ?? ''}}" class="btn btm-sm eye btn-success mr-2" target="_blank"><i class="fa fa-eye size32"></i></a>
                                                    <a href="{{route('remove-photo',['SpatieMedia',$media->id ?? ''])}}" class="remove-photo btn-danger mr-2" ><i class="fa fa-trash size32"></i></a>
                                                    <div class="image-input">
{{--                                                        <a class="open" target="_blank" href="{{$media->getFullUrl() ?? ''}}"> <img  src="{{$media->getFullUrl() ?? ''}}" alt=""></a>--}}
{{--                                                        <a href="{{route('remove-photo',['SpatieMedia',$media->id ?? ''])}}" class="remove-photo" onclick="if (!confirm('Silmək istədiyinizdən əminsiniz?')) { return false }"><i class="fa fa-trash size32"></i></a>--}}

                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if(in_object('image', 'simple-items.'.request()->get('type').'.labels') || in_object('images', 'simple-items.'.request()->get('type').'.labels'))
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.image')}}</label>
                                        </div>
                                        <div class="col-12 col-md-9 pb-5 pt-5" style="display: flex; align-items: center">
                                            <input type="file"  name="image" >
                                            @foreach($item->getMedia($item->type) as $media)
                                                @if(!is_null($media) && str_contains($media->mime_type , 'image'))
                                                    <div class="image-input">
                                                        <a class="open" target="_blank" href="{{$media->getFullUrl() ?? ''}}"> <img  src="{{$media->getFullUrl() ?? ''}}" alt=""></a>
                                                        <a href="{{route('remove-photo',['SpatieMedia',$media->id ?? ''])}}" class="remove-photo" ><i class="fa fa-trash size32"></i></a>

                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>
                                @endif








                            <!--  ORDERING -->
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label  class=" form-control-label">Sıralama</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" min="0"  name="ordering" value="{{$item->ordering}}" class="form-control">
                                    </div>
                                </div>
                                <!-- END ORDERING -->

                                <!-- ACTIVE & DEACTIVE RADIO -->
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Status</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <div class="form-check-inline form-check ">
                                            <label for="inline-radio1" class="form-check-label mr-4">
                                                <input type="radio" name="status" value="1" @if($item->status === 1 ) checked @endif class="form-check-input">Aktiv
                                            </label>
                                            <label for="inline-radio2" class="form-check-label ">
                                                <input type="radio"  name="status" value="0" @if($item->status === 0 ) checked @endif class="form-check-input">Deaktiv
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <!--END ACTIVE & DEACTIVE RADIO -->

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
    </script>
    <script>
        $('.remove-photo').on('click',function (event) {
            event.preventDefault();
            let check = confirm('Silmək istədiyinizdən əminsiniz?')
            console.log(check)
            if(check)
            {
                const newForm = $('<form>', {
                    'action': $(this).attr('href'),
                    'method': 'POST',
                }).append($('<input>', {
                    'name': '_token',
                    'value': '{{csrf_token()}}',
                    'type': 'hidden'
                })).append($('<input>', {
                    'name': '_method',
                    'value': 'DELETE',
                    'type': 'hidden'
                }));
                console.log(newForm[0])
                newForm.hide().appendTo("body").submit();
            }

        })
    </script>
@endsection
