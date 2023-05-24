<?php

namespace App\Models\Atom;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends Model
{
    use HasFactory,  LogsActivity;

    protected static $logAttributes = ['*'];

    protected $guarded = [];



    public function permissions() {
        return $this->belongsToMany(Permission::class,'role_permission') ;
    }
}
