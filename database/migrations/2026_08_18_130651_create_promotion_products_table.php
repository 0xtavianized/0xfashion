<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('promotion_products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('promotion_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('variant_id')
                ->nullable()
                ->constrained('product_variants')
                ->cascadeOnDelete();

            $table->string('discount_type');
            $table->decimal('discount_value', 15, 2);

            $table->timestamps();

            $table->index(['promotion_id', 'product_id']);
            $table->index(['product_id', 'variant_id']);

            $table->unique(
                ['promotion_id', 'product_id', 'variant_id'],
                'promotion_product_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('promotion_products');
    }
};