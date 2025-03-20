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
            $table->text('thumb_image');
            $table->integer('vendor_id');
            $table->integer('category_id')->default(0);
            $table->integer('sub_category_id')->default(0);
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
            $table->boolean('is_top')->nullable();
            $table->boolean('is_new')->nullable();
            $table->boolean('is_best')->nullable();
            $table->boolean('is_featured')->nullable();
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
