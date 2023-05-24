@extends('backend.layouts.default')


@section('content')
    @include('backend.includes.breadcrumb')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css"  />

    <style type="text/css">

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
                        <form action="{{route($routeName . '.update',[
                                                      $item->id,
                                    'model'        => request()->get('model'),
                                    'page_id'      => request()->get('page_id'),
                                    'type'         => request()->get('type'),
                                    'category'     => request()->get('category'),
                                    'on_iframe'    => request()->get('on_iframe'),

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

                                            @if(in_object('title', 'article-types.'.request()->get('category') . '.'  . request()->get('type') ))
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label  class=" form-control-label">Başlıq</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text"  name="title[{{$lang}}]" placeholder="" value="{{$item->translate($lang)->title ?? ''}}" class="form-control">
                                                    </div>
                                                </div>
                                            @endif

                                            @if(in_object('subtitle', 'article-types.'.request()->get('category') . '.'  . request()->get('type') ))
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label  class=" form-control-label">Qısa mətn</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text"  name="subtitle[{{$lang}}]" placeholder="" value="{{$item->translate($lang)->subtitle ?? ''}}" class="form-control">
                                                    </div>
                                                </div>
                                            @endif
                                                @if(in_object('subtitle', 'article-types.'.request()->get('category') . '.'  . request()->get('type') ))
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label  class=" form-control-label">Category</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text"  name="category[{{$lang}}]" placeholder="" value="{{$item->translate($lang)->category ?? ''}}" class="form-control">
                                                    </div>
                                                </div>
                                            @endif

                                            @if(in_object('description', 'article-types.'.request()->get('category') . '.'  . request()->get('type')))
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label  class=" form-control-label">Mətn</label>
                                                        <br/>
                                                        <a href="javascript:void(0)" class="preview-button btn btn-secondary btn-sm mb-2" >
                                                            Ön baxış</a><br/>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <textarea name="description[{{$lang}}]" class="editor" style="height: 80px">{{$item->translate($lang)->description ?? ''}}</textarea>
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
                                            <input type="text"  name="link" value="{{$item->link}}" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                @endif



                                @if(in_object('iframe', 'article-types.'.request()->get('category') . '.'  . request()->get('type')))
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label  class=" form-control-label">Youtube link</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text"  name="iframe" placeholder="https://www.youtube.com/watch?v=UaxbCxJy96w" value="{{$item->iframe}}" class="form-control">
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
                                                <input data-toggle="datepicker" name="date" class="form-control" value="">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            </div>

                                        </div>
                                    </div>
                                @endif



                                @if(in_object('type', 'article-types.'.request()->get('category') . '.'  . request()->get('type')))


                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label  class=" form-control-label">Link</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text"  name="link" placeholder="" value="{{$item->link ?? ''}}" class="form-control">

                                        </div>
                                    </div>

                                @endif



{{--                            @if(in_object('image', 'article-types.'.request()->get('category') . '.'  . request()->get('type')))--}}
{{--                                <div class="row form-group">--}}
{{--                                    <div class="col col-md-3">--}}
{{--                                        <label  class=" form-control-label">Şəkil</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12 col-md-9 pb-5 pt-5">--}}
{{--                                        <input class="image" type="file" value="{{old('file')}}"  name="image" >--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}




                            @if(in_object('image', 'article-types.'.request()->get('category') . '.'  . request()->get('type')))
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label  class=" form-control-label">Şəkil</label>
                                        </div>
                                        <div class="col-12 col-md-9 pb-5 pt-5" style="display: flex; align-items: center">
                                            <input type="file"  name="image" class="image">
{{--                                            <input type="hidden" name="image_file" class="image_file">--}}

                                        @if($item->image && !strstr($item->image,'/storage/media/'))
                                                <div class="image-input">
                                                    <a class="open" target="_blank" href="{{ $item->image }}"> <img  src="{{ $item->image }}" alt=""></a>
                                                    @if(!str_contains($item->image,'default.png'))
                                                        <a href="{{route('remove-photo',['Article',$item->id,'image',$item->type])}}" class="remove-photo" ><i class="fa fa-trash size32"></i></a>

                                                    @endif
{{--                                                    <a href="{{route('remove-photo',['Article',$item->id,'image',$item->type])}}" class="remove-photo" onclick="if (!confirm('Silmək istədiyinizdən əminsiniz?')) { return false }"><i class="fa fa-trash size32"></i></a>--}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif




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


                                @if(!in_object('noValidateImage', 'article-types.'.request()->get('category') . '.'  . request()->get('type')))
                                    <input type="hidden"  name="photo-is-gallery" placeholder="" value="{{$item->image ?? ''}}" class="form-control photo-is-gallery">
                                @endif

                                <!--END ACTIVE & DEACTIVE RADIO -->
                                @if(in_object('gallery', 'article-types.'.request()->get('category') . '.'  . request()->get('type')))
                                    <hr/>
                                    <input type="hidden" name="checkGallery" value="{{$item->id}}">
                                    <div class="row form-group pt-2">
                                        <div class="col-12 col-md-12">
                                            <iframe id="frameID" src="/admin/simple-item?model=Article&page_id={{$item->id}}&type=gallery&on_iframe=1&uniq_id={{$item->uniq_id ?? ''}}" width="100%" style="border: none;height: 800px" ></iframe>
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
                                    <button type="button" class="reset btn btn-danger btn-sm">
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
        $(function () {
            $('[data-toggle="datepicker"]').datetimepicker({
                defaultDate: new Date(     {{strtotime($item->originalDate)}} * 1000),
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
            $('#frameID').on('load',function (){
                src =  $('.photo-is-gallery').val();

                $(this).contents().find('.table-image').each(function (key,index) {
                  search = $(index).attr('src')
                  if (search.includes(src))  {
                      $(index).parents('tr').addClass('selected-image')
                      text = src ;
                  }
                })






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
            })


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


        $(".reset").click(function(){

               $("input[type='text']").val("")
               $("textarea").val("")
          for (a in CKEDITOR.instances){
            CKEDITOR.instances[a].setData("");
          }

          $('[data-toggle="datepicker"]').data("DateTimePicker").date(new Date());


        });
    </script>




    <script>

        var bs_modal = $('#modal');
        var image = document.getElementById('image');
        var cropper,reader,file;


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
        //         cropBoxMovable: true,
        //         cropBoxResizable: true,
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

    </script>
@endsection
