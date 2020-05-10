<?php

namespace App\Tenant\Traits;

use App\Tenant\Observers\TenantObserver;

trait TenantTrait
{
     /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::observe(TenantObserver::class);
    }

}
