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
                                  @if(in_object('image','simple-items.'.request()->get('type').'.labels') ||
                                      in_object('images','simple-items.'.request()->get('type').'.labels'))
                                        <th>Şəkil</th>
                                    @endif
                                  @if(in_object('file','simple-items.'.request()->get('type').'.labels'))  <th>Fayl</th> @endif
                                    <th>Sıralama</th>
                                    <th>İdarə</th>

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as  $item)
                                        <tr>
                                             <td>
                                                 {{$item->item_id}}
                                             </td>
                                            <td>
                                                {{$item->title}}
                                            </td>
                                            @if(in_object('image','simple-items.'.request()->get('type').'.labels') || in_object('images','simple-items.'.request()->get('type').'.labels'))
                                            <td>
                                                    @foreach($item->getMedia($item->type) as $media)
                                                        @if(!is_null($media) && str_contains($media->mime_type , 'image'))

                                                            <img class="table-image" src="{{$media->getFullUrl() ?? ''}}" alt="{{$item->title}}">
                                                        @endif
                                                    @endforeach
                                            </td>
                                            @endif

                                            @if(in_object('file','simple-items.'.request()->get('type').'.labels'))
                                                <td>
                                                    @foreach($item->getMedia($item->type) as $media)
                                                        @if(!is_null($media) && !str_contains($media->mime_type , 'image'))

                                                            <a href="{{$media->getFullUrl() ?? ''}}" target="_blank" class="btn btn-outline-secondary btn-sm"> <i class="fa fa-file"></i> Fayl</a>
                                                        @endif
                                                    @endforeach
                                                </td>
                                            @endif

                                            <td>
                                                {{$item->ordering}}
                                            </td>
                                            <td>
                                                @php
                                                    $appends = [
                                                                            $item->id,
                                                         'model'        => request()->get('model'),
                                                         'page_id'      => request()->get('page_id'),
                                                         'type'         => request()->get('type'),
                                                         'on_iframe'    => request()->get('on_iframe'),
                                                         'uniq_id'    =>   request()->get('uniq_id'),
                                                    ]
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
