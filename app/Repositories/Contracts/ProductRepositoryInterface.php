<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface
{
    public function getProductsByTenantId(int $idTenant);
    //public function getProductsByTenantId(int $idTenant);
    //public function getProductByUuid(string $uuid);
}
