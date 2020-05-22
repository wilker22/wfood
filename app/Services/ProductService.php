<?php

namespace App\Services;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class ProductService
{
    protected $productService, $tenantRepository;

    public function __construct(
        ProductRepositoryInterface $productService,
        TenantRepositoryInterface $tenantRepository
    )
    {
        $this->productService = $productService;
        $this->tenantService = $tenantRepository;
    }

    public function getProductsByTenantUuid(string $uuid)
    {
        $tenant = $this->tenantRepository->getProductsByTenantUuid($uuid);
        return $this->productService->getProductsByTenantId($tenant->id);
    }
}
