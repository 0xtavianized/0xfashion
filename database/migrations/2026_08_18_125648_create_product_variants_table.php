<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('sku')->unique();

            $table->decimal('price', 15, 2);
            $table->decimal('cost_price', 15, 2)->nullable();

            $table->unsignedInteger('stock')->default(0);

            $table->decimal('weight', 10, 2)
                ->nullable()
                ->comment('Weight in grams');

            $table->string('image')->nullable();

            $table->boolean('status')->default(true);

            $table->timestamps();

            $table->index(['product_id', 'status']);
            $table->index(['status', 'stock']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
