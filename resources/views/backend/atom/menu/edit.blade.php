@extends('backend.layouts.default')


@section('content')
    @include('backend.includes.breadcrumb')

    <div class="content">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body card-block">
                            <form action="{{route($routeName . '.update',$menu->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('PUT')


                                <!-- TABS MULTI LANGUAGE -->
                                    <ul class="nav nav-pills mb-3 nav-sticky"  id="pills-tab" role="tablist">
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
                                                        <label for="text-input" class=" form-control-label">Başlıq</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input name="title[{{$lang}}]" placeholder="" value="{{$menu->translate($lang)->title ?? ''}}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>


                                    <!-- END TABS MULTI LANGUAGE -->

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Slug</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text"  type="text" disabled   name="slug" placeholder="" value="{{$menu->slug}}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Menu Idarəsi</label>

                                        </div>
                                        <div class="col-12 col-md-9 menu-sorting">
                                            <div class="dd">
                                                <ol class="dd-list">
                                                    @foreach($menuItems as $m1)

                                                            <li class="dd-item" data-id="{{$m1->id}}" data-ordering="{{$m1->ordering}}">
                                                                <div class="dd-row"  @if(!$m1->status) style="background: #f3c3c3" @endif>
                                                                    <div class="dd-handle" data-ordering="{{$m1->ordering}}">
                                                                        {{$m1->title}}  {{$m1->link}}
                                                                    </div>

                                                                    <div class="z-index">
                                                                        @if(\Helper::roleChecker($routeName . '.edit'))  <button type="button" class="btn btn-info mr-1 p-0 z-index  open-modal" data-toggle="modal" data-child="{{$m1->id}}" ><i class="fa fa-plus size32"></i></button>@endif
                                                                        @if(\Helper::roleChecker($routeName . '.edit')) <a href="javascript:void(0)" class="btn btn-success mr-1 p-0 edit-modal" data-id="{{$m1->id}}"> <i class="fa fa-edit size32"></i></a> @endif
                                                                        @if(\Helper::roleChecker($routeName . '.destroy')) <a href="javascript:void(0)" data-id="{{$m1->id}}" class="btn btn-danger mr-1 p-0  on-delete"> <i class="fa fa-trash size32"></i></a> @endif
                                                                    </div>
                                                                </div>
                                                                @if(count($m1->children))
                                                                <ol class="dd-list">
                                                                    @foreach($m1->children as $m2)
                                                                    <li class="dd-item" data-id="{{$m2->id}}" data-ordering="{{$m2->ordering}}">
                                                                        <div class="dd-row" @if(!$m2->status) style="background: #f3c3c3" @endif >
                                                                            <div class="dd-handle"  data-ordering="{{$m2->ordering}}">
                                                                                {{$m2->title}}
                                                                            </div>

                                                                            <div class="z-index">
                                                                                @if(\Helper::roleChecker($routeName . '.edit'))  <button type="button" class="btn btn-info mr-1 p-0 z-index  open-modal" data-toggle="modal" data-child="{{$m2->id}}" ><i class="fa fa-plus size32"></i></button>@endif
                                                                                @if(\Helper::roleChecker($routeName . '.edit')) <a href="javascript:void(0)" class="btn btn-success mr-1 p-0 edit-modal" data-id="{{$m2->id}}"> <i class="fa fa-edit size32"></i></a> @endif
                                                                                @if(\Helper::roleChecker($routeName . '.destroy')) <a href="javascript:void(0)" data-id="{{$m2->id}}" class="btn btn-danger mr-1 p-0  on-delete"> <i class="fa fa-trash size32"></i></a> @endif
                                                                            </div>
                                                                        </div>
                                                                        @if(count($m2->children))
                                                                            <ol class="dd-list">
                                                                                @foreach($m2->children as $m3)
                                                                                    <li class="dd-item" data-id="{{$m3->id}}" data-ordering="{{$m3->ordering}}">
                                                                                        <div class="dd-row" @if(!$m3->status) style="background: #f3c3c3" @endif>
                                                                                            <div class="dd-handle" data-ordering="{{$m3->ordering}}">
                                                                                                {{$m3->title}}
                                                                                            </div>

                                                                                            <div class="z-index">
                                                                                                @if(\Helper::roleChecker($routeName . '.edit'))  <button type="button" class="btn btn-info mr-1 p-0 z-index  open-modal" data-toggle="modal" data-child="{{$m3->id}}" ><i class="fa fa-plus size32"></i></button>@endif
                                                                                                @if(\Helper::roleChecker($routeName . '.edit')) <a href="javascript:void(0)" class="btn btn-success mr-1 p-0 edit-modal" data-id="{{$m3->id}}"> <i class="fa fa-edit size32"></i></a> @endif
                                                                                                @if(\Helper::roleChecker($routeName . '.destroy')) <a href="javascript:void(0)" data-id="{{$m3->id}}" class="btn btn-danger mr-1 p-0  on-delete"> <i class="fa fa-trash size32"></i></a> @endif
                                                                                            </div>
                                                                                        </div>
                                                                                        @if(count($m3->children))
                                                                                            <ol class="dd-list">
                                                                                                @foreach($m3->children as $m4)
                                                                                                    <li class="dd-item" data-id="{{$m4->id}}" data-ordering="{{$m4->ordering}}">
                                                                                                        <div class="dd-row" @if(!$m4->status) style="background: #f3c3c3" @endif>
                                                                                                            <div class="dd-handle" data-ordering="{{$m4->ordering}}">
                                                                                                                {{$m4->title}}
                                                                                                            </div>

                                                                                                            <div class="z-index">
                                                                                                                @if(\Helper::roleChecker($routeName . '.edit'))  <button type="button" class="btn btn-info mr-1 p-0 z-index  open-modal" data-toggle="modal" data-child="{{$m4->id}}" ><i class="fa fa-plus size32"></i></button>@endif
                                                                                                                @if(\Helper::roleChecker($routeName . '.edit')) <a href="javascript:void(0)" class="btn btn-success mr-1 p-0 edit-modal" data-id="{{$m4->id}}"> <i class="fa fa-edit size32"></i></a> @endif
                                                                                                                @if(\Helper::roleChecker($routeName . '.destroy')) <a href="javascript:void(0)" data-id="{{$m4->id}}" class="btn btn-danger mr-1 p-0  on-delete"> <i class="fa fa-trash size32"></i></a> @endif
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                @endforeach
                                                                                            </ol>
                                                                                        @endif
                                                                                    </li>
                                                                                @endforeach
                                                                            </ol>
                                                                        @endif
                                                                    </li>

                                                                    @endforeach
                                                                </ol>



                                                                @endif
                                                            </li>

                                                    @endforeach

                                                    <!--  FOR ADD -->



                                                    <!-- END FOR ADD -->
                                                </ol>
                                            </div>



                                            <div class="open-modal add-new-menu"> <i class="fa fa-plus size32"></i> Əlavə et</div>
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



            <form class="d-inline" action="{{ route($routeName . '.destroy','%%change%%') }}" method="POST"  id="delete-form">
                {{ method_field('DELETE')}} @csrf
            </form>


        <!-- ADD MENU -->
        <x-menu.menu-item-create  :page="$page" :menu="$menu" />
        <!-- ADD MENU -->




        <!-- EDIT MENU -->
        <x-menu.menu-item-edit :page="$page" :menu="$menu" />
        <!-- EDIT MENU -->


    </div>
@endsection



@section('js')
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js" integrity="sha512-7bS2beHr26eBtIOb/82sgllyFc1qMsDcOOkGK3NLrZ34yTbZX8uJi5sE0NNDYFNflwx1TtnDKkEq+k2DCGfb5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}

    <script>
        $('.dd').nestable({
            callback: function(){
                $.ajax({
                    url : '{{ route("menu-item.sort") }}',
                    method : 'PUT',
                    data : { sort:$('.dd').nestable('serialize') },
                    success : function(res){
                       $('.ajax-success').html(`  <div class="breadcrumbs ">
                                                    <div>
                                                        <div class="row m-0">
                                                            <div class="col-12 p-0">
                                                                <div class="alert alert-success">
                                                                    <p class="alert-success p-0 m-0">${res}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                             `).fadeIn(500)

                        setTimeout(()=>{
                            $('.ajax-success').fadeOut(500);
                        },1500)

                    },
                    error :  function(err){
                        console.log(err)    ;
                    }
                });
            }
        });


        $('.open-modal').on('click',function () {
            $('body').addClass('modal-open')
            $('.modal.new-data').addClass('show').css('display','flex')
            $('.child_field').val($(this).attr('data-child'))
        })

        $('.close-modal').on('click',function () {
            $('.modal').removeClass('show').removeAttr('style')

            $('.child_field').val('')
            // $('.modal input.to-epmt').val('');
            // $('.modal select').val('');
            // $('input[name="status"]').prop('checked', false)
            // $('input[name="on_blank"]').prop('checked', false)
        })


        $('.on-delete').on('click',function () {

            $a = confirm('Silmək istədiyinizdən əminsiniz  ?')


          let text =  $('#delete-form').attr('action') ;
            text = text.replace(/%%change%%/gi,$(this).attr('data-id')) ;
            $('#delete-form').attr('action',text);

            if($a)
            {
                $('#delete-form').submit() ;
            }

        })



        $('.edit-modal').on('click',function () {
            id = $(this).attr('data-id') ;
            $.ajax({
                url : '{{ route("menu-item.edit") }}',
                method : 'GET',
                data : { id:id },
                success : function(res){
                    $('body').addClass('modal-open')
                    $('.modal.edit').addClass('show').css('display','flex')

                    res.translations.map(function (obj){
                        $('input[name="title['+ obj.locale +']"].edit').val(obj.title) ;
                        $('input[name="link['+ obj.locale +']"].edit').val(obj.link) ;
                    })
                    $('select.edit').val(res.model_record_id).change() ;
                    $('input.edit-input').val($('.pages-for-select span[value="' + res.model_record_id + '"]').eq(0).text()).change() ;
                    $('input[name="page"].edit').val(res.model_record_id).change() ;

                    $('.pages-for-select span').removeClass('active');

                    $('.pages-for-select span[value="' + res.model_record_id + '"]').addClass('active');

                    $('input[name="status"][value="'+ res.status +'"].edit').prop('checked', true)
                    $('input[name="on_blank"][value="'+ res.on_blank +'"].edit').prop('checked', true)




                    let text =  $('.edit-menu-item').attr('action') ;
                    text = text.replace(/%%change%%/gi,id) ;
                    $('.edit-menu-item').attr('action',text);


                },
                error :  function(err){
                    console.log(err)    ;
                }
            });

        })
    </script>
@endsection



@push('scripts')

@endpush
