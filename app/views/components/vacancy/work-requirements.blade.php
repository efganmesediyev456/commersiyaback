<div class="msf-view">
    <div class="other-block">
        <h2>İş tələbləri</h2>
        <div class="content-block"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group form-floating">
                <select name="work_mode"  class="form-control @if($errors->has('work_mode')) input-validation-error @endif ">
                    <option @if(old('work_mode') === __('vacancy.normal')) selected @endif value="Normal">Normal</option>
                    <option @if(old('work_mode') === __('vacancy.normal')) selected @endif value="Növbəli iş rejimi">Növbəli iş rejimi</option>
                    <option @if(old('work_mode') === __('vacancy.normal')) selected @endif value="Gün">Gün</option>
                    <option @if(old('work_mode') === __('vacancy.normal')) selected @endif value="Gecə">Gecə</option>
                    <option @if(old('work_mode') === __('vacancy.normal')) selected @endif value="Fərqi yoxdur">Fərqi yoxdur</option>

                </select>
                <label >İş rejimi</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-floating">
                <input value="{{old('work_salary')}}" name="work_salary"  type="number" class="form-control @if($errors->has('work_salary')) input-validation-error @endif "
                        placeholder="İstədiyiniz əmək haqqı" required>
                <label >İstədiyiniz əmək haqqı</label>
            </div>
        </div>
        <div class="col-md-6">

            @if(!request()->get('vacancy'))
                <div class="form-group form-floating">
                    <input value="{{old('work_name')}}" name="work_name"  type="text" class="form-control @if($errors->has('work_name')) input-validation-error @endif "
                           placeholder="İşləmək istədiyiniz işin adı" required>
                    <label >İşləmək istədiyiniz işin adı</label>
                </div>
            @endif




        </div>
    </div>
</div>
