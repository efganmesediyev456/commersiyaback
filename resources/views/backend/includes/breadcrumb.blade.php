<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        @php
                            $appends = [
                                      'model'        => request()->get('model'),
                                      'page_id'      => request()->get('page_id'),
                                      'type'         => request()->get('type'),
                                      'category'     => request()->get('category'),
                                      'on_iframe'    => request()->get('on_iframe'),
                                      'uniq_id'      =>   session('uniq_id') ?? request()->get('uniq_id'),
                                ]
                        @endphp
                        <h1>
                            @if(request()->route()->getName() == $routeName .'.create' || request()->route()->getName() == $routeName .'.edit'  )
                            <a href="{{route($routeName.'.index',$appends)}}">  <i class="fas fa-arrow-circle-left btn color-red  btn-md"></i> </a>
                            @endif

                            @if(\Route::is('simple-item*') || \Route::is('article*'))
                               {{__('backend.'.request()->get('type'))}}</h1>
                            @else
                               {{__('backend.'.$routeName)}}</h1>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">

                            @if(request()->route()->getName() !== $routeName .'.create' &&  \Helper::roleChecker($routeName . '.create'))
                                <a href="{{route($routeName .'.create',$appends)}}" class="mr-2 btn btn-success btn-sm"><i class="fa fa-plus"></i> Əlavə et</a>
                            @endif

                            <a href="{{route($routeName .'.index',$appends)}}" class="btn btn-primary btn-sm"><i class="fa fa-list"></i> Hamısı</a>

                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@if ($errors->any())
    <div class="breadcrumbs">
    <div>
        <div class="row m-0">
            <div class="col-12 p-0">
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p class="alert-danger p-0 m-0">{{$error}}</p>
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
</div>
@endif


@if (session('success'))
    <div class="breadcrumbs">
        <div>
            <div class="row m-0">
                <div class="col-12 p-0">
                    <div class="alert alert-success">
                            <p class="alert-success p-0 m-0">{{session('success')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif



<div class="ajax-success" style="display: none">

</div>
