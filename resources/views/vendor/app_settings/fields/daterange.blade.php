@component('app_settings::input_group', compact('field'))

    <?php
        $pages=\App\Models\Atom\Page::all();

    ?>

    <div class="row">
        <div class="col-md-12">






                <select class="{{ $field["class"] }}" name="{{$field['name']}}[]" multiple id="">

                    @foreach(config_json( 'article-types') as $pages)
                    @foreach($pages as $key=>$page)
                     <?php
                            $selected=false;
                        if(in_array($key, setting($field['name'])['from'])){
                            $selected=true;
                        }else{
                            $selected=false;

                        }
                        ?>
                        <option @if($selected) selected @endif  value="{{$key}}">{{__('backend.'.$key)}}</option>
                        @endforeach
                        @endforeach

                </select>






        </div>

    </div>
@endcomponent
