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
                                        <label for="text-input" class=" form-control-label">Group</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="category" class="form-control">
                                            <option value="articles">Paylaşımlar</option>
                                            <option value="video">Video</option>
                                            <option value="brifing"> Brifinqlər </option>
                                            <option value="howtouse">Howtouse </option>
                                            <option value="satamm">SƏTƏMM </option>

                                        </select>

                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Article type</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text"  name="name" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Fields</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <div class="form-check-inline form-check">

                                            <label  class="form-check-label mr-2">
                                                <input type="checkbox" name="label[]" value="title"  class="form-check-input "> Başlıq
                                            </label>
                                            <label  class="form-check-label mr-2">
                                                <input type="checkbox" name="label[]" value="subtitle"  class="form-check-input ">Qısa Mətn
                                            </label>
                                            <label  class="form-check-label mr-2">
                                                <input type="checkbox" name="label[]" value="description"  class="form-check-input ">Mətn
                                            </label>
                                            <label  class="form-check-label mr-2">
                                                <input type="checkbox" name="label[]" value="date"  class="form-check-input ">Vaxt
                                            </label>
                                            <label  class="form-check-label mr-2">
                                                <input type="checkbox" name="label[]" value="image"  class="form-check-input ">Şəkil
                                            </label>
                                            <label  class="form-check-label mr-2">
                                                <input type="checkbox" name="label[]" value="gallery"  class="form-check-input ">Qalereya
                                            </label>
                                            <label  class="form-check-label mr-2">
                                                <input type="checkbox" name="label[]" value="iframe"  class="form-check-input ">Iframe
                                            </label>
                                            <label  class="form-check-label mr-2">
                                                <input type="checkbox" name="label[]" value="link"  class="form-check-input ">Keçid (link)
                                            </label>
                                            <label  class="form-check-label mr-2">
                                                <input type="checkbox" name="label[]" value="noValidateImage"  class="form-check-input ">Şəkil olmayada bilər
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
