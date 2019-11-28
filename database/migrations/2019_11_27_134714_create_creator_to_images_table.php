<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreatorToImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creator_to_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('creator_id')->unsigned();
            $table->bigInteger('image_id')->unsigned();
            $table->timestamps();

            $table->foreign('creator_id')->references('id')
                ->on('creators')
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
        Schema::dropIfExists('creator_to_images');
    }
}
