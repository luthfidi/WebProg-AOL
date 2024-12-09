<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'product_name');
            $table->longText(column: 'description');
            $table->string(column: 'sku')->unique();
            $table->foreignId(column: 'librarian_id')->constrained(table: 'users')->onDelete(action: 'cascade');
            $table->foreignId(column: 'category_id')->constrained(table: 'categories')->onDelete(action: 'cascade');
            $table->foreignId(column: 'subcategory_id')->constrained(table: 'subcategories')->onDelete (action: 'cascade');
            $table->foreignId(column: 'store_id')->constrained (table: 'stores')->onDelete(action: 'cascade');
            $table->integer(column: 'regular_price');
            $table->integer(column: 'discounted_price')->nullable();
            $table->decimal(column: 'tax_rate', total: 5,places: 2)->default(value: 0.00);
            $table->integer(column: 'stock_quantity')->default(value: 0);
            $table->enum (column: 'stock_status', allowed: ['In Stock', 'Out of Stock'])->default (value: 'In Stock');
            $table->string(column: 'slug')->unique();
            $table->boolean(column: 'visibility')->default (value: false);
            $table->string(column: 'meta_title')->nullable();
            $table->text(column: 'meta_description')->nullable();
            $table->enum(column: 'status', allowed: ['Draft', 'Published']);
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
