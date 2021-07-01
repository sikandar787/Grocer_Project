<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ur_name');
            $table->text('description');
            $table->text('ur_description');
            $table->bigInteger('number');
            $table->string('email');
            $table->string('image');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('address');
            $table->integer('coverage_km');
            $table->integer('city_id');
            $table->integer('area_id');
            $table->enum('status', ['0', '1', ''])->default('1')->comment('1 for active & 0 for inactive');
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
        Schema::dropIfExists('shops');
    }
}
