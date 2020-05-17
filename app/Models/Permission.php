<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'description'];



    /**
     * get profiles
     */
    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    /**
     * relacionamento com a tabela Roles
     */

     public function roles()
     {
         return $this->belongsToMany(Role::class);
     }
}
