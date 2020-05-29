<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Facades\DB;

class OrderRepository implements OrderRepositoryInterface
{
    protected $entity;

    public function __construct(Order $order)
    {
        $this->entity = $order;
    }

    public function createNewOrder(
        string $identify,
        float $total,
        string $status,
        int $tenantId,
        string $comment = '',
        $clienteId = '',
        $tableId = '')
    {

      $data = [
            'identify'  => $identify,
            'total'     => $total,
            'status'    => $status,
            'tenant_id' => $tenantId,
            'comment'   => $comment

      ];

      if($clienteId) $data['client_id'] = $clienteId;
      if($tableId)   $data['table_id']  = $tableId;

      $order = $this->entity->create($data);
    }

    public function getOrderByIdentify(string $identify)
    {
        return $this->entity->where('identify', $identify)->first();
    }

    public function registerProductsOrder(int $orderId, array $products)
    {
        $order = $this->entity->find($orderId);
        $orderProducts = [];

        foreach ($products as $product){
            $orderProducts[$product['id']] = [
                'qty' => $product['qty'],
                'price' => $product['price'],
            ];
        }

        $order->products()->attach($orderProducts);





        // foreach($products as $product){
        //     array_push($orderProducts, [
        //         'order_id'      => $orderId,
        //         'product_id'    => $product['id'],
        //         'qty'           => $product['qty'],
        //         'price'         => $product['price']
        //     ]);
        // }

        // DB::table('order_product')->insert($orderProducts);


    }
}
