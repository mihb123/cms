<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('title_english')->nullable();
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->longText('content')->nullable();
            $table->integer('status')->nullable();
            $table->dateTime('sort')->nullable();
            $table->string('slug')->nullable();
            $table->string('avatar')->nullable();
            // $table->integer('group_id');
            $table->string('article_type')->nullable();
            $table->unsignedBigInteger('post_type_id')->nullable();
            $table->integer('type')->nullable();
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
        Schema::dropIfExists('post');
    }
}
