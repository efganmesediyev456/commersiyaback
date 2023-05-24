@extends('backend.layouts.default')


@section('content')
    @include('backend.includes.breadcrumb')


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css"  />



    <style type="text/css">
        .shares{
            display:grid;
            grid-template-rows: repeat( 4, 1fr);
            row-gap: 12px;
        }
        img {
            display: block;
            max-width: 100%;
        }
        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }


    </style>


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
                                                    @if(in_object('subtitle', 'article-types.'.request()->get('category') . '.'  . request()->get('type')))
                                                    <div class="row form-group">
                                                                <div class="col col-md-3">
                                                                    <label  class=" form-control-label">Category</label>
                                                                </div>
                                                                <div class="col-12 col-md-9">
                                                                    <input type="text"  name="category[{{$lang}}]" placeholder="" value="{{old('category.'.$lang)}}" class="form-control">
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
                                                <input class="image" type="file" value="{{old('file')}}"  name="image" >
                                            </div>
                                        </div>
                                    @endif




                                    @if(in_object('type', 'article-types.'.request()->get('category') . '.'  . request()->get('type')))


                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label  class=" form-control-label">Tipi</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <select name = "article_type[]" id = "select2" class="form-control " multiple>
                                                    @foreach(json_decode(json_encode(config_json('article-types')), true)["articles"][request()->type]["type"] as $type)
                                                        <option value = "{{$type}}">{{$type}}</option>
                                                    @endforeach
                                                </select>
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
{{--                                    <div class="row form-group">--}}
{{--                                        <div class="col col-md-3">--}}
{{--                                            <label  class=" form-control-label">Asagidaki sehifelerdede paylas</label>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-12 col-md-9 shares">--}}
{{--                                            <label for="">Paylasimlar</label>--}}
{{--                                            <select multiple class="js-example-basic-single form-control" name="articles[]">--}}
{{--                                                @foreach(config_json('article-types.articles') as $type => $template)--}}

{{--                                                    <option value="{{$type}}">{{__('backend.'.$type)}}</option>--}}

{{--                                                @endforeach--}}
{{--                                            </select>--}}

{{--                                            <label for="">SƏTƏMM</label>--}}

{{--                                            <select multiple class="js-example-basic-single form-control" name="setem[]">--}}

{{--                                                @foreach(config_json('article-types.satamm') as $type => $template)--}}
{{--                                                    <option value="{{$type}}">{{__('backend.'.$type)}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}

{{--                                            <label for="">MetroGallery</label>--}}

{{--                                            <select multiple class="js-example-basic-single form-control" name="metrogallery[]">--}}

{{--                                                @foreach(config_json('article-types.metrogallery') as $type => $template)--}}
{{--                                                    <option value="{{$type}}">{{__('backend.'.$type)}}</option>--}}

{{--                                                @endforeach--}}

{{--                                            </select>--}}

{{--                                            <label for="">Təlim-tədris</label>--}}

{{--                                            <select multiple class="js-example-basic-single form-control" name="telim_tedris[]">--}}

{{--                                                @foreach(config_json('article-types.training') as $type => $template)--}}
{{--                                                    <option value="{{$type}}">{{__('backend.'.$type)}}</option>--}}

{{--                                                @endforeach--}}

{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    @if(!in_object('noValidateImage', 'article-types.'.request()->get('category') . '.'  . request()->get('type')))
                                        <input type="hidden"  name="photo-is-gallery" placeholder="" value="" class="form-control photo-is-gallery">
                                    @endif




                                    <!--END ACTIVE & DEACTIVE RADIO -->






                                <!-- SUBMIT BUTTONS -->
                                <div class="row form-group">
                                    <div class="col col-md-3"></div>
                                    <div class="col-12 col-md-9">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="reset btn btn-danger btn-sm">
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


    <div style="z-index: 65746677777773!important;" class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Crop image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <!--  default image where we will set the src via jquery-->
                                <img id="image">
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="crop">Crop</button>
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

        $(document).ready(function() {




          $(".reset").click(function(){


            $("input[type='text']").val("")
            $("textarea").val("")
            for (a in CKEDITOR.instances){
              CKEDITOR.instances[a].setData("");
            }

            $('[data-toggle="datepicker"]').data("DateTimePicker").date(new Date());


          });



            $('#select2').select2({
                multiple:true
            });

            $('#select2').on('change', function(e) {
                $('.elave').remove()
                $('#select2').select2('data').map(function(e, deyer){


                    $("#select2").after(`

                    <div class="row form-group elave">
                                            <div class="col col-md-3">
                                                <label class=" form-control-label">Sosial Platforma keçidi(${e.text})</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="link[${e.text}]" value="" placeholder="" class="form-control">
                                            </div>
                                        </div>


                    `)
                })


            });



        });


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



    <script>

        // var bs_modal = $('#modal');
        // var image = document.getElementById('image');
        // var cropper,reader,file;
        //
        //
        // $("body").on("change", ".image", function(e) {
        //     var files = e.target.files;
        //     var done = function(url) {
        //         image.src = url;
        //         bs_modal.modal('show');
        //     };
        //
        //
        //     if (files && files.length > 0) {
        //         file = files[0];
        //
        //         if (URL) {
        //             done(URL.createObjectURL(file));
        //         } else if (FileReader) {
        //             reader = new FileReader();
        //             reader.onload = function(e) {
        //                 done(reader.result);
        //             };
        //             reader.readAsDataURL(file);
        //         }
        //     }
        // });
        //
        // bs_modal.on('shown.bs.modal', function() {
        //     cropper = new Cropper(image, {
        //         dragMode: 'move',
        //         // autoCropArea: 0.65,
        //         restore: false,
        //         guides: false,
        //         center: false,
        //         highlight: false,
        //         cropBoxMovable: false,
        //         cropBoxResizable: false,
        //         toggleDragModeOnDblclick: false,
        //
        //         // aspectRatio: 1,
        //         // viewMode: 3,
        //         preview: '.preview',
        //         data:{ //define cropbox size
        //             width: 437,
        //             height: 176,
        //         },
        //     });
        // }).on('hidden.bs.modal', function() {
        //     cropper.destroy();
        //     cropper = null;
        // });
        //
        // $("#crop").click(function() {
        //     canvas = cropper.getCroppedCanvas({
        //         width: 437,
        //         height: 176,
        //     });
        //
        //     canvas.toBlob(function(blob) {
        //         url = URL.createObjectURL(blob);
        //         var reader = new FileReader();
        //         reader.readAsDataURL(blob);
        //         reader.onloadend = function() {
        //             var base64data = reader.result;
        //
        //             $(".image_file").val(base64data)
        //             bs_modal.modal('hide');
        //             //alert(base64data);
        //             // $.ajax({
        //             //     type: "POST",
        //             //     dataType: "json",
        //             //     url: "crop_image_upload.php",
        //             //     data: {image: base64data},
        //             //     success: function(data) {
        //             //         bs_modal.modal('hide');
        //             //         alert("success upload image");
        //             //     }
        //             // });
        //         };
        //     });
        // });


        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

    </script>
@endsection
