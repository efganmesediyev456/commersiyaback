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



                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label  class=" form-control-label">Image</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <img src = "{{$item->image}}" alt = "">
                                            <input type="file"  name="image" placeholder=""  class="form-control">
                                        </div>
                                    </div>



                                @foreach(config('app.locales') as $lang => $locale)
                                        <div class="tab-pane fade @if($loop->iteration == 1) active show @endif" id="tab-{{$loop->iteration}}" role="tabpanel" aria-labelledby="pills-home-tab">


                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label  class=" form-control-label">Title</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text"  name="title[{{$lang}}]" placeholder="" value="{{$item->translate($lang)->title ?? ''}}" class="form-control">
                                                    </div>
                                                </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label  class=" form-control-label">About</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea style="height:300px;"   name="about[{{$lang}}]" placeholder=""  class="form-control">{{$item->translate($lang)->about ?? ''}}</textarea>
                                                </div>
                                            </div>





                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label  class=" form-control-label">Content</label>
                                                </div>
                                                <div class="col-12 col-md-9">

                                                    @foreach(json_decode(json_encode($item->translate($lang)->content_key),true) as $key=> $cont)
                                                        <div class="row">
                                                            <div class="col-md-6 my-2">
                                                                <input type="text"  name="content_key[{{$lang}}][]" placeholder="Key*"  class="form-control" value="{{$cont}}">
                                                            </div>
                                                            <div class="col-md-6 my-2">
                                                                <input type="text"  name="content_value[{{$lang}}][]" placeholder="Value*"  class="form-control" value="{{json_decode(json_encode($item->translate($lang)->content_value),true)[$key]}}">
                                                            </div>
                                                        </div>
                                                    @endforeach





                                                        <button class="btn btn-success adding my-2">Add(key-value)</button>
                                                </div>


                                            </div>





                                        </div>
                                    @endforeach
                                </div>


                                <!-- END TABS MULTI LANGUAGE -->

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label  class=" form-control-label">Sira Nömrəsi</label>
                                </div>
                                <div class="col-12 col-md-9">

                                    <input type="number" value="{{$item->ordering}}" name="order" class="form-control" required>

                                </div>
                            </div>


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


            $(".adding").click(function(e){

                href=$(".active.show").attr("href");

                if(href=="#tab-1"){
                    lang='az';
                }else if(href=="#tab-2"){
                    lang='en';
                }else if(href=="#tab-3"){
                    lang='ru';
                }


                e.preventDefault();
                $(this).before( `  <div class="row">
                                                  <div class="col-md-6 my-2">
                                                              <input type="text"  name="content_key[${lang}][]" placeholder="Key*"  class="form-control">
                                                          </div>
                                                          <div class="col-md-6 my-2">
                                                              <input type="text"  name="content_value[${lang}][]" placeholder="Value*"  class="form-control">
                                                          </div>
                                    </div>

                `);
            })

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
    </script>
@endsection
