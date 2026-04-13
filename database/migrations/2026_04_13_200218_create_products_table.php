<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // basic
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('brand');
            $table->string('category');

            // business
            $table->decimal('price', 10, 2);
            $table->integer('stock')->default(0);

            // keys
            $table->string('model');
            $table->string('batch');

            $table->date('manufactured_at');

            // estado de negocio
            $table->enum('status', [
                'available',   // usable
                'reserved',    // venta
                'disposed'     // descartado
            ])->default('available');

            // observaciones
            $table->text('notes')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['model', 'batch']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};