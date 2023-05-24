@extends('backend.layouts.default')


@section('content')
    @include('backend.includes.breadcrumb')

    <div class="content">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body card-block">
                        <form action="{{route($routeName . '.update',[$temp_name,$temp_category])}}" method="post"
                              enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            @method('PUT')

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">{{ __($temp_name) }}</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <div class="form-check-inline form-check">


                                        <label  class="form-check-label mr-2">
                                            <input type="checkbox" name="label[]" value="title" @if(isset($template->title)) checked @endif  class="form-check-input "> Başlıq
                                        </label>
                                        <label  class="form-check-label mr-2">
                                            <input type="checkbox" name="label[]" value="subtitle" @if(isset($template->subtitle)) checked @endif  class="form-check-input ">Qısa Mətn
                                        </label>
                                        <label  class="form-check-label mr-2">
                                            <input type="checkbox" name="label[]" value="description" @if(isset($template->description)) checked @endif  class="form-check-input ">Mətn
                                        </label>
                                        <label  class="form-check-label mr-2">
                                            <input type="checkbox" name="label[]" value="date" @if(isset($template->date)) checked @endif  class="form-check-input ">Vaxt
                                        </label>
                                        <label  class="form-check-label mr-2">
                                            <input type="checkbox" name="label[]" value="image" @if(isset($template->image)) checked @endif  class="form-check-input ">Şəkil
                                        </label>
                                        <label  class="form-check-label mr-2">
                                            <input type="checkbox" name="label[]" value="gallery" @if(isset($template->gallery)) checked @endif  class="form-check-input ">Qalereya
                                        </label>
                                        <label  class="form-check-label mr-2">
                                            <input type="checkbox" name="label[]" value="iframe"  @if(isset($template->iframe)) checked @endif class="form-check-input ">Iframe
                                        </label>
                                        <label  class="form-check-label mr-2">
                                            <input type="checkbox" name="label[]" value="link"   @if(isset($template->link)) checked @endif class="form-check-input ">Keçid (link)
                                        </label>
                                        <label  class="form-check-label mr-2">
                                            <input type="checkbox" name="label[]" value="noValidateImage"   @if(isset($template->noValidateImage)) checked @endif class="form-check-input ">Şəkil olmayada bilər
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
