<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    public function up()
    {
        Schema::create('Article', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('title');
            $table->text('content');
            $table->integer('id__Image', false, true);
            $table->string('seo_title');
            $table->string('seo_description');
            $table->string('seo_keywords');
            $table->timestamps();
            $table->unique('slug');
            $table->index('id__Image');
        });
    }

    public function down()
    {
        Schema::drop('Article');
    }
}
