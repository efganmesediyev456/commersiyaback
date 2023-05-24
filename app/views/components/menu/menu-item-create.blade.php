<div class="modal fade new-data " tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" id="largeModal"  >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="close-modal">×</span>
                </button>
            </div>
            <form action="{{route('menu-item.store')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body" >

                @csrf
                <!-- TABS MULTI LANGUAGE -->
                    <ul class="nav nav-pills mb-3 nav-sticky"  id="pills-tab" role="tablist">
                        @foreach(config('app.locales') as $locale)
                            <li class="nav-item">
                                <a class="nav-link @if($loop->iteration == 1) active show @endif "  data-toggle="pill" href="#tab-{{$loop->iteration + 4}}" role="tab"  aria-selected="true">{{$locale}}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        @foreach(config('app.locales') as $lang => $locale)
                            <div class="tab-pane fade @if($loop->iteration == 1) active show @endif" id="tab-{{$loop->iteration + 4}}" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Başlıq</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input name="title[{{$lang}}]" placeholder="" value="" class="form-control to-epmt">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Link</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input name="link[{{$lang}}]" placeholder="" value="" class="form-control to-epmt">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr/>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Səhifə</label><br/>

                        </div>
                        <div class="col-12 col-md-9">
                            <div class="select_pages mb-3">
                                <i class="far fa-chevron-circle-down"></i>
                                <input type="text"  class="select-page-input to-epmt">
                                <div class="pages-for-select">
                                    @foreach($page as $p)
                                        <span value="{{$p->id}}">{{$p->title}}</span>
                                    @endforeach
                                </div>

                            </div>
{{--                            <select name="page" class="form-control" id="">--}}
{{--                                <option value="">---</option>--}}
{{--                                @foreach($page as $p)--}}
{{--                                    <option value="{{$p->id}}">{{$p->title}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}

                            <small> <strong class="color-red">*Səhifəyə bağlıdırsa seçilir</strong></small>
                        </div>
                    </div>


                    <!-- END TABS MULTI LANGUAGE -->

                    <input type="hidden" name="child" class="child_field to-epmt">
                    <input type="hidden" name="menu_item" class="to-epmt" value="{{$menu->id}}">
                    <input type="hidden" name="page" value="" class="to-epmt">


                    <!-- ON BLANK RADIO -->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Yeni səhifədə</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="form-check-inline form-check ">
                                <label for="inline-radio1" class="form-check-label mr-4">
                                    <input type="radio" name="on_blank" value="1"  class="form-check-input edit">Aktiv
                                </label>
                                <label for="inline-radio2" class="form-check-label ">
                                    <input type="radio"  name="on_blank" value="0"  checked class="form-check-input edit">Deaktiv
                                </label>

                            </div>
                        </div>
                    </div>
                    <!--END ON BLANK RADIO -->

                    <!-- ACTIVE & DEACTIVE RADIO -->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Status</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="form-check-inline form-check ">
                                <label for="inline-radio1" class="form-check-label mr-4">
                                    <input type="radio" name="status" value="1"  checked class="form-check-input">Aktiv
                                </label>
                                <label for="inline-radio2" class="form-check-label ">
                                    <input type="radio"  name="status" value="0" class="form-check-input">Deaktiv
                                </label>

                            </div>
                        </div>
                    </div>
                    <!--END ACTIVE & DEACTIVE RADIO -->

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">   <i class="fa fa-dot-circle-o"></i> Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




@push('scripts')
    <script>
        $('.select-page-input')
            //OPEN MODAL
           .on('click',function (event) {
            event.stopPropagation()

            $(this).parents('.select_pages').addClass('active')
           })
            ///INPUT
            .on('input',function () {

            $(this).parents('.select_pages').find('span').addClass('remove')

            $(this).parents('.select_pages').find('span').each( (key, index) => {
                $str = $(index).text().toLowerCase()
                if($str.includes($(this).val().toLowerCase())){
                    $(index).removeClass('remove');
                }

            })

                $(this).parents('.select_pages').find('span.active').removeClass('remove') ;

                if($(this).val().length)
                {
                    $(this).parents('.modal-body').find('input[name="page"]')
                        .val($(this).parents('.select_pages').find('span.active').attr('value'))
                }
                else {
                    $(this).parents('.modal-body').find('input[name="page"]').val($(this).attr(''))
                    $(this).parents('.select_pages').find('span').removeClass('active')
                }
        })

        $('.select_pages span').on('click',function (event) {
            event.stopPropagation()

            $(this).parents('.select_pages').find('span').removeClass('active')

            $(this).addClass('active')
            $(this).parents('.select_pages').find('.select-page-input').val($(this).text());
            $(this).parents('.select_pages').removeClass('active')



            $(this).parents('.modal-body').find('input[name="page"]').val($(this).attr('value'))



        })

        $('body').on('click',function () {
            $('.select_pages.active .select-page-input').val($('.select_pages.active span.active').text())
            $('.select_pages.active').removeClass('active')
        })



    </script>
@endpush
