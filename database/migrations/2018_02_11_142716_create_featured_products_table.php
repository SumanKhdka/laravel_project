<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tbl_featured_products');
        Schema::create('tbl_featured_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->timestamp('featured_date')->useCurrent();
            $table->integer('special_price');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_featured_products');
    }
}
