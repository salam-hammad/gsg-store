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
        Schema::create('categories', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // id bigint unisged auto_increment primary
            // $table->bigInteger('id')->unsigned()->autoIncrement()->primary(); // ===> $table->id();
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            // $table->foreign('parent_id')->references('id')->on('categories')->cascadeOnDelete();
            // $table->unsignedBigInteger('parent_id');
            $table->foreignId('parent_id')->nullable()->constrained('categories', 'id')->nullOnDelete();
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->enum('status', ['active', 'draft']);
            // creates_at and updated_at (timestamps vs. datetime)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
