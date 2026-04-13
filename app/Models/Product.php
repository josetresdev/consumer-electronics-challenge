<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

#[Fillable([
    'name',
    'description',
    'brand',
    'category',
    'price',
    'stock',
    'model',
    'batch',
    'manufactured_at',
    'status',
    'notes',
])]
class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'brand',
        'category',
        'price',
        'stock',
        'model',
        'batch',
        'manufactured_at',
        'status',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'float',
            'stock' => 'integer',
            'manufactured_at' => 'date',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    // 🔥 vencido (18 meses)
    public function isExpired(): bool
    {
        return $this->manufactured_at
            ->copy()
            ->addMonths(18)
            ->isPast();
    }

    // scopes
    public function scopeExpired($query)
    {
        return $query->whereRaw(
            'DATE_ADD(manufactured_at, INTERVAL 18 MONTH) < NOW()'
        );
    }

    public function scopeValid($query)
    {
        return $query->whereRaw(
            'DATE_ADD(manufactured_at, INTERVAL 18 MONTH) >= NOW()'
        );
    }
}