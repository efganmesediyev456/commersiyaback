<div class="msf-view">
    <div class="other-block">
        <h2>İş təcrübəsi</h2>
        <div class="content-block"></div>
    </div>
    <div class="work-experience">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-floating">
                    <input name="work_experience[name][]" type="text" class="form-control"
                           placeholder="İşlədiyi təşkilatın adı">
                    <label>İşlədiyi təşkilatın adı</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-floating">
                    <input name="work_experience[salary][]" type="text" class="form-control"
                           placeholder="Məvacibi">
                    <label>Məvacibi</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-floating">
                    <input name="work_experience[position][]" type="text" class="form-control"
                           placeholder="Vəzifəsi">
                    <label>Vəzifəsi</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-floating">
                    <input name="work_experience[reason][]" type="text" class="form-control"
                           placeholder="İşdən ayrılma səbəbi">
                    <label>İşdən ayrılma səbəbi</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-floating">
                    <select name="work_experience[start_day][]" class="form-control">
                        <option disabled selected>---</option>
                        @for($i = 1;$i <= 31 ; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <label >İşə başlama tarixi / gün *</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group form-floating">
                    <select name="work_experience[start_month][]"  class="form-control">
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
                    <select name="work_experience[start_year][]"  class="form-control">
                        <option disabled selected>---</option>
                        @for($i = ( date('Y') - 18 ); $i >= ( date('Y') - 65 ) ; $i--)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <label >İl *</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-floating">
                    <select name="work_experience[end_day][]" class="form-control">
                        @for($i = 1;$i <= 31 ; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <label >Çıxış tarixi / gün *</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group form-floating">
                    <select name="work_experience[end_month][]" class="form-control">
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
                    <select name="work_experience[end_year][]"  class="form-control">
                        <option disabled selected>---</option>
                        @for($i = ( date('Y') - 18 ); $i >= ( date('Y') - 65 ) ; $i--)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <label >İl *</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group form-floating">
                    <input name="work_experience[note][]" value="{{old('')}}" type="text" class="form-control" placeholder="Qeyd">
                    <label >Qeyd</label>
                </div>
            </div>


        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <a class="add-to add-to-work">
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11">
                    <use xlink:href="#svg-plus"></use>
                </svg>
                <span>İş yeri əlavə et</span>
            </a>
        </div>
    </div>

    <div class="row driving-license">
        <div class="col-md-6">
            <div class="form-group form-floating">
                <select name="drive_license[have]"  class="form-control">
                    <option @if(old('drive_license.have') == null ) selected @endif  value="" >Yoxdur</option>
                    <option @if(old('drive_license.have') == 'yes' ) selected @endif value="yes">Var</option>

                </select>
                <label >Sürücülük vəsiqəsi</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group form-floating">
                <select name="drive_license[type]"  class="form-control">
                    <option  value="">--</option>
                    <option @if(old('drive_license.type') == 'A1' ) selected @endif value="1">A1</option>
                    <option @if(old('drive_license.type') == 'A' ) selected @endif value="A">A</option>
                    <option @if(old('drive_license.type') == 'B1' ) selected @endif value="B1">B1</option>
                    <option @if(old('drive_license.type') == 'B' ) selected @endif value="B">B</option>
                    <option @if(old('drive_license.type') == 'C1' ) selected @endif value="C1">C1</option>
                    <option @if(old('drive_license.type') == 'C' ) selected @endif value="C">C</option>
                    <option @if(old('drive_license.type') == 'D1' ) selected @endif value="D1">D1</option>
                    <option @if(old('drive_license.type') == 'D' ) selected @endif value="D">D</option>
                    <option @if(old('drive_license.type') == 'BE' ) selected @endif value="BE">BE</option>
                    <option @if(old('drive_license.type') == 'C1E' ) selected @endif value="C1E">C1E</option>
                    <option @if(old('drive_license.type') == 'CE' ) selected @endif value="CE">CE</option>
                    <option @if(old('drive_license.type') == 'D1E' ) selected @endif value="D1E">D1E</option>
                    <option @if(old('drive_license.type') == 'DE' ) selected @endif value="DE">DE</option>
                </select>
                <label >Dərəcəsi</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group form-floating">
                <select name="drive_license[level]"  class="form-control">
                    <option value="">---</option>
                    @for($i = 1; $i <= 5 ; $i++ )
                        <option @if(old('drive_license.level') == $i . ' il' ) selected @endif  value="{{$i}} il">{{$i}} il</option>
                    @endfor
                    <option @if(old('drive_license.level') == '5+ il' ) selected @endif  value="5+ il">5+ il</option>
                </select>
                <label >Təcrübəsi</label>
            </div>
        </div>
    </div>

</div>
