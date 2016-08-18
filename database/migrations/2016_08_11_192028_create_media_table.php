<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('page_id')->unsigned();
            $table->foreign('page_id')->references('id')->on('pages');
            
            $table->string('filename')->index();
            
            $table->longText('description');

            /* The type of media */
            $table->enum('type', array('image', 'video'));
            
            /* If type is video, then video screenshot is required */    
            $table->string('videopic_filename')->nullable();

            /* Thumbnail */
            $table->string('thumbnail_filename');

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
        Schema::drop('media');
    }
}
