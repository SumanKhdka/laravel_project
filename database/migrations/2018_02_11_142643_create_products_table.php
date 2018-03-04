<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::dropIfExists('tbl_product_images');
        Schema::dropIfExists('tbl_products');
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('category_id');
            $table->string('image');
            $table->string('meta_description');
            $table->string('meta_keywords');
            $table->integer('display_order');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->boolean('status');
        });

        Schema::create('tbl_product_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->integer('product_id');
            $table->integer('display_order');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_products');
    }
}
