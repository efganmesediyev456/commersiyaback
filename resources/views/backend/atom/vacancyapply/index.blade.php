@extends('backend.layouts.default')


@section('content')
@include('backend.includes.breadcrumb')

    <style>
        .form-control{
            width: 210px;
        }
        .paginations a{
            width: 40px;
            height: 40px;
            display: inline-block;
            border:1px solid #ccc;
            display: inline-flex;
            justify-content: center;
            align-items: center;
        }
        .paginations a:empty{
            display: none;
        }

        .paginations a.active{
            color:white;
            background: orange;
        }
    </style>
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>Ad, soyad</th>
                                        <th>Mobil nömrə</th>
                                        <th>E–poçt</th>
                                        <th>Mesaj</th>
                                        <th>File</th>
                                        <th>Vakansiya</th>
                                        <th>Sil</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as  $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->message}}</td>
                                            <td><a href="{{$item->getFirstMediaUrl('vacany-apply-file')}}">CV yə baxın</a></td>

                                            <td><a href="{{env('APP_URL')}}/{{app()->getLocale()}}/vacancy/{{$item->vacancy_id}}">Vakansiyaya Bax</a></td>
                                            <td>

                                                @php
                                                    $appends = [
                                                                           $item->id,

                                                    ];


                                                @endphp


                                                @if(\Helper::roleChecker($routeName . '.destroy'))
                                                    <form class="d-inline" action="{{ route($routeName . '.destroy',$appends) }}" method="POST">
                                                        {{ method_field('DELETE')}} @csrf
                                                        <button class="badge btn badge-danger p-0" onclick="if (!confirm('Silmək istədiyinizdən əminsiniz?')) { return false }"><i class="far fa-trash-alt size32"></i> </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                    {{ $items->links('vendor.pagination.frontend') }}
                </div>
            </div>


        </div>
        <!-- .animated -->
    </div>
@endsection


@push("scripts")

    <script>
       $(function () {
           $(".breadcrumb").remove()
       })
    </script>

    @endpush
