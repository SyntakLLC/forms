<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->integer('user_id');
            $table->integer('site_id');
            $table->integer('bed');
            $table->integer('bath');
            $table->integer('square_feet');
            $table->string('cost')->nullable();
            $table->string('street_address');
            $table->string('town_and_state');
            $table->text('description');
            $table->string('photo_url');
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
        Schema::dropIfExists('properties');
    }
}
