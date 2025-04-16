<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostUsefulTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_useful', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('category_id');
            $table->longText('content')->nullable();
            $table->longText('summary')->nullable();
            $table->string('url')->nullable();
            $table->integer('status');
            $table->dateTime('sort');
            $table->string('slug');
            $table->string('avatar')->nullable();
            $table->string('icon')->nullable();
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
        Schema::dropIfExists('post_useful');
    }
}
