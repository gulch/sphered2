<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeColumnToImageTable extends Migration
{
    public function up()
    {
        Schema::table('Image', function (Blueprint $table) {
            $table->enum('type', ['post'])->default('post');
        });
    }

    public function down()
    {
        Schema::table('Image', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
