@component('app_settings::input_group', compact('field'))
    <div style="padding-left: 0px!important;" class="col-md-6">
        <label for="">Deaktiv Dillər</label>
        {{setting('language')}}
        <select name="language" id="" multiple class="form-control">
            <option  value="az">az</option>
            <option value="en">en</option>
            <option value="ru">ru</option>
        </select>
    </div>

@endcomponent
