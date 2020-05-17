<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'description'];

    /**
     * Relacionamento com a tabela Permissions
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

     /**
     * permissions não linkadas ao nosso perfil
     */
    public function permissionsAvailable($filter = null)
    {
        $permissions = Permission::whereNotIn('permissions.id', function($query){
            $query->select('permission_role.permission_id');
            $query->from('permission_role');
            $query->whereRaw("permission_role.role_id={$this->id}");

        })
        ->where(function($queryFilter) use ($filter){
            if($filter)
                $queryFilter->where('permissions.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $permissions;
    }
}
