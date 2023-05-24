<div class="msf-view">

    <div class="other-block">
        <h2>Digər</h2>
        <div class="content-block"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group form-floating">
                <input name="about"  type="text" class="form-control @if($errors->has('about')) input-validation-error @endif "
                        placeholder="Özünüz barədə qeyd etmək istədiyiniz digər məlumatlar"
                        required>
                <label >Özünüz barədə qeyd etmək istədiyiniz digər
                    məlumatlar</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-group--file ">
                <input type="file" name="file" id="file2" class="d-none">
                <label for="file2"><img src="images/svg-icons/file.svg" alt="">Fayl əlavə et</label>
            </div>
        </div>
        <div class="col-md-6">
            {!! htmlFormButton(__('frontend.send'),['value'=>'submit','class' =>'btn w-100']) !!}
        </div>
    </div>
</div>
