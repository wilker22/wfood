<?php

namespace App\Observers;

use App\Models\Table;
use Illuminate\Support\Str;

class TableObserver
{
    public function creating(Table $table)
    {

        $table->uuid = Str::uuid();
    }

}
