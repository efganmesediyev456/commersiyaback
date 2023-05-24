@extends('backend.layouts.default')


@section('content')
    @include('backend.includes.breadcrumb')

    <div class="content">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body card-block">
                            <form action="{{route($routeName . '.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf

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
                                                        <input type="text"  name="title[{{$lang}}]" placeholder="" value="{{old('title['.$lang.']')}}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>


                                 <!-- END TABS MULTI LANGUAGE -->




                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Şablon</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="template"  class="form-control template">
                                            <option disabled selected value="">----</option>
                                            @foreach(config_json('templates') as $type => $template)
                                                @if($type !== 'home')   <option value="{{$type}}"  @if(old('template')  === $type) selected @endif >{{$template->name}}</option> @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group category d-none">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Kateqoriya</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="article_type" class="form-control">
                                                <option   value="">----</option>
                                                @foreach(config_json('article-types') as $type => $template)
                                                    <optgroup label="{{__($type)}}">
                                                        @foreach(config_json('article-types.' . $type ) as $k => $v)
                                                            <option value="{{$k}}"   >{{__($k)}}</option>
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
                                        <select name="parent_id"  class="form-control">
                                            <option  selected value="">----</option>
                                            @foreach($pages as $page)
                                                <option value="{{$page->id}}"   @if(old('parent_id')  === $page->id || request()->get('parent_id') == $page->id )  selected @endif >{{$page->title}} </option>
                                            @endforeach
                                        </select>
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
                                                <input type="radio" name="status" value="1"  checked class="form-check-input">Aktiv
                                            </label>
                                            <label for="inline-radio2" class="form-check-label ">
                                                <input type="radio"  name="status" value="0" class="form-check-input">Deaktiv
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


        $('.template').on('change',function () {
            if($(this).val() === 'article' || $(this).val() === 'article-list' )
            {
                $('.category').removeClass('d-none');
            }
            else{
                $('.category').addClass('d-none');
            }
        })

    </script>
@endsection
