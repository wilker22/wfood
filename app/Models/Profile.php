<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Profile extends Model
{
    protected $fillable = ['name', 'description'];

    /**
     * get permissions
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
