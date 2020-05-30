<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use TenantTrait;

    protected $fillable = [
        'identify', 'client_id', 'table_id', 'total', 'status', 'comment' , 'tenant_id'
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
