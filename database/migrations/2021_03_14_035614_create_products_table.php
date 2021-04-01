<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('feature_pro')->nullable()->default('0')->comment('1 Yes and 0 No');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('model')->nullable();
            $table->decimal('buying_price', 8, 2);
            $table->decimal('selling_price', 8, 2);
            $table->decimal('special_price', 8, 2)->nullable();
            $table->enum('special_price_yes_or_no', ['yes', 'no'])->nullable()->default('no');
            $table->date('special_price_form')->nullable();
            $table->date('special_price_to')->nullable();
            $table->integer('quantity');
            $table->integer('sku_code');
            $table->text('color')->nullable();
            $table->string('size')->nullable();
            $table->longText('description')->nullable();
            $table->tinyInteger('warranty')->default('1')->comment('1 Yes and 0 no');
            $table->string('warranty_duration')->nullable();
            $table->longText('warranty_condition')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('image')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->unsignedBigInteger('create_by');
            $table->foreign('create_by')->on('users')->references('id')->cascadeOnDelete();
            $table->foreign('category_id')->on('categories')->references('id')->cascadeOnDelete();
            $table->foreign('brand_id')->on('brands')->references('id')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
