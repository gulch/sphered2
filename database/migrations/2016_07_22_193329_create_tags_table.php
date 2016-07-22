<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    public function up()
    {
        Schema::create('Tag', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('title');
            $table->text('content');
            $table->string('seo_title');
            $table->string('seo_description');
            $table->string('seo_keywords');
            $table->timestamps();
            $table->unique('slug');
        });
    }

    public function down()
    {
        Schema::drop('Tag');
    }
}
