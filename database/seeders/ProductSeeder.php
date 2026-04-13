<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        /**
         * =========================================
         * EXPIRED PRODUCTS (> 18 months)
         * =========================================
         */

        Product::create([
            'name' => 'Televisor LED 50" Smart TV',
            'description' => 'Televisor Smart con resolución 4K UHD y sistema Android TV',
            'brand' => 'Hyundai Electronics',
            'category' => 'Televisores',
            'price' => 1450000,
            'stock' => 7,
            'model' => 'HYLED5001OLO',
            'batch' => '2402',
            'status' => 'available',
            'manufactured_at' => Carbon::now()->subMonths(20),
            'notes' => 'Producto vencido. Revisar para disposición o liquidación.'
        ]);

        Product::create([
            'name' => 'Televisor LED 32" HD',
            'description' => 'TV LED compacto ideal para habitaciones o oficinas pequeñas',
            'brand' => 'Hyundai Electronics',
            'category' => 'Televisores',
            'price' => 780000,
            'stock' => 12,
            'model' => 'HYLED3234D',
            'batch' => '2408',
            'status' => 'reserved',
            'manufactured_at' => Carbon::now()->subMonths(22),
            'notes' => 'Reservado. Producto vencido en evaluación comercial.'
        ]);

        Product::create([
            'name' => 'Lavadora Automática 15Kg',
            'description' => 'Lavadora de carga superior con sistema de lavado inteligente',
            'brand' => 'Hyundai Home',
            'category' => 'Lavadoras',
            'price' => 1650000,
            'stock' => 6,
            'model' => 'HYWASH1500X',
            'batch' => '2311',
            'status' => 'available',
            'manufactured_at' => Carbon::now()->subMonths(19),
            'notes' => 'Producto cercano a vencimiento.'
        ]);

        /**
         * =========================================
         * VALID PRODUCTS (< 18 months)
         * =========================================
         */

        Product::create([
            'name' => 'Televisor LED 43" Smart FHD',
            'description' => 'Televisor Full HD con Smart Apps y conectividad WiFi',
            'brand' => 'Hyundai Electronics',
            'category' => 'Televisores',
            'price' => 1100000,
            'stock' => 15,
            'model' => 'HYLED4309X',
            'batch' => '2505',
            'status' => 'available',
            'manufactured_at' => Carbon::now()->subMonths(6),
            'notes' => 'Producto vigente en excelente estado.'
        ]);

        Product::create([
            'name' => 'Congelador Horizontal 300L',
            'description' => 'Congelador industrial de alta eficiencia energética',
            'brand' => 'Hyundai Home',
            'category' => 'Congeladores',
            'price' => 1750000,
            'stock' => 10,
            'model' => 'HYFREE300L',
            'batch' => '2508',
            'status' => 'reserved',
            'manufactured_at' => Carbon::now()->subMonths(10),
            'notes' => 'Reservado para cliente corporativo.'
        ]);

        Product::create([
            'name' => 'Aire Acondicionado Split 12000 BTU',
            'description' => 'Sistema de aire acondicionado eficiente con modo eco',
            'brand' => 'Hyundai Air',
            'category' => 'Aires Acondicionados',
            'price' => 2100000,
            'stock' => 9,
            'model' => 'HYAC12000BTU',
            'batch' => '2510',
            'status' => 'available',
            'manufactured_at' => Carbon::now()->subMonths(4),
            'notes' => 'Producto vigente en óptimas condiciones.'
        ]);

        Product::create([
            'name' => 'Microondas Digital 25L',
            'description' => 'Microondas con panel digital y múltiples niveles de potencia',
            'brand' => 'Hyundai Kitchen',
            'category' => 'Microondas',
            'price' => 520000,
            'stock' => 20,
            'model' => 'HYMIC25DIG',
            'batch' => '2511',
            'status' => 'available',
            'manufactured_at' => Carbon::now()->subMonths(2),
            'notes' => 'Producto nuevo en inventario.'
        ]);
    }
}