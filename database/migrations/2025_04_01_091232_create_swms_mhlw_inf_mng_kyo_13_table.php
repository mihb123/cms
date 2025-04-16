<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwmsMhlwInfMngKyo13Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swms_mhlw_inf_mng_kyo_13', function (Blueprint $table) {
            $table->char('offc_no', 10);
            $table->char('svc_type', 3);
            $table->string('offc_name', 50)->nullable();
            $table->char('offc_pstcd', 8)->nullable();
            $table->string('offc_locat', 100)->nullable();
            $table->char('vrabl_date', 10)->nullable();
            $table->char('status', 1)->nullable();
            $table->char('show_flg', 1)->nullable();
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
        Schema::dropIfExists('swms_mhlw_inf_mng_kyo_13');
    }
};
