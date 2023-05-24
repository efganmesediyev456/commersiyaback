<div class="msf-view">
    <div class="other-block">
        <h2>Təhsili</h2>
        <div class="content-block"></div>
    </div>
    <div class="education">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-floating">
                    <input name="education[name][]" type="text" class="form-control @if($errors->has('education.name')) input-validation-error @endif "
                           placeholder="Təhsil müəssisənin adı">
                    <label>Təhsil müəssisənin adı</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-floating">
                    <input name="education[faculty][]" type="text" class="form-control @if($errors->has('education.faculty')) input-validation-error @endif "
                           placeholder="Fakültə / ixtisas">
                    <label>Fakültə / ixtisas</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-floating">
                    <select name="education[start_day][]"  class="form-control @if($errors->has('education.start_day')) input-validation-error @endif ">
                        <option disabled selected>---</option>
                        @for($i = 1;$i <= 31 ; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <label >Giriş tarixi / gün *</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group form-floating">
                    <select name="education[start_month][]" class="form-control @if($errors->has('education.start_month')) input-validation-error @endif ">
                        <option disabled selected>---</option>
                        <option value="@lang('vacancy.january')">@lang('vacancy.january')</option>
                        <option value="@lang('vacancy.february')">@lang('vacancy.february')</option>
                        <option value="@lang('vacancy.march')">@lang('vacancy.march')</option>
                        <option value="@lang('vacancy.april')">@lang('vacancy.april')</option>
                        <option value="@lang('vacancy.may')">@lang('vacancy.may')</option>
                        <option value="@lang('vacancy.june')">@lang('vacancy.june')</option>
                        <option value="@lang('vacancy.july')">@lang('vacancy.july')</option>
                        <option value="@lang('vacancy.august')">@lang('vacancy.august')</option>
                        <option value="@lang('vacancy.september')">@lang('vacancy.september')</option>
                        <option value="@lang('vacancy.october')">@lang('vacancy.october')</option>
                        <option value="@lang('vacancy.november')">@lang('vacancy.november')</option>
                        <option value="@lang('vacancy.december')">@lang('vacancy.december')</option>
                    </select>
                    <label >Ay *</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group form-floating">
                    <select name="education[start_year][]" class="form-control @if($errors->has('education.start_year')) input-validation-error @endif ">
                        <option disabled selected>---</option>
                        @for($i = ( date('Y') ); $i >= ( date('Y') - 47 ) ; $i--)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <label >İl *</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-floating">
                    <select name="education[end_day][]" class="form-control @if($errors->has('education.end_day')) input-validation-error @endif ">
                        <option disabled selected>---</option>
                        @for($i = 1;$i <= 31 ; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <label >Bitirmə tarixi / gün *</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group form-floating">
                    <select name="education[end_month][]"  class="form-control @if($errors->has('education.end_month')) input-validation-error @endif ">
                        <option disabled selected>---</option>
                        <option value="@lang('vacancy.january')">@lang('vacancy.january')</option>
                        <option value="@lang('vacancy.february')">@lang('vacancy.february')</option>
                        <option value="@lang('vacancy.march')">@lang('vacancy.march')</option>
                        <option value="@lang('vacancy.april')">@lang('vacancy.april')</option>
                        <option value="@lang('vacancy.may')">@lang('vacancy.may')</option>
                        <option value="@lang('vacancy.june')">@lang('vacancy.june')</option>
                        <option value="@lang('vacancy.july')">@lang('vacancy.july')</option>
                        <option value="@lang('vacancy.august')">@lang('vacancy.august')</option>
                        <option value="@lang('vacancy.september')">@lang('vacancy.september')</option>
                        <option value="@lang('vacancy.october')">@lang('vacancy.october')</option>
                        <option value="@lang('vacancy.november')">@lang('vacancy.november')</option>
                        <option value="@lang('vacancy.december')">@lang('vacancy.december')</option>
                    </select>
                    <label >Ay *</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group form-floating">
                    <select name="education[end_year][]"  class="form-control @if($errors->has('education.end_year')) input-validation-error @endif ">
                        <option disabled selected>---</option>
                        @for($i = ( date('Y')  ); $i >= ( date('Y') - 47 ) ; $i--)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <label >İl *</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group form-floating">
                    <input name="education[note][]" type="text" class="form-control @if($errors->has('education.note')) input-validation-error @endif " placeholder="Qeyd">
                    <label >Qeyd</label>
                </div>
            </div>


        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a class="add-to add-to-education">
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11">
                    <use xlink:href="#svg-plus"></use>
                </svg>
                <span >Təhsil müəssisəsi əlavə et</span>
            </a>
        </div>
    </div>
</div>
