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
            $table->string('name');
            $table->string('slug');
            $table->string('thumb_image')->nullable();
            $table->foreignId('shop_id')->constrained()->onDelete('cascade');
            $table->integer('category_id');
            $table->integer('sub_category_id')->nullable();
            $table->integer('child_category_id')->nullable();
            $table->integer('brand_id');
            $table->integer('quantity');
            $table->string('short_description');
            $table->text('long_description');
            $table->text('video_link')->nullable();
            $table->string('sku')->nullable();
            $table->double('price');
            $table->double('sale_price')->nullable();
            $table->date('sale_start')->nullable();
            $table->date('sale_end')->nullable();
            $table->boolean('is_top')->nullable()->default(0);
            $table->boolean('is_new')->nullable()->default(0);
            $table->boolean('is_best')->nullable()->default(0);
            $table->boolean('is_featured')->nullable()->default(0);
            $table->integer('is_approved')->default(0);
            $table->boolean('status');
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
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
