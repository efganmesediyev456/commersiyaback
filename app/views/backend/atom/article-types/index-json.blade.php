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
                                    <th class="serial" style="width: 80px">#</th>
                                    <th>Əsas kateqoriya</th>
                                    <th>Kateqoriya</th>
                                    <th>Sahələr</th>
                                    <th>Idarə</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as $key => $item)
                                        @if(isset($item))

                                            @foreach($item as $label => $value)
                                                <tr>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td>
                                                        {{ __($key)   }}
                                                    </td>

                                                    <td>

                                                        {{$label}}
                                                    </td>
                                                    <td>

                                                    @foreach(config_json( 'article-types.' . $key . '.' . $label ) as $k => $value)
                                                            {{$k}} ,
                                                    @endforeach
                                                    </td>
                                                    <td>
                                                        @if(\Helper::roleChecker($routeName . '.edit'))
                                                            <a class="badge btn mr-2 badge-complete p-0" href="{{ route($routeName . '.edit',[$key,$label]) }}"><i class="far fa-pencil-alt size32"></i></a>
                                                        @endif

                                                        @if(\Helper::roleChecker($routeName . '.destroy'))
                                                            <form class="d-inline" action="{{ route($routeName . '.destroy',[$key,$label]) }}" method="POST">
                                                                {{ method_field('DELETE')}} @csrf
                                                                <button class="badge btn badge-danger p-0" onclick="if (!confirm('Silmək istədiyinizdən əminsiniz?')) { return false }"><i class="far fa-trash-alt size32"></i> </button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
 {{--
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ __($key)   }}
                                            </td>

                                            <td>

                                                @if(isset($item))
                                                    @foreach($item as $label => $value)

                                                        {{$label }}   ,
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if(\Helper::roleChecker($routeName . '.edit'))
                                                    <a class="badge btn mr-2 badge-complete p-0" href="{{ route($routeName . '.edit',$key) }}"><i class="far fa-pencil-alt size32"></i></a>
                                                @endif

                                                @if(\Helper::roleChecker($routeName . '.destroy'))
                                                    <form class="d-inline" action="{{ route($routeName . '.destroy',$key) }}" method="POST">
                                                        {{ method_field('DELETE')}} @csrf
                                                        <button class="badge btn badge-danger p-0" onclick="if (!confirm('Silmək istədiyinizdən əminsiniz?')) { return false }"><i class="far fa-trash-alt size32"></i> </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                        --}}
                                    @endforeach



                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div>
            </div>


        </div>
        <!-- .animated -->
    </div>
@endsection
