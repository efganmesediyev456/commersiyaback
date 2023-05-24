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

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Ad</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="name" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Email</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="email" id="text-input" name="email" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Parol</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="password" id="text-input" name="password" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Rol</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="role_id" id="role_id" class="form-control">
                                            <option value="">----</option>
                                            @foreach($roles as $rol)
                                                <option value="{{$rol->id}}">{{$rol->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Status</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <div class="form-check-inline form-check ">
                                            <label for="inline-radio1" class="form-check-label mr-4">
                                                <input type="radio" name="status" value="1" checked class="form-check-input">Aktiv
                                            </label>
                                            <label for="inline-radio2" class="form-check-label ">
                                                <input type="radio"  name="status" value="0" class="form-check-input">Deaktiv
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
