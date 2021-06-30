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
            $table->string('ur_name');
            $table->text('description');
            $table->text('ur_description');
            $table->bigInteger('category_id');
            $table->bigInteger('price');
            $table->bigInteger('discount_price');
            $table->bigInteger('max_limit');
            $table->bigInteger('weight');
            $table->bigInteger('unit_id');
            $table->enum('status', ['0', '1', ''])->default('1')->comment('1 for active & 0 for inactive');
            $table->bigInteger('total_sold');
            $table->enum('is_featured', ['0', '1', ''])->default('0')->comment('1 for featured & 0 for not featured');
            $table->bigInteger('shop_id');
            $table->string('image');
            $table->softDeletes();
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
