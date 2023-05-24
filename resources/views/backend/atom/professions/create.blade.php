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

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Peşələr və vəzifələr</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="parent_id"  class="form-control">
                                                <option  selected value="">----</option>
                                                @foreach($positions as $position)
                                                    <option value="{{$position->id}}"   @if(old('parent_id')  === $position->id )  selected @endif >{{$position->title}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="tab-content" id="pills-tabContent">
                                        @foreach(config('app.locales') as $lang => $locale)
                                            <div class="tab-pane fade @if($loop->iteration == 1) active show @endif" id="tab-{{$loop->iteration}}" role="tabpanel" aria-labelledby="pills-home-tab">


                                                <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label  class=" form-control-label">Başlıq</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text"  name="title[{{$lang}}]" placeholder="" value="{{old('title.'.$lang)}}" class="form-control">
                                                        </div>
                                                    </div>



                                                <div class="row form-group">
                                                                <div class="col col-md-3">
                                                                    <label  class=" form-control-label">Qısa mətn</label>
                                                                </div>
                                                                <div class="col-12 col-md-9">
                                                                    <textarea  name="subtitle[{{$lang}}]" placeholder="" class="form-control" >{{old('subtitle.'.$lang)}}</textarea>

                                                                </div>
                                                            </div>


                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label  class=" form-control-label">Mətn</label><br/>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <textarea name="description[{{$lang}}]" class="editor" style="height: 80px">{{old('description.'.$lang)}}</textarea>
                                                        </div>
                                                    </div>




                                            </div>
                                        @endforeach
                                    </div>


                                    <!-- END TABS MULTI LANGUAGE -->







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

                                <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label  class=" form-control-label">Siralama</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <div class="form-check-inline form-check ">

                                                <input type="number" name="ordering" value="1" class="form-control">

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
