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

            $table->foreignId('category_id')
                ->constrained()
                ->restrictOnDelete();

            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku')->unique();

            $table->text('description')->nullable();
            $table->text('short_description')->nullable();

            $table->decimal('base_price', 15, 2);
            $table->decimal('cost_price', 15, 2)->nullable();

            $table->decimal('weight', 10, 2)
                ->default(0)
                ->comment('Weight in grams');

            $table->boolean('status')->default(true);

            $table->timestamps();

            $table->index(['category_id', 'status']);
            $table->index(['status', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
