<?php

namespace App\Repositories\Contracts;

interface OrderRepositoryInterface
{
    public function createNewOrder(
        string $identify,
        float $total,
        string $status,
        int $tenant_id,
        $clienteId = '',
        $tableId = ''
    );
    public function getOrderByIdentify(string $identify);
    //public function getProductByUuid(string $uuid);
}
