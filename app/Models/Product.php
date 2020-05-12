<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use TenantTrait;

    protected $fillable = ['title', 'flag', 'image', 'price', 'description'];

    public function categories()
    {
        $this->belongsToMany(Category::class);
    }
}
