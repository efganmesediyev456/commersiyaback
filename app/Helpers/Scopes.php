<?php


namespace App\Helpers;


trait Scopes
{
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeMain($query)
    {
        return $query->where('parent_id', null);
    }

    public function scopeOrdering($query)
    {
        return $query->orderBy('ordering');
    }

    public function scopePaginate20($query)
    {
        return $query->paginate(20);
    }


    public function scopeOrderByDate($query)
    {
        return $query->orderBy('date', 'DESC')->orderBy('id', 'DESC');
    }

    public function scopeOnlyLocale($query)
    {

        return $query->whereHas('translations', function ($q) {

            return $q->whereNotNull('title')
                ->where('title', '<>', '')
                ->where('locale', config('app.locale'));
        });
    }

}
