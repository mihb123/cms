<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceCalculateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_calculate', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_description');
            $table->longText('description');
//            $table->integer('money');
            $table->integer('status');
//            $table->integer('fixed_price')->nullable();
            $table->unsignedBigInteger('group_id')->default(0);
            $table->dateTime('sort');
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
        Schema::dropIfExists('service_calculate');
    }
}
