<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublickOfficeInfo13Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publick_office_info_13', function (Blueprint $table) {
            $table->char('jiscode', 5)->primary();
            $table->string('name', 20)->nullable();
            $table->string('namekana', 20)->nullable();
            $table->string('building', 20)->nullable();
            $table->char('zipcode', 8)->nullable();
            $table->string('address', 50)->nullable();
            $table->char('tel', 15)->nullable();
            $table->string('source', 20)->nullable();
            $table->decimal('lat', 18, 15)->nullable();
            $table->decimal('lng', 18, 15)->nullable();
            $table->dateTime('timestamp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publick_office_info_13');
    }
};
