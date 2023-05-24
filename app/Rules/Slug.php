<?php

namespace App\Rules;

use App\Models\Atom\Page;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class Slug implements Rule
{
    private Request $request;
    private $id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Request $request,$id = null)
    {

        $this->request = $request ;
        $this->id = $id ;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $id = $this->id ;

        if (is_null($this->request->parent_id))
        {
            return !(boolean) Page::whereNull('parent_id')
                ->where(function ($query) use ($id,$value) {
                    if (is_null($id)) $query->where('slug',Str::slug($value));
                    else $query->where('id' ,'!=', $id)->where('slug',Str::slug($value));
                })
                ->count() ;
        }
        else
        {
            return !(boolean) Page::where('parent_id',$this->request->parent_id)
                ->where(function ($query) use ($id,$value) {
                    if (is_null($id)) $query->where('slug',Str::slug($value));
                    else $query->where('id' ,'!=', $id)->where('slug',Str::slug($value)); //
                })
                ->count() ;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Səhifə  '. $this->request->title[config('app.fallback_locale')] .' artıq mövcuddur.';
    }
}
