<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyMemberNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_member_news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('family_member_id');
            $table->unsignedBigInteger('tag_id');
            $table->string('patient_relationship_en');
            $table->integer('patient_birthday');
            $table->integer('disease_month_start');
            $table->integer('disease_year_start');
            $table->integer('disease_day_start');
            $table->string('treatment_place');
            $table->longText('content')->nullable();
            $table->string('avatar');
            $table->integer('type');
            $table->integer('status');
            $table->dateTime('sort');
            $table->string('title');
            $table->unsignedBigInteger('family_member_category_id')->nullable();
            $table->string('patient_relationship');
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
        Schema::dropIfExists('family_member_news');
    }
}
