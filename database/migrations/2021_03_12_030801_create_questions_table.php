<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->integer('form_id');
            $table->string('type');
            $table->string('title');
            $table->string('tagline')->nullable();
            $table->string('subtitle')->nullable();
            $table->Text('description')->nullable();
            $table->Text('content')->nullable();
            $table->boolean('multiple')->nullable();
            $table->integer('index');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
