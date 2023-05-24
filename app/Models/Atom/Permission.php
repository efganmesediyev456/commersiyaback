<?php

namespace App\Models\Atom;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Permission extends Model
{
    use HasFactory,  LogsActivity;


    protected static $logAttributes = ['*'];
    protected $guarded = [];


    public function roles() {

        return $this->belongsToMany('App\Models\Role');
    }
}
