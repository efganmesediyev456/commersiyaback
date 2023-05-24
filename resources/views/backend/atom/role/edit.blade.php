@extends('backend.layouts.default')


@section('content')
    @include('backend.includes.breadcrumb')

    <div class="content">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body card-block">
                            <form action="{{route($routeName . '.update',$item->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('PUT')

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Ad</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="title" value="{{$item->title}}" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Qısa Məlumat</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="description" placeholder="" value="{{$item->description}}" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Səlahiyyətlər</label>
                                    </div>
                                    <div class="col-12 col-md-9">

                                        <select name="permissions[]" id="multiple-select" style="min-height: 300px" multiple="" class="form-control">
                                            @foreach($permissions as $permission)

                                                <option value="{{$permission->id}}" @if(in_array($permission->id,$currentPermissions)) selected @endif >{{$permission->title}}</option>
                                            @endforeach
                                        </select>
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
