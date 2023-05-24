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
                                        <label for="text-input" class=" form-control-label">Başlıq</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="title" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Route</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="model" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Qısa Məlumat</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="description" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Səlahiyyətlər</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <div class="form-check-inline form-check">
                                            <label  class="form-check-label mr-2">
                                                <input type="checkbox"  name="R" value="1"  class="form-check-input ">Baxmaq
                                            </label>

                                            <label  class="form-check-label mr-2">
                                                <input type="checkbox"  name="C" value="1"  class="form-check-input ">Əlavə etmək
                                            </label>
                                            <label  class="form-check-label mr-2">
                                                <input type="checkbox"  name="U" value="1"  class="form-check-input " >Redaktə etmək
                                            </label>
                                            <label  class="form-check-label mr-4">
                                                <input type="checkbox"  name="D" value="1"  class="form-check-input " >Silmək
                                            </label>
                                            <label  class="form-check-label mr-2">
                                                <input type="checkbox"  name="full" value="1"  class="form-check-input " >Full
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
