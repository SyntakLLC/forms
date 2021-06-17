<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('message')->default('I’d love to hear from you! Send me a message using these forms, or email me.');
            $table->integer('layout')->default(1);
            $table->string('cover_photo_url')->nullable();
            $table->string('slug')->nullable();
            $table->integer('pattern')->default(1);
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
        Schema::dropIfExists('sites');
    }
}
