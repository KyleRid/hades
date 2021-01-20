<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreatePostsTable extends Migration
{

    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('post_id');
            $table->bigInteger('post_author');
            $table->dateTime('post_date');
            $table->dateTime('post_date_gmt');
            $table->longText('post_content');
            $table->text('post_title');
            $table->text('post_excerpt');
            $table->string('post_status', 20)->default('publish');
            $table->string('comment_status', 20)->default('open');
            $table->dateTime('post_modified');
            $table->dateTime('post_modified_gmt');
            // $table->string('post_name', 200)->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
