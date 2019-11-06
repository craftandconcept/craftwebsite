<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->bigInteger('creator_id')->nullable();
            $table->string('collaborators')->nullable();
            $table->string('function')->nullable();
            $table->string('size')->nullable();
            $table->string('status')->nullable();
            $table->string('photos_by')->nullable();
            $table->bigInteger('country_id')->nullable();
            $table->string('main_image')->nullable();
            $table->longText('main_text')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
