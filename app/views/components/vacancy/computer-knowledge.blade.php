<div class="msf-view">
    <div class="other-block">
        <h2>Komputer bilikləri</h2>
        <div class="content-block"></div>
    </div>
    <div class="computer-knowledge">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-floating">
                    <input name="computerKnowledge[program][]"  type="text" class="form-control @if($errors->has('computerKnowledge.program')) input-validation-error @endif "
                           placeholder="Proqram adı">
                    <label >Proqram adı</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-floating">
                    <select name="computerKnowledge[level][]" class="form-control @if($errors->has('computerKnowledge.level')) input-validation-error @endif ">
                        <option disabled selected>---</option>
                        <option value="@lang('vacancy.junior')">@lang('vacancy.junior')</option>
                        <option value="@lang('vacancy.middle')">@lang('vacancy.middle')</option>
                        <option value="@lang('vacancy.senior')">@lang('vacancy.senior')</option>
                    </select>
                    <label >Səviyyə</label>
                </div>
            </div>

        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <a class="add-to add-to-computer-knowledge">
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11">
                    <use xlink:href="#svg-plus"></use>
                </svg>
                <span>Proqram əlavə et</span>
            </a>
        </div>
    </div>

</div>
