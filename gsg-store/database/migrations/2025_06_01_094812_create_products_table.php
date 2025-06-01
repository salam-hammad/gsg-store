<?php

use App\Models\Product;
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
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('category_id')->constrained('categories')->restrictOnDelete();
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            // $table->unsignedFloat('price')->default(0);  // unsignedFloat => For positive values only
            $table->float('price')->default(0);
            $table->float('sale_price')->default(0);
            $table->unsignedSmallInteger('quantity')->default(0);
            $table->string('sku')->unique()->nullable();
            $table->float('weight')->nullable();
            $table->float('width')->nullable();
            $table->float('height')->nullable();
            $table->float('length')->nullable();
            $table->enum('status', [Product::STATUS_ACTIVE, Product::STATUS_DRAFT]);
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
