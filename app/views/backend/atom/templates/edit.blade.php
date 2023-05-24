@extends('backend.layouts.default')


@section('content')
    @include('backend.includes.breadcrumb')

    <div class="content">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body card-block">
                        <form action="{{route($routeName . '.update',$temp_name)}}" method="post"
                              enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            @method('PUT')

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Title</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="title" placeholder=""
                                           value="{{$template->name ?? ''}}" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">View</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="view" placeholder=""
                                           value="{{$template->view ?? ''}}" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Model</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="model" placeholder=""
                                           value="{{$template->type ?? ''}}" class="form-control">
                                </div>
                            </div>
                            @if($temp_name !== 'home')
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Pagination Limit</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="number" id="text-input" name="pagination_limit" min="0" placeholder=""
                                           value="{{$template->pagination_limit ?? ''}}" class="form-control">
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Labels</label>
                                </div>

                                <div class="col-12 col-md-9">
                                    <div class="form-check-inline form-check">
                                        <label class="form-check-label mr-2">
                                            <input type="checkbox" name="label[]" value="second_title"
                                                   @if(in_object('second_title', 'templates.'.$temp_name.'.labels')) checked
                                                   @endif  class="form-check-input ">Daxili Başlıq
                                        </label>
                                        <label class="form-check-label mr-2">
                                            <input type="checkbox" name="label[]" value="subtitle"
                                                   @if(in_object('subtitle', 'templates.'.$temp_name.'.labels')) checked
                                                   @endif  class="form-check-input ">Qısa Mətn
                                        </label>
                                        <label class="form-check-label mr-2">
                                            <input type="checkbox" name="label[]" value="description"
                                                   @if(in_object('description', 'templates.'.$temp_name.'.labels')) checked
                                                   @endif class="form-check-input ">Mətn
                                        </label>
                                        <label class="form-check-label mr-2">
                                            <input type="checkbox" name="label[]" value="image"
                                                   @if(in_object('image', 'templates.'.$temp_name.'.labels')) checked
                                                   @endif class="form-check-input ">Şəkil
                                        </label>
                                        <label class="form-check-label mr-2">
                                            <input type="checkbox" name="label[]" value="icon"
                                                   @if(in_object('icon', 'templates.'.$temp_name.'.labels')) checked
                                                   @endif class="form-check-input ">Icon
                                        </label>
                                        <label class="form-check-label mr-2">
                                            <input type="checkbox" name="label[]" value="link"
                                                   @if(in_object('link', 'templates.'.$temp_name.'.labels')) checked
                                                   @endif  class="form-check-input ">External Link
                                        </label>


                                    </div>
                                </div>
                            </div>
                            @endif


                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Simple items</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select multiple style="height: 200px" name="simple_items[]" class="form-control" id="">

                                        @foreach(config_json('simple-items') as $key => $item)
                                            <option value="{{$key}}&{{$item->name}}"   @if(in_object($key, 'templates.'.$temp_name.'.simple_items')) selected
                                                @endif>{{$item->name}}</option>
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
