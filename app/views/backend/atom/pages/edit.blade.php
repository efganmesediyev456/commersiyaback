@extends('backend.layouts.default')


@section('content')
    @include('backend.includes.breadcrumb')

    <div class="content">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body card-block">
                        <form action="{{route($routeName . '.update',$page->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            @method('PUT')


                            <!-- TABS MULTI LANGUAGE -->
                                <ul class="nav nav-pills mb-3 nav-sticky" id="pills-tab" role="tablist">
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
                                                    <input type="text" id="text-input" name="title[{{$lang}}]" placeholder="" value="{{$page->translate($lang)->title ?? ''}}" class="form-control">
                                                </div>
                                            </div>

                                            @if(in_object('second_title', 'templates.'.$page->template.'.labels'))
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Daxili Başlıq</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="text-input" name="second_title[{{$lang}}]" placeholder="" value="{{$page->translate($lang)->second_title ?? ''}}" class="form-control">
                                                    </div>
                                                </div>
                                            @endif

                                            @if(in_object('subtitle', 'templates.'.$page->template.'.labels'))
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Qısa Mətn</label>

                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <textarea name="subtitle[{{$lang}}]" class="form-control" style="height: 80px">{{$page->translate($lang)->subtitle ?? ''}}</textarea>

                                                    </div>
                                                </div>
                                            @endif

                                            @if(in_object('description', 'templates.'.$page->template.'.labels'))
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Mətn</label><br/>
                                                        <a href="javascript:void(0)" class="preview-button btn btn-secondary btn-sm mb-2" >
                                                            Ön baxış</a><br/>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <textarea name="description[{{$lang}}]" class="form-control editor">{!! html_entity_decode($page->translate($lang)->description ?? '')  !!}</textarea>

                                                    </div>
                                                </div>
                                            @endif
                                            @if(in_object('link', 'templates.'.$page->template.'.labels'))
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">External Link</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="text-input" name="link[{{$lang}}]" value="{{$page->translate($lang)->link ?? ''}}" placeholder="" class="form-control">
                                                    </div>
                                                </div>
                                            @endif


                                        </div>
                                    @endforeach
                                </div>


                                <!-- END TABS MULTI LANGUAGE -->





                            @if(in_object('image', 'templates.'.$page->template.'.labels'))
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Şəkil</label>
                                </div>
                                <div class="col-12 col-md-9 pb-5 pt-5" style="display: flex; align-items: center">
                                    <input type="file"  name="image">
                                    @if($page->image)
                                    <div class="image-input">
                                        <a class="open" target="_blank" href="{{ (asset('storage/pages/'.$page->image)) }}"> <img  src="{{ (asset('storage/pages/'.$page->image)) }}" alt=""></a>
                                        <a href="{{route('remove-photo',['Page',$page->id,'image','pages'])}}" class="remove-photo" ><i class="fa fa-trash size32"></i></a>


                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endif

                                @if(in_object('icon', 'templates.'.$page->template.'.labels'))
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Icon</label>
                                        </div>
                                        <div class="col-12 col-md-9 pb-5 pt-5" style="display: flex; align-items: center">
                                            <input type="file"  name="icon">
                                            @if($page->icon)
                                                <div class="image-input">
                                                    <a class="open" target="_blank" href="{{ (asset('storage/pages/'.$page->icon)) }}"> <img  src="{{ (asset('storage/pages/'.$page->icon)) }}" alt=""></a>
                                                    <a href="{{route('remove-photo',['Page',$page->id,'icon','pages'])}}" class="remove-photo"><i class="fa fa-trash size32"></i></a>

                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif



                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Slug</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="slug" value="{{$page->slug}}" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Şablon</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="template" class="form-control template">
                                      @if($page->template !== 'home')  <option   value="">----</option> @endif
                                        @foreach(config_json('templates') as $type => $template)

                                            @if($type !== 'home' && $page->template !== 'home')    <option value="{{$type}}" @if($type === $page->template) selected @endif  >{{$template->name}}</option> @endif
                                            @if($type === 'home' && $page->template === 'home')    <option value="{{$type}}" @if($type === $page->template) selected @endif  >{{$template->name}}</option> @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                                <div class="row form-group category  @if($page->template !== 'article') d-none @endif ">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Kateqoriya</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="article_type" class="form-control">
                                         <option   value="">----</option>
                                                @foreach(config_json('article-types') as $type => $template)
                                                    <optgroup label="{{__($type)}}">
                                                        @foreach(config_json('article-types.' . $type ) as $k => $v)
                                                            <option value="{{$k}}" @if($k === $page->article_type) selected @endif   >{{__($k)}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>


                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Valideyn səhifə</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="parent_id" id="template" class="form-control">
                                        <option  value="">----</option>
                                        @foreach($pages as $p)
                                            <option value="{{$p->id}}"  @if($page->parent_id === $p->id) selected @endif >{{$p->title}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>






                            <!--  ORDERING -->
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Sıralama</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="number" min="0" id="text-input" name="ordering" value="{{$page->ordering}}" class="form-control">
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
                                            <input type="radio" name="status" value="1" @if($page->status === 1 ) checked @endif class="form-check-input">Aktiv
                                        </label>
                                        <label for="inline-radio2" class="form-check-label ">
                                            <input type="radio"  name="status" value="0" @if($page->status === 0 ) checked @endif class="form-check-input">Deaktiv
                                        </label>

                                    </div>
                                </div>
                            </div>
                            <!--END ACTIVE & DEACTIVE RADIO -->


                            <!-- ACTIVE & in sidebar -->
                                @if(is_null($page->parent_id) || $page->template == 'multimedia' )
                            <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Sidebar</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <div class="form-check-inline form-check ">
                                            <label for="inline-radio1" class="form-check-label mr-4">
                                                <input type="radio" name="visible_in_sidebar" value="1" @if($page->visible_in_sidebar === 1 ) checked @endif class="form-check-input">Aktiv
                                            </label>
                                            <label for="inline-radio2" class="form-check-label ">
                                                <input type="radio"  name="visible_in_sidebar" value="0" @if( is_null($page->visible_in_sidebar) ) checked @endif class="form-check-input">Deaktiv
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                @endif
                            <!--END ACTIVE & in sidebar -->

                            <!-- ACTIVE & in sidebar -->
                            @if(is_null($page->parent_id) || $page->template == 'multimedia' )
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Children in sidebar</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <div class="form-check-inline form-check ">
                                                <label for="inline-radio1" class="form-check-label mr-4">
                                                    <input type="radio" name="child_visible_in_sidebar" value="1" @if($page->child_visible_in_sidebar === 1 ) checked @endif class="form-check-input">Aktiv
                                                </label>
                                                <label for="inline-radio2" class="form-check-label ">
                                                    <input type="radio"  name="child_visible_in_sidebar" value="0" @if( $page->child_visible_in_sidebar === 0  ) checked @endif class="form-check-input">Deaktiv
                                                </label>

                                            </div>
                                        </div>
                                    </div>
                            @endif
                            <!--END ACTIVE & in sidebar -->

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

        $('.template').on('change load',function () {
            if($(this).val() === 'article' || $(this).val() === 'article-list')
            {
                $('.category').removeClass('d-none');
            }
            else{
                $('.category').addClass('d-none');
            }
        })

    </script>
@endsection
