<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('variant_id')
                ->nullable()
                ->constrained('product_variants')
                ->nullOnDelete();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('order_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->unsignedTinyInteger('rating');

            $table->string('title')->nullable();
            $table->text('review')->nullable();

            $table->string('status')->default('pending');

            $table->timestamps();

            $table->index(['product_id', 'status']);
            $table->index(['user_id', 'created_at']);
            $table->index(['rating', 'status']);

            $table->unique(
                ['product_id', 'user_id', 'order_id'],
                'product_review_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_reviews');
    }
};