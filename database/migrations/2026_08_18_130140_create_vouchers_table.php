<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();

            $table->string('code')->unique();
            $table->string('name');

            $table->string('type');

            $table->decimal('value', 15, 2);
            $table->decimal('minimum_purchase', 15, 2)->default(0);
            $table->decimal('maximum_discount', 15, 2)->nullable();

            $table->unsignedInteger('quota')->nullable();
            $table->unsignedInteger('used_count')->default(0);

            $table->datetime('starts_at');
            $table->datetime('expires_at');

            $table->boolean('status')->default(true);

            $table->timestamps();

            $table->index(['status', 'starts_at', 'expires_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};