<div class="msf-view">
    <div class="other-block">
        <h2>Şəxsi</h2>
        <div class="content-block"></div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group form-group--imgfile">
                <input type="file" name="image" id="image" class="d-none">
                <label for="image"><img src="{{asset('frontend/images/svg-icons/file-img.svg')}}" alt="">Şəkil
                    əlavə et</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-floating">
                <input name="name" value="{{old('name')}}"  type="text" class="form-control @if($errors->has('name')) input-validation-error @endif " placeholder="Ad *"
                        required>
                <label >Ad *</label>
            </div>
            <div class="form-group form-floating">
                <input name="lastname" value="{{old('lastname')}}" type="text" class="form-control @if($errors->has('lastname')) input-validation-error @endif " placeholder="Soyad *"
                       required>
                <label>Soyad *</label>
            </div>
            <div class="form-group form-floating">
                <input name="father_name" value="{{old('father_name')}}" type="text" class="form-control @if($errors->has('father_name')) input-validation-error @endif  @if($errors->has('father_name')) input-validation-error @endif " placeholder="Ata adı *"
                       required>
                <label>Ata adı *</label>
            </div>
            <div class="form-group form-floating">
                <select name="gender" class="form-control @if($errors->has('gender')) input-validation-error @endif " required>
                    <option disabled selected>---</option>
                    <option @if(old('gender') === __('vacancy.man')) selected @endif value="@lang('vacancy.man')">@lang('vacancy.man')</option>
                    <option @if(old('gender') === __('vacancy.woman')) selected @endif value="@lang('vacancy.woman')">@lang('vacancy.woman')</option>
                </select>
                <label >Cinsi *</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-floating">
                <select name="birthday[day]" class="form-control @if($errors->has('birthday.day')) input-validation-error @endif " required>
                    <option disabled selected>---</option>
                    @for($i = 1;$i <= 31 ; $i++)
                        <option @if(old('birthday.day') == $i ) selected @endif  value="{{$i}}">{{$i}}</option>
                    @endfor


                </select>
                <label >Doğum günü *</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group form-floating">
                <select name="birthday[month]"  class="form-control @if($errors->has('birthday.month')) input-validation-error @endif " required>
                    <option disabled selected>---</option>
                    <option @if(old('birthday.month') === __('vacancy.january') ) selected @endif value="@lang('vacancy.january')">@lang('vacancy.january')</option>
                    <option @if(old('birthday.month') === __('vacancy.february') ) selected @endif value="@lang('vacancy.february')">@lang('vacancy.february')</option>
                    <option @if(old('birthday.month') === __('vacancy.march') ) selected @endif value="@lang('vacancy.march')">@lang('vacancy.march')</option>
                    <option @if(old('birthday.month') === __('vacancy.april') ) selected @endif value="@lang('vacancy.april')">@lang('vacancy.april')</option>
                    <option @if(old('birthday.month') === __('vacancy.may') ) selected @endif value="@lang('vacancy.may')">@lang('vacancy.may')</option>
                    <option @if(old('birthday.month') === __('vacancy.june') ) selected @endif value="@lang('vacancy.june')">@lang('vacancy.june')</option>
                    <option @if(old('birthday.month') === __('vacancy.july') ) selected @endif value="@lang('vacancy.july')">@lang('vacancy.july')</option>
                    <option @if(old('birthday.month') === __('vacancy.august') ) selected @endif value="@lang('vacancy.august')">@lang('vacancy.august')</option>
                    <option @if(old('birthday.month') === __('vacancy.september') ) selected @endif value="@lang('vacancy.september')">@lang('vacancy.september')</option>
                    <option @if(old('birthday.month') === __('vacancy.october') ) selected @endif value="@lang('vacancy.october')">@lang('vacancy.october')</option>
                    <option @if(old('birthday.month') === __('vacancy.november') ) selected @endif value="@lang('vacancy.november')">@lang('vacancy.november')</option>
                    <option @if(old('birthday.month') === __('vacancy.december') ) selected @endif value="@lang('vacancy.december')">@lang('vacancy.december')</option>


                </select>
                <label >Ay *</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group form-floating">
                <select  name="birthday[year]"  class="form-control @if($errors->has('birthday.year')) input-validation-error @endif " required>
                    <option disabled selected>---</option>
                    @for($i = ( date('Y') - 18 ); $i >= ( date('Y') - 65 ) ; $i--)
                        <option @if(old('birthday.year') == $i ) selected @endif value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
                <label >İl *</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-floating">
                <select name="relation"  class="form-control @if($errors->has('relation')) input-validation-error @endif ">
                    <option @if(old('relation') === __('vacancy.single') ) selected @endif value="@lang('vacancy.single')">@lang('vacancy.single')</option>
                    <option @if(old('relation') === __('vacancy.married') ) selected @endif value="@lang('vacancy.married')">@lang('vacancy.married')</option>
                </select>
                <label >Ailə vəziyyəti *</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-floating">
                <select name="children"  class="form-control @if($errors->has('children')) input-validation-error @endif ">
                    <option value="">Yoxdur</option>
                    @for($i = 1;$i <= 6 ; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                    <option value="6+">6+</option>
                </select>
                <label >Varsa, övlad sayı</label>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group form-floating">
                <input  value="{{old('place_of_birth')}}" name="place_of_birth" type="text" class="form-control @if($errors->has('place_of_birth')) input-validation-error @endif "
                       placeholder="Doğulduğu yer" data-val="true">
                <label>Doğulduğu yer</label>
            </div>
            <div class="form-group form-floating">
                <input  value="{{old('citizenship')}}" name="citizenship" type="text" class="form-control @if($errors->has('citizenship')) input-validation-error @endif "
                       placeholder="Vətəndaşlıq">
                <label>Vətəndaşlıq</label>
            </div>
            <div class="form-group form-floating">
                <input  value="{{old('reg_address')}}" name="reg_address" type="text" class="form-control @if($errors->has('reg_address')) input-validation-error @endif "
                       placeholder="Qeydiyyat ünvanı" required>
                <label>Qeydiyyat ünvanı</label>
            </div>
            <div class="form-group form-floating">
                <input  value="{{old('address')}}" name="address" type="text" class="form-control @if($errors->has('address')) input-validation-error @endif "
                       placeholder="Yaşadığı faktiki ünvan">
                <label>Yaşadığı faktiki ünvan</label>
            </div>
            <div class="form-group form-floating">
                <input value="{{old('telephone')}}" name="telephone" type="text" class="form-control @if($errors->has('telephone')) input-validation-error @endif " placeholder="Telefon">
                <label>Telefon</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-floating">
                <input value="{{old('phone')}}" name="phone" type="text" class="form-control @if($errors->has('phone')) input-validation-error @endif "
                       placeholder="Mobil nömrə *" required>
                <label>Mobil nömrə *</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-floating">
                <input value="{{old('email')}}" name="email" type="email" class="form-control @if($errors->has('email')) input-validation-error @endif " placeholder="E-poçt *"
                       required>
                <label>E-poçt *</label>
            </div>
        </div>

    </div>


</div>
