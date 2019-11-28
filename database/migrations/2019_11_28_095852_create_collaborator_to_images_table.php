<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollaboratorToImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collaborator_to_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('collaborator_id')->unsigned();
            $table->bigInteger('image_id')->unsigned();
            $table->timestamps();

            $table->foreign('collaborator_id')->references('id')
                ->on('collaborators')
                ->onDelete('cascade')
                ->onUpdate('cascade');


            $table->foreign('image_id')->references('id')
                ->on('images')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collaborator_to_images');
    }
}
