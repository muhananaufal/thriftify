<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('picture');
            $table->string('name');
            $table->decimal('price');
            $table->string('description');
            $table->string('color');
            $table->string('gender');
            $table->string('size');
            $table->string('quantity')->default(1);
            $table->string('condition');
            $table->enum('status', ['draft', 'sale', 'waiting_for_payment', 'need_confirmation', 'on_delivery', 'success']);
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
