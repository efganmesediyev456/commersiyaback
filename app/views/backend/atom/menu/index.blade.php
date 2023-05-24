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

                                    <th>Title</th>
                                    <th>Sıralama</th>
                                    <th>Idarə</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td class="serial">{{$item->id}}</td>
                                        <td>  <span class="name">{{$item->title}}</span> </td>
                                        <td>  <span class="name">{{$item->ordering}}</span> </td>
                                        <td>
                                            @if(\Helper::roleChecker($routeName . '.edit'))
                                            <a class="badge btn mr-2 badge-complete p-0" href="{{ route($routeName . '.edit',$item->id) }}"><i class="far fa-pencil-alt size32"></i></a>
                                            @endif

                                                @if(\Helper::roleChecker($routeName . '.destroy'))
                                            <form class="d-inline" action="{{ route($routeName . '-main.destroy',$item->id) }}" method="POST">
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
                    {{ $items->withQueryString()->links('vendor.pagination.default') }}
                </div>
            </div>


        </div>
        <!-- .animated -->
    </div>
@endsection
