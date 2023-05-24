@extends('backend.layouts.default')


@section('content')
@include('backend.includes.breadcrumb')

    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="table-stats order-table ov-h">

                            <form action="" method="GET" class="m-5">
                                @csrf
                                <div class="form-group">
                                    <label for = "">Axtarılacaq söz</label>
                                    <input type = "text" name="search" class="form-control" value="{{request()->search}}">
                                </div>

                                <div class="form-group">
                                    <input type = "submit" class="btn btn-success" value="axtar">
                                </div>
                            </form>

                            @if(count($sehifeler))

                            <h2 class="m-4">Səhifələr({{count($sehifeler)}})</h2>
                            <ol class="m-4" style="margin-left: 45px!important;">

                                @foreach($sehifeler as $key=>$sehife)

                                    <li class="m-2" style="display: flex">{{$key+1}}. {{$sehife->title}}

                                        <a target="_blank" href = "{{$sehife->url ? url(app()->getLocale()."/".$sehife->url) : url(app()->getLocale()."/".$sehife->slug)}}"><i class="far fa-eye size32 text-success"></i></a>
                                        <a target="_blank" href = "{{route('page.edit',['page'=>$sehife->id])}}"><i class="far fa-pencil-alt size32 text-success"></i></a>
                                    </li>

                                @endforeach
                            </ol>
                                @endif




                            @if(count($articles))

                                <h2 class="m-4">Paylaşımlar({{count($articles)}})</h2>
                                <ol class="m-4" style="margin-left: 45px!important;">

                                    @foreach($articles as $key=>$sehife)

                                        <li class="m-2" style="display: flex;">{{$key+1}}.{{$sehife->title}}

                                            <?php
                                            if($sehife->type=='children-art-gallery'){
                                            $type="metrogallery";
                                            $page=url(app()->getLocale()."/".$sehife->type."/".$sehife->id."/".$sehife->slug);

                                            }elseif(in_array($sehife->type,["t-reference","history"])){

                                                $type="training";
                                                $page=url(app()->getLocale()."/".$sehife->type."/".$sehife->id."/".$sehife->slug);


                                            } elseif(in_array($sehife->type,["plastickart","metroterminal","lettercard","bankcard","withmobile","withqrcode"])){

                                                $type="howtouse";


                                                if($sehife->type=="withqrcode"){
                                                    $page='/'.app()->getLocale()."/page/muddealar/gedis-haqqinin-odenilmesi/qr-kodla-odeme";
                                                }else if($sehife->type=="plastickart"){
                                                    $page='/'.app()->getLocale()."/page/muddealar/gedis-haqqinin-odenilmesi/bakikart-daimi-istifade-plastik-karti";
                                                }

                                            } elseif(in_array($sehife->type,["plastickart","metroterminal","lettercard","bankcard","withmobile","withqrcode"])){

                                                $type="howtouse";


                                                if($sehife->type=="withqrcode"){
                                                    $page='/'.app()->getLocale()."/page/muddealar/gedis-haqqinin-odenilmesi/qr-kodla-odeme";
                                                }else if($sehife->type=="plastickart"){
                                                    $page='/'.app()->getLocale()."/page/muddealar/gedis-haqqinin-odenilmesi/bakikart-daimi-istifade-plastik-karti";
                                                }else if($sehife->type=="metroterminal"){
                                                    $page='/'.app()->getLocale()."/page/muddealar/gedis-haqqinin-odenilmesi/metro-terminallari-vasitesile";
                                                }else if($sehife->type=="lettercard"){
                                                    $page='/'.app()->getLocale()."/page/muddealar/gedis-haqqinin-odenilmesi/metro-terminallari-vasitesile";
                                                }else if($sehife->type=="bankcard"){
                                                    $page='/'.app()->getLocale()."/page/muddealar/gedis-haqqinin-odenilmesi/bank-kartlari-ile-odeme";
                                                }else if($sehife->type=="withmobile"){
                                                    $page='/'.app()->getLocale()."/page/muddealar/gedis-haqqinin-odenilmesi/mobil-cihazla-odeme";
                                                }

                                            } else{
                                                $type='articles';
                                                $page=url(app()->getLocale()."/".$sehife->type."/".$sehife->id."/".$sehife->slug);

                                            }
                                            ?>




                                            <a target="_blank" href="{{ $page  }}" ><i class="far fa-eye size32 text-success"></i></a>

                                            <a target="_blank" href = "{{route('article.edit',['article'=>$sehife->id])."?type=".$sehife->type."&category=".$type}}"><i class="far fa-pencil-alt size32 text-success"></i></a>

                                        </li>

                                    @endforeach
                                </ol>
                            @endif




                            @if(count($vacancies))
                                <h2 class="m-4">Vakansiyalar({{count($vacancies)}})</h2>
                                <ol class="m-4" style="margin-left: 45px!important;">
                                    @foreach($vacancies as $key=>$sehife)
                                        <li class="m-2" style="display: flex;">{{$key+1}}. {{$sehife->title}}

                                            <a target="_blank" href = "{{url(app()->getLocale().'/vacancy/'.$sehife->id)}}"><i class="far fa-eye size32 text-success"></i></a>
                                            <a target="_blank" href = "{{ route('vacancy.edit',['vacancy'=>$sehife->id]) }}"><i class="far fa-pencil-alt size32 text-success"></i></a>
                                        </li>
                                    @endforeach
                                </ol>

                            @endif


                            @if(count($professions))
                                <h2 class="m-4">Vəzifələr({{count($professions)}})</h2>
                                <ol class="m-4" style="margin-left: 45px!important;">
                                    @foreach($professions as $key=>$sehife)
                                        <li class="m-2 d-flex">{{$key+1}}. {{$sehife->title}}

                                            <a target="_blank" href = "{{url(app()->getLocale().'/professions/'.$sehife->id)}}"><i class="far fa-eye size32 text-success"></i></a>
                                            <a target="_blank" href = "{{ route('profession.edit',['profession'=>$sehife->id]) }}"><i class="far fa-pencil-alt size32 text-success"></i></a>
                                        </li>
                                    @endforeach
                                </ol>

                            @endif

                            @if(count($positions))
                                <h2 class="m-4">Peşələr({{count($positions)}})</h2>
                                <ol class="m-4" style="margin-left: 45px!important;">
                                    @foreach($positions as $key=>$sehife)
                                        <li class="m-2 d-flex">{{$key+1}}. {{$sehife->title}}

                                            <a target="_blank" href = "{{url(app()->getLocale().'/professions/'.$sehife->id)}}"><i class="far fa-eye size32 text-success"></i></a>
                                            <a target="_blank" href = "{{ route('position.edit',['position'=>$sehife->id]) }}"><i class="far fa-pencil-alt size32 text-success"></i></a>
                                        </li>
                                    @endforeach
                                </ol>

                            @endif
                            @if(count($sorgular))
                                <h2 class="m-4">Sorgular({{count($sorgular)}})</h2>
                                <ol class="m-4" style="margin-left: 45px!important;">
                                    @foreach($sorgular as $key=>$sehife)
                                        <li class="m-2 d-flex">{{$key+1}}. {{$sehife->title}}

                                            <a target="_blank" href = "{{url(app()->getLocale().'/question/'.$sehife->id)}}"><i class="far fa-eye size32 text-success"></i></a>
                                            <a target="_blank" href = "{{ route('survey-subject.edit',['survey_subject'=>$sehife->id]) }}"><i class="far fa-pencil-alt size32 text-success"></i></a>
                                        </li>
                                    @endforeach
                                </ol>

                            @endif
                            @if(count($sorgular2))
                                <h2 class="m-4">Sorğu Cavabları({{count($sorgular2)}})</h2>
                                <ol class="m-4" style="margin-left: 45px!important;">
                                    @foreach($sorgular2 as $key=>$sehife)
                                        <li class="m-2 d-flex">{{$key+1}}. {{$sehife->title}}

                                            <a target="_blank" href = "{{url(app()->getLocale().'/question/'.$sehife->survey_subject_id)}}"><i class="far fa-eye size32 text-success"></i></a>
                                            <a target="_blank" href = "{{ route('survey-subject.edit',['survey_subject'=>$sehife->id]) }}"><i class="far fa-pencil-alt size32 text-success"></i></a>
                                        </li>
                                    @endforeach
                                </ol>

                            @endif

                            @if(count($baku_for_tourist))
                                <h2 class="m-4">Bakı Turistlər Üçün({{count($baku_for_tourist)}})</h2>
                                <ol class="m-4" style="margin-left: 45px!important;">
                                    @foreach($baku_for_tourist as $key=>$sehife)
                                        <li class="m-2 d-flex">{{$key+1}}. {{$sehife->title}}
                                            <a target="_blank" href = "{{url(app()->getLocale().'/page/turistler-ucun/baki')}}"><i class="far fa-eye size32 text-success"></i></a>
                                            <a target="_blank" href = "{{ route('baku-for-tourist.edit',['baku_for_tourist'=>$sehife->id]) }}"><i class="far fa-pencil-alt size32 text-success"></i></a>
                                        </li>
                                    @endforeach
                                </ol>

                            @endif
                            @if(count($baku_for_tourist_items))
                                <h2 class="m-4">Bakı Turistlər Üçün(Accordionlar)({{count($baku_for_tourist_items)}})</h2>
                                <ol class="m-4" style="margin-left: 45px!important;">
                                    @foreach($baku_for_tourist_items as $key=>$sehife)
                                        <li class="m-2 d-flex">{{$key+1}}. {{$sehife->title}}
                                            <a target="_blank" href = "{{url(app()->getLocale().'/page/turistler-ucun/baki')}}"><i class="far fa-eye size32 text-success"></i></a>
                                            <a target="_blank" href = "{{ route('baku-for-tourist-item.edit',['baku_for_tourist_item'=>$sehife->id]) }}"><i class="far fa-pencil-alt size32 text-success"></i></a>
                                        </li>
                                    @endforeach
                                </ol>

                            @endif




                        </div>

                    </div>
                </div>
            </div>


        </div>

    </div>
@endsection
