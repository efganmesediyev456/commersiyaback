@extends('backend.layouts.default')


@section('content')
    @include('backend.includes.breadcrumb')

    <div class="content">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body card-block">
                            <form action="{{route($routeName . '.store',[

                                    'model'        => request()->get('model'),
                                    'page_id'      => request()->get('page_id'),
                                    'type'         => request()->get('type'),
                                    'on_iframe'    => request()->get('on_iframe'),
                                    'uniq_id'      => session('uniq_id') ?? request()->get('uniq_id'),

                                ])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
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

                                                    @if(in_object('title', 'simple-items.'.request()->get('type').'.labels'))
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.title')}}</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text"  name="title[{{$lang}}]" placeholder="" value="{{old('title.'.$lang)}}" class="form-control">
                                                        </div>
                                                    </div>
                                                    @endif

                                                        @if(in_object('subtitle', 'simple-items.'.request()->get('type').'.labels'))
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
                                                                    <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.subtitle')}}</label>
                                                                </div>
                                                                <div class="col-12 col-md-9">
                                                                    <input type="text"  name="subtitle[{{$lang}}]" placeholder="" value="{{old('subtitle.'.$lang)}}" class="form-control">
                                                                </div>
                                                            </div>
                                                        @endif








                                                    @if(in_object('medium_text_1', 'simple-items.'.request()->get('type').'.labels'))
                                                    <div class="row form-group">
                                                         <div class="col col-md-3">
                                                                <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.medium_text_1')}}</label>
                                                         </div>
                                                         <div class="col-12 col-md-9">
                                                                <textarea name="medium_text1[{{$lang}}]" class="form-control" style="height: 80px">{{old('medium_text1.'.$lang)}}</textarea>
                                                         </div>
                                                    </div>
                                                    @endif

                                                    @if(in_object('medium_text_2', 'simple-items.'.request()->get('type').'.labels'))
                                                        <div class="row form-group">
                                                            <div class="col col-md-3">
                                                                <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.medium_text_2')}}</label>
                                                            </div>
                                                            <div class="col-12 col-md-9">
                                                                <textarea name="medium_text2[{{$lang}}]" class="form-control" style="height: 80px">{{old('medium_text2.'.$lang)}}</textarea>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    @if(in_object('text_field', 'simple-items.'.request()->get('type').'.labels'))
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
                                                                    <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.text_field')}}</label>
                                                                </div>
                                                                <div class="col-12 col-md-9">
                                                                    <textarea name="text_field[{{$lang}}]" class="editor" style="height: 80px">{!!  old('text_field.'.$lang) !!}</textarea>
                                                                </div>
                                                            </div>
                                                        @endif

                                                    @if(in_object('medium_text_3', 'simple-items.'.request()->get('type').'.labels'))
                                                        <div class="row form-group">
                                                            <div class="col col-md-3">
                                                                <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.medium_text_3')}}</label>
                                                            </div>
                                                            <div class="col-12 col-md-9">
                                                                <textarea name="medium_text3[{{$lang}}]" class="form-control" style="height: 80px">{{old('medium_text3.'.$lang)}}</textarea>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    @if(in_object('medium_text_4', 'simple-items.'.request()->get('type').'.labels'))
                                                        <div class="row form-group">
                                                            <div class="col col-md-3">
                                                                <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.medium_text_4')}}</label>
                                                            </div>
                                                            <div class="col-12 col-md-9">
                                                                <textarea name="medium_text4[{{$lang}}]" class="form-control" style="height: 80px">{{old('medium_text4.'.$lang)}}</textarea>
                                                            </div>
                                                        </div>
                                                    @endif

                                                        @if(in_object('link', 'simple-items.'.request()->get('type').'.labels'))
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
                                                                    <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.link')}}</label>
                                                                </div>
                                                                <div class="col-12 col-md-9">
                                                                    <input type="text"  name="link[{{$lang}}]" placeholder="" value="{{old('link.'.$lang)}}" class="form-control">
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
                                                <input type="text"  name="text" placeholder="" value="{{old('text')}}" class="form-control">
                                            </div>
                                        </div>
                                    @endif


                                    @if(in_object('A', 'simple-items.'.request()->get('type').'.labels'))
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.A')}}</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="number" step="any" name="A" placeholder="" value="{{old('A')}}" class="form-control">
                                            </div>
                                        </div>
                                      @endif

                                    @if(in_object('B', 'simple-items.'.request()->get('type').'.labels'))
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.B')}}</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="number" step="any"  name="B" placeholder="" value="{{old('B')}}" class="form-control">
                                            </div>
                                        </div>
                                @endif

                                    @if(in_object('C', 'simple-items.'.request()->get('type').'.labels'))
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.C')}}</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="number" step="any"  name="C" placeholder="" value="{{old('C')}}" class="form-control">
                                            </div>
                                        </div>
                                      @endif


                                    @if(in_object('date', 'simple-items.'.request()->get('type').'.labels'))
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.date')}}</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input data-toggle="datepicker" name="date" value="{{old('date')}}" class="form-control">
                                            </div>
                                        </div>
                                    @endif

                                    @if(in_object('file', 'simple-items.'.request()->get('type').'.labels'))
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.file')}}</label>
                                            </div>
                                            <div class="col-12 col-md-9 pb-5 pt-5">
                                                <input type="file"  name="file" placeholder="" >
                                            </div>
                                        </div>
                                     @endif

                                    @if(in_object('image', 'simple-items.'.request()->get('type').'.labels'))
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.image')}}</label>
                                            </div>
                                            <div class="col-12 col-md-9 pb-5 pt-5">
                                                <input type="file"  name="image" >
                                            </div>
                                        </div>
                                @endif

                                    @if(in_object('images', 'simple-items.'.request()->get('type').'.labels'))
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label  class=" form-control-label">{{config_json('simple-items.'.request()->get('type').'.labels.images')}}</label>
                                            </div>
                                            <div class="col-12 col-md-9 pb-5 pt-5">
                                                <input type="file" multiple  name="images[]" >
                                            </div>
                                        </div>
                                @endif


                                    <!--  ORDERING -->
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label  class=" form-control-label">Sıralama</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" min="0"  name="ordering" value="{{$ordering}}" class="form-control">
                                        </div>
                                    </div>
                                    <!-- END ORDERING -->

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


    </script>
@endsection
