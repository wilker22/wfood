<?php

namespace App\Repositories\Contracts;

interface TableRepositoryInterface
{
    public function getTablesByTenantUuid(string $uuid);
    public function getTablesByTenantId(int $idTenant);
<<<<<<< HEAD
    public function getTableByUuid(string $uuid);
=======
    public function getTableByIdentify(string $uuid);
>>>>>>> dad99c20418a46e5341affe3d2806e68109005c6
}
