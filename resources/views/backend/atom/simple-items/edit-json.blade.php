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
                                    <input type="text"  name="title" placeholder=""
                                           value="{{$template->name}}" class="form-control">
                                </div>
                            </div>
                            <hr/>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"> Sahələr</label>
                                    <p><small class="color-red">Qeyd inputun içində labelin adını qeyd edirsiz</small></p>
                                </div>
                                <div class="col-12 col-md-9">
                                    <div class="mb-3 ">
                                        <label for="">Title</label>
                                        <input type="text"  name="label[title]" value="{{config_json('simple-items.'.$temp_name.'.labels.title')}}" placeholder="" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Subtitle</label>
                                        <input type="text"  name="label[subtitle]" value="{{config_json('simple-items.'.$temp_name.'.labels.subtitle')}}" placeholder="" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Non Translate Text</label>
                                        <input type="text"  name="label[text]" value="{{config_json('simple-items.'.$temp_name.'.labels.text')}}" placeholder="" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Long Text</label>
                                        <input type="text"  name="label[text_field]" value="{{config_json('simple-items.'.$temp_name.'.labels.text_field')}}" placeholder="" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Medium text 1</label>
                                        <input type="text"  name="label[medium_text_1]" value="{{config_json('simple-items.'.$temp_name.'.labels.medium_text_1')}}" placeholder="" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Medium text 2</label>
                                        <input type="text"  name="label[medium_text_2]" value="{{config_json('simple-items.'.$temp_name.'.labels.medium_text_2')}}" placeholder="" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Medium text 3</label>
                                        <input type="text"  name="label[medium_text_3]" value="{{config_json('simple-items.'.$temp_name.'.labels.medium_text_3')}}" placeholder="" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Medium text 4</label>
                                        <input type="text"  name="label[medium_text_4]" value="{{config_json('simple-items.'.$temp_name.'.labels.medium_text_4')}}" placeholder="" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Link</label>
                                        <input type="text"  name="label[link]" value="{{config_json('simple-items.'.$temp_name.'.labels.link')}}" placeholder="" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Date</label>
                                        <input type="text"  name="label[date]" value="{{config_json('simple-items.'.$temp_name.'.labels.date')}}" placeholder="" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Number 1</label>
                                        <input type="text"  name="label[A]" value="{{config_json('simple-items.'.$temp_name.'.labels.A')}}" placeholder="" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Number 2</label>
                                        <input type="text"  name="label[B]" value="{{config_json('simple-items.'.$temp_name.'.labels.B')}}" placeholder="" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Number 3</label>
                                        <input type="text"  name="label[C]" value="{{config_json('simple-items.'.$temp_name.'.labels.C')}}" placeholder="" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">File</label>
                                        <input type="text"  name="label[file]" value="{{config_json('simple-items.'.$temp_name.'.labels.file')}}" placeholder="" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Image</label>
                                        <input type="text"  name="label[image]"  value="{{config_json('simple-items.'.$temp_name.'.labels.image')}}" placeholder="" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Images</label>
                                        <input type="text"  name="label[images]" value="{{config_json('simple-items.'.$temp_name.'.labels.images')}}" placeholder="" class="form-control">
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
