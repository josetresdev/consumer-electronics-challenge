<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function paginate(int $perPage = 10);

    public function find(int $id);

    public function create(array $data);

    public function update(int $id, array $data);

    public function changeStatus(int $id, string $status);

    public function expired(int $perPage = 10);

    public function active(int $perPage = 10);
}