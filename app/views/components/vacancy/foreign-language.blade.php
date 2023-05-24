<div class="msf-view">
    <div class="other-block">
        <h2>Xarici dil</h2>
        <div class="content-block"></div>
    </div>
    <div class="foreign-language">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-floating">
                    <input name="foreignLanguage[language][]" type="text" class="form-control @if($errors->has('foreignLanguage.language')) input-validation-error @endif "
                           placeholder="İngilis dili">
                    <label >Dil</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-floating">
                    <select name="foreignLanguage[level][]"  class="form-control @if($errors->has('foreignLanguage.level')) input-validation-error @endif ">
                        <option disabled selected>---</option>
                        <option value="@lang('vacancy.ilkin')">@lang('vacancy.ilkin')</option>
                        <option value="@lang('vacancy.orta')">@lang('vacancy.orta')</option>
                        <option value="@lang('vacancy.yaxsi')">@lang('vacancy.yaxsi')</option>
                        <option value="@lang('vacancy.ela')">@lang('vacancy.ela')</option>
                        <option value="@lang('vacancy.serbest')">@lang('vacancy.serbest')</option>
                        <option value="@lang('vacancy.dogma')">@lang('vacancy.dogma')</option>


                    </select>
                    <label >Səviyyə</label>
                </div>
            </div>


        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a class="add-to add-to-foreign-language">
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11">
                    <use xlink:href="#svg-plus"></use>
                </svg>
                <span>Dil əlavə et</span>
            </a>
        </div>
    </div>
</div>
