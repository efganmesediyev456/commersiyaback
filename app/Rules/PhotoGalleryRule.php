<?php

namespace App\Rules;

use App\Models\Atom\SimpleItem;
use http\Env\Request;
use Illuminate\Contracts\Validation\Rule;

class PhotoGalleryRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {


    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return (boolean) SimpleItem::where('model','Article')->
            where('type','gallery')->
            where('page_id',$value)->
            count() ;


    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Qalereya boş qala bilməz !';
    }
}
