<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsPublishedColumnToArticleTable extends Migration
{
    public function up()
    {
        Schema::table('Article', function (Blueprint $table) {
            $table->boolean('is_published')->default(false);
        });
    }

    public function down()
    {
        Schema::table('Article', function (Blueprint $table) {
            $table->dropColumn('is_published');
        });
    }
}
