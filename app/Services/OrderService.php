<?php

namespace App\Services;

use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\TableRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class OrderService
{
    protected $orderRepository, $tenantRepository, $tableRepository, $productRepository;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        TenantRepositoryInterface $tenantRepository,
        TableRepositoryInterface $tableRepository,
        ProductRepositoryInterface $productRepository
        )
    {
        $this->orderRepository      = $orderRepository;
        $this->tenantRepository     = $tenantRepository;
        $this->tableRepository      = $tableRepository;
        $this->productRepository    = $productRepository;
    }

    public function ordersByClient()
    {
        $idClient = $this->getClientIdByOrder();

        return $this->orderRepository->getOrdersByClient($idClient);
    }

    public function createNewOrder(array $order)
    {
        $productsOrder = $this->getProductsByOrder($order['products'] ?? []);

        $identify = $this->getIdentifyOrder();
        $total = $this->getTotalOrder([]);
        $status = 'open';
        $tenantId = $this->getTenantIdByOrder($order['token_company']);
        $comment = isset($order['comment']) ? $order['comment'] : '';
        $clientId = $this->getClientIdByOrder();
        $tableId = $this->getTableIdByOrder($order['table'] ?? '');

        $order = $this->orderRepository->createNewOrder(
            $identify,
            $total,
            $status,
            $tenantId,
            $comment,
            $clientId,
            $tableId
        );

        $this->orderRepository->registerProductsOrder($order->id, $productsOrder);

        return $order;
    }



    private function getIdentifyOrder(int $qtyCaracteres = 8)
    {
        $smallletters = str_shuffle('abcdefghijklmnopqrstuvxz');
        $numbers .= 1234567890;

        //$specialCharacters = str_shufle('!@#$%¨&*-');
        //$characters = $smallletters.$numbers.$specialCharacters;
        $characters = $smallletters.$numbers;
        $identify = substr(str_shuffle($characters),0,$qtyCaracteres);

        if($this->orderRepository->getOrderByIdentify($identify)){
            $this->getIdentifyOrder($qtyCaracteres + 1);
        }

        return $identify;

    }

    private function getProductsByOrder(array $productOrder): array
    {
        $products = [];
        foreach($productOrder as $productOrder){
            $product = $this->productRepository->getProductByUuid($productOrder['identify']);
            array_push($products, [
                'id'    => $product->id,
                'qty'   => $productOrder['qty'],
                'price' => $product->price
            ]);
        }

        return $products;

    }

    private function getTotalOrder(array $products): float
    {
        $total = 0;

        foreach($products as $proudct){
            $total += ($proudct['price'] * $products['qty']);
        }

        return (float) $total;
    }

    private function getTenantIdByOrder(string $uuid)
    {
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);

        return $tenant->id;
    }

    private function getTableIdByOrder(string $uuid = '')
    {
        if($uuid) {
            $table = $this->tableRepository->getTableByUuid($uuid);
            return $table->id;
        }

        return '';
    }

    public function getClientIdByOrder()
    {
        return auth()->check() ? auth()->user()->id : '';

    }

    public function getOrderByIdentify(string $identify)
    {
        return $this->orderRepository->getOrderByIdentify($identify);
    }




}
