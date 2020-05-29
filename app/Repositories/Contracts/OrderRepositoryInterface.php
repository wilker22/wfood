<?php

namespace App\Repositories\Contracts;

interface OrderRepositoryInterface
{
    public function createNewOrder(
        string $identify,
        float $total,
        string $status,
        int $tenant_id,
        string $comment = '',
        $clienteId = '',
        $tableId = ''
    );
    public function getOrderByIdentify(string $identify);
    public function registerProductsOrder(int $orderId, array $products);
}
