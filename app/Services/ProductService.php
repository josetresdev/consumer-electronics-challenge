<?php

namespace App\Services;

use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Exception;

class ProductService
{
    public function __construct(
        protected ProductRepositoryInterface $repository
    ) {}

    public function paginate(int $perPage = 10)
    {
        return $this->repository->paginate($perPage);
    }

    /**
     * Create new product
     */
    public function create(array $data)
    {
        $product = $this->repository->create($data);

        Log::info('Product created', [
            'id' => $product->id
        ]);

        return $product;
    }

    /**
     * Update product data
     */
    public function update(int $id, array $data)
    {
        $product = $this->repository->update($id, $data);

        Log::info('Product updated', [
            'id' => $product->id
        ]);

        return $product;
    }

    /**
     * Change product status with optional notes (audit + traceability)
     */
    public function changeStatus(int $id, string $status, ?string $notes = null)
    {
        $allowedStatuses = ['available', 'reserved', 'disposed'];

        if (!in_array($status, $allowedStatuses)) {
            throw new Exception('Invalid status');
        }

        $product = $this->repository->find($id);

        if (!$product) {
            throw new Exception('Product not found');
        }

        $data = [
            'status' => $status,
        ];

        // Append notes if provided
        if ($notes !== null) {
            $data['notes'] = $notes;
        }

        $updated = $this->repository->update($id, $data);

        Log::info('Product status changed', [
            'id' => $updated->id,
            'status' => $status,
            'notes' => $notes,
        ]);

        return $updated;
    }

    /**
     * Get expired products (older than 18 months)
     */
    public function getExpired(int $perPage = 10)
    {
        return $this->repository->expired($perPage);
    }

    /**
     * Get active (valid) products within 18 months
     */
    public function getActive(int $perPage = 10)
    {
        return $this->repository->active($perPage);
    }

    /**
     * Business rule: check if product batch is expired
     */
    public function isExpired($product): bool
    {
        if (!$product->created_at) {
            return false;
        }

        return Carbon::parse($product->created_at)
            ->addMonths(18)
            ->lt(now());
    }
}