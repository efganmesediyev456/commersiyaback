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
                                    <th>Başlıq</th>
                                    <th>Şəkil</th>
                                    <th>Sıralama</th>
                                    <th>İdarə</th>

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as  $item)
                                        <tr @if($item->status==0) style="background:#f3c3c3;" @endif>
                                             <td>
                                                 {{$item->id}}
                                             </td>
                                            <td>
                                                {{$item->title}}
                                            </td>
                                            <td>
                                                @if($item->image)
                                                <img class="table-image" src="{{$item->image}}" alt="{{$item->title}}">
                                                @endif
                                            </td>

                                            <td>
                                                {{$item->date_with_hour}}
                                            </td>

                                            <td>

                                                @php
                                                    $appends = [
                                                                           $item->id,
                                                         'type'         => request()->get('type'),
                                                         'category'     => request()->get('category')

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
                    {{ $items->withQueryString()->links('vendor.pagination.default') }}
                </div>
            </div>


        </div>
        <!-- .animated -->
    </div>
@endsection
