<?php

namespace App\Repositories;

use App\Models\Product;
use App\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * Paginated products (latest first)
     */
    public function paginate(int $perPage = 10)
    {
        return Product::orderBy('id', 'desc')
            ->paginate($perPage);
    }

    /**
     * Find product or fail
     */
    public function find(int $id)
    {
        return Product::findOrFail($id);
    }

    /**
     * Create new product
     */
    public function create(array $data)
    {
        return Product::create($data);
    }

    /**
     * Update product
     */
    public function update(int $id, array $data)
    {
        $product = $this->find($id);

        $product->update($data);

        return $product;
    }

    /**
     * Change product status
     * (kept simple, Service handles business rules)
     */
    public function changeStatus(int $id, string $status)
    {
        $product = $this->find($id);

        $product->status = $status;
        $product->save();

        return $product;
    }

    /**
     * Get expired products (older than 18 months)
     */
    public function expired(int $perPage = 10)
    {
        return Product::where('created_at', '<', now()->subMonths(18))
            ->orderBy('created_at', 'asc')
            ->paginate($perPage);
    }

    /**
     * Get active products (within 18 months)
     */
    public function active(int $perPage = 10)
    {
        return Product::where('created_at', '>=', now()->subMonths(18))
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }
}