<?php

namespace App\Models\Atom;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'status'
    ];


    public function role() {

        return $this->belongsTo(Role::class, 'role_id');
    }


    public function roles() {
       $roles = ['dashboard'] ;

       if (is_null($this->role)) return $roles ;

       foreach ($this->role->permissions as $permission)
       {
           if ($permission->full)
           {
               $roles[] = $permission->model   ;


           }
           else{
               $roles[] = $permission->C ? $permission->model .'.create' : '' ;
               $roles[] = $permission->C ? $permission->model .'.store' : '' ;
               $roles[] = $permission->R ? $permission->model .'.index' : '' ;
               $roles[] = $permission->U ? $permission->model .'.edit' : '' ;
               $roles[] = $permission->U ? $permission->model .'.update' : '' ;
               $roles[] = $permission->D ? $permission->model .'.destroy' : '' ;
           }



       }

       return array_values(array_unique(array_filter($roles))) ;
    }


    public function hasRole($route):bool
    {
         $full = explode('.', $route) ;

        if ($this->is_admin || in_array($full[0],$this->roles())) return  true ;



        return in_array($route,$this->roles()) ;

}


}
