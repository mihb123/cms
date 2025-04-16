<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('avatar')->nullable();
            $table->string('avatar_sp')->nullable();
            $table->string('icon')->nullable();
            $table->dateTime('sort')->nullable();
            $table->integer('status')->nullable();
            $table->string('type')->nullable();
            $table->string('display')->nullable();
            $table->string('description')->nullable();
            $table->string('url')->nullable();
            $table->integer('destination_guide_id')->nullable();
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
        Schema::dropIfExists('category');
    }
}
