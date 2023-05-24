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
                                        <label for="text-input" class=" form-control-label">Background Title (JSON name)</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="json_name" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Title</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="title" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">View</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="view" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Model</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="model" placeholder="" value="Page" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Pagination Limit</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" id="text-input" name="pagination_limit" min="0" placeholder="" class="form-control">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Labels</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <div class="form-check-inline form-check">

                                            <label  class="form-check-label mr-2">
                                                <input type="checkbox" name="label[]" value="second_title"  class="form-check-input ">Daxili Başlıq
                                            </label>
                                            <label  class="form-check-label mr-2">
                                                <input type="checkbox" name="label[]" value="subtitle"  class="form-check-input ">Qısa Mətn
                                            </label>
                                            <label  class="form-check-label mr-2">
                                                <input type="checkbox" name="label[]" value="description"  class="form-check-input ">Mətn
                                            </label>
                                            <label  class="form-check-label mr-2">
                                                <input type="checkbox" name="label[]" value="image"  class="form-check-input ">Şəkil
                                            </label>
                                            <label  class="form-check-label mr-2">
                                                <input type="checkbox" name="label[]" value="icon"  class="form-check-input ">Icon
                                            </label>
                                            <label  class="form-check-label mr-2">
                                                <input type="checkbox" name="label[]" value="link"  class="form-check-input ">External Link
                                            </label>



                                        </div>
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Simple items</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select multiple style="height: 200px" name="simple_items[]" class="form-control" id="">

                                        @foreach(config_json('simple-items') as $key => $item)
                                                <option value="{{$key}}&{{$item->name}}">{{$item->name}}</option>
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
