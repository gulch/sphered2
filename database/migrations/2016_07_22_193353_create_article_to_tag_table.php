<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleToTagTable extends Migration
{
    public function up()
    {
        Schema::create('Article_Tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id__Article', false, true);
            $table->integer('id__Tag', false, true);
            $table->index('id__Article');
            $table->index('id__Tag');
        });
    }

    public function down()
    {
        Schema::drop('Article_Tag');
    }
}
