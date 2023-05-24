@extends('backend.layouts.default')


@section('content')
@include('backend.includes.breadcrumb')

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
                                    <th class="serial">#</th>
                                    <th>Siralama</th>
                                    <th>Başlıq</th>
                                    <th>İdarə</th>

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as  $item)
                                        <tr>
                                             <td>
                                                 {{$item->id}}
                                             </td>
                                            <td>{{$item->ordering}}</td>
                                            <td>
                                                {{$item->title}}
                                            </td>


                                            <td>

                                                @php
                                                    $appends = [
                                                                           $item->id,

                                                    ];


                                                @endphp

                                                @if(\Helper::roleChecker($routeName . '.edit'))
                                                    <a class="badge btn mr-2 badge-complete p-0" href="{{ route($routeName . '.edit',$appends) }}"><i class="far fa-pencil-alt size32"></i></a>
                                                @endif

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
                    {{ $items->links() }}
                </div>
            </div>


        </div>
        <!-- .animated -->
    </div>
@endsection
