<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTagPivot extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('post_tag_pivot', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned()->index();
            $table->integer('tag_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('post_tag_pivot');
    }
}
