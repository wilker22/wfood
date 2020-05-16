<?php

namespace App\Tenant\Observers;

use App\Models\Tenant;
use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TenantObserver
{
    /**
     * Handle the tenant "creating" event.
     *
     * @param  Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function creating(Tenant $tenant)
    {
        $tenant->uuid = Str::uuid();
        $tenant->url = Str::kebab($tenant->name);
    }

     /**
      * Handle the tenant "updated" event.
      *
      * @param  \App\Models\Tenant  $tenant
      * @return void
      */
      public function updating(Tenant $tenant)
    {
        $tenant->url = Str::kebab($tenant->name);
    }

}
