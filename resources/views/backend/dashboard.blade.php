@extends('backend.layouts.default')


@section('content')
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
    <div class="content">


    </div>
@endsection
