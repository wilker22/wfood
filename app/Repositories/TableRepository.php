<?php

namespace App\Repositories;

use App\Models\Table;
use App\Repositories\Contracts\TableRepositoryInterface;
use Illuminate\Support\Facades\DB;

class TableRepository implements TableRepositoryInterface
{
<<<<<<< HEAD
    protected $table;
=======
    protected $table; //refere-se à entidade ORM (tabela do banco de dados)
>>>>>>> dad99c20418a46e5341affe3d2806e68109005c6

    public function __construct()
    {
        $this->table = 'tables';
    }

    public function getTablesByTenantUuid(string $uuid)
    {
        return DB::table($this->table)
            ->join('tenants', 'tenants.id', '=', 'tables.tenant_id')
            ->where('tenants.uuid', $uuid)
            ->select('tables.*')
            ->get();
    }

    public function getTablesByTenantId(int $idTenant)
    {
        return DB::table($this->table)
                    ->where('tenant_id', $idTenant)
                    ->get();
    }

    public function getTableByUuid(string $uuid)
    {
        return DB::table($this->table)
                    ->where('identify', $uuid)
                    ->first();
    }
}
