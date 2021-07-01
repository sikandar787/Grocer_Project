<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->bigInteger('phone_number');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('map_address');
            $table->double('latitude');
            $table->double('longitude');
            $table->integer('city_id');
            $table->integer('area_id');
            $table->string('complete_address');
            $table->string('api_token');
            $table->enum('kick_out_from_promotion',['0','1',""])->comment('0 for Ban && 1 for Active')->default(0);
            $table->enum('status',['0','1'])->comment('0 for Inactive && 1 for Active')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
