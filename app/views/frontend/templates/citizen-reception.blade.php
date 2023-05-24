@section('title',  $page->title ?? ($page->second_title ?? '') )
@section('keywords', implode(', ',explode(' ',$page->title2 ?? $page->title)) )
@section('description', $page->subtitle ??  mb_strimwidth(htmlspecialchars($page->description,ENT_QUOTES),0,205,'...') )
@section('image', $page->image ?  config('app.url') . '/storage/pages/' . $page->image : config('app.url') .'/storage/' . settings('logo')  )

@extends('frontend.layouts.default')

@section('content')
    @include('frontend.includes.breadcrumb')

    <section class="contacts">
        <div class="container-fluid">
            <h1 class="section-title"> {{$page->second_title ?? $page->title}}</h1>
            <div class="row">
                <div class="col-md-3 position-relative">


                    <div class="left-bar">
                        <x-Sidebar.Sidebar :sidebar="$sidebar"/>
                    </div>
                </div>
                 <div class="col-md-9">
                    <div class="content-block">
                        <div class="content-block__text">
                            <div class="content-block__accordion">
                                <div class="content-block__accordion__item">
                                    <h4 class="content-block__accordion__title content-block__accordion__title--active">
                                        Cədvəl
                                    </h4>
                                    <div class="text" style="display:block;">
                                        <div class="table-scroller">
                                            <table class="table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>S.A.A.</th>
                                                    <th>Vəzifəsi</th>
                                                    <th>Qəbul günləri</th>
                                                    <th>Qəbul saatları</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($page->get_simple_items() as $table)
                                                    @php($days = explode(',', $table->medium_text1))
                                                    @php($hours = explode(',', $table->text))

                                                    <tr>
                                                        <td>{{$table->title}}</td>
                                                        <td>{{$table->subtitle}}</td>
                                                        <td>
                                                            <ul>
                                                                @foreach($days as $day)
                                                                    <li>{{trim($day)}}</li>
                                                                @endforeach

                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <ul>
                                                                @foreach($hours as $hour)
                                                                    <li>{{trim($hour)}}</li>
                                                                @endforeach

                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
