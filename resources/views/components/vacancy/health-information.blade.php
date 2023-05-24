<div class="msf-view">
    <div class="other-block">
        <h2>Sağlamlıq barədə məlumatlar</h2>
        <div class="content-block"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group form-floating">
                <select name="army"  class="form-control @if($errors->has('army')) input-validation-error @endif ">
                    <option  selected>@lang('vacancy.yes')</option>
                    <option @if(old('army') == __('vacancy.no') ) selected @endif value="@lang('vacancy.no')">@lang('vacancy.no')</option>
                </select>
                <label >Hərbi xidmətdə olmusunuzmu? *</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-floating">
                <select name="health" class="form-control @if($errors->has('health')) input-validation-error @endif ">
                    <option @if(old('health') == __('vacancy.yes') ) selected @endif value="@lang('vacancy.yes')" value="@lang('vacancy.yes')">@lang('vacancy.yes')</option>
                    <option value="@lang('vacancy.no')" selected>@lang('vacancy.no')</option>
                </select>
                <label >Sağlamlıqla əlaqəli bir probleminiz varmı?</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-floating">
                <select name="crime" class="form-control @if($errors->has('crime')) input-validation-error @endif ">
                    <option @if(old('crime') == __('vacancy.yes') ) selected @endif value="@lang('vacancy.yes')" value="@lang('vacancy.yes')">@lang('vacancy.yes')</option>
                    <option value="@lang('vacancy.no')" selected>@lang('vacancy.no')</option>
                </select>
                <label >Cinayət məsuliyətinə cəlb olunmusunuzmu?</label>
            </div>
        </div>

    </div>
</div>
