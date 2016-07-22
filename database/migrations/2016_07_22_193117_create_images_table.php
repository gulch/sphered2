<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    public function up()
    {
        Schema::create('Image', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alt');
            $table->string('path');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('Image');
    }
}
