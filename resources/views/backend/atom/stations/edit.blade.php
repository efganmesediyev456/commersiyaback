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


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label  class=" form-control-label">Stansiya adı</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text"  name="title[{{$lang}}]" placeholder="" value="{{$item->translate($lang)->title ?? ''}}" class="form-control">
                                                </div>
                                            </div>


                                        </div>
                                    @endforeach
                                </div>


                                <!-- END TABS MULTI LANGUAGE -->




{{--
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label  class=" form-control-label">Xətt</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="color"  class="form-control " >
                                            <option @if($item->color == "green") selected @endif  value="green">Yaşıl</option>
                                            <option @if($item->color == "red") selected @endif  value="red">Qırmızı</option>
                                            <option @if($item->color == "green red") selected @endif  value="green red">Qırmızı Yaşıl</option>
                                            <option @if($item->color == "purple") selected @endif  value="purple">Bənövşəyi</option>
                                            <option @if($item->color == "yellow") selected @endif  value="yellow">Sarı</option>
                                        </select>
                                    </div>
                                </div>
--}}


                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label  class=" form-control-label">Vaxt</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number"  name="time" value="{{ $item->time }}" placeholder="" class="form-control">
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label  class=" form-control-label">Məsafə</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number"  name="distance" value="{{ $item->distance }}" placeholder="" class="form-control">
                                    </div>
                                </div>



{{--

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label  class=" form-control-label">Formal ID</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text"  name="formal_id" value="{{old('formal_id')}}" placeholder="" class="form-control">
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label  class=" form-control-label">Əvvəlki stansiya (FORMAL ID)</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text"  name="before" value="{{old('before')}}" placeholder="" class="form-control">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label  class=" form-control-label">Sonrakı stansiya (FORMAL ID)</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text"  name="after" value="{{old('after')}}" placeholder="" class="form-control">
                                    </div>
                                </div>
--}}

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
    </script>
@endsection
