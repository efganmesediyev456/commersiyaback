<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;

class GlobalObserver
{
    public function updated(Model $model)
    {
        \Artisan::call('optimize:clear');
    }

    public function created(Model $model)
    {
        \Artisan::call('optimize:clear');
    }

    public function deleted(Model $model)
    {
        \Artisan::call('optimize:clear');
    }

    public function forceDeleted(Model $model)
    {
        \Artisan::call('optimize:clear');
    }
}
