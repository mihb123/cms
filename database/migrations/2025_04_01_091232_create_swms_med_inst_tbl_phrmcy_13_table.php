<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwmsMedInstTblPhrmcy13Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swms_med_inst_tbl_phrmcy_13', function (Blueprint $table) {
            $table->char('inst_cd', 10)->nullable();
            $table->string('inst_nm', 100)->nullable();
            $table->char('pstcd', 8)->nullable();
            $table->string('addrs', 100)->nullable();
            $table->char('area_blng', 15)->nullable();
            $table->decimal('locat_latitd', 18, 15)->nullable();
            $table->decimal('locat_longtd', 18, 15)->nullable();
            $table->char('tel', 15)->nullable();
            $table->char('fax', 15)->nullable();
            $table->string('accpt_ntf_nm', 100)->nullable();
            $table->char('accpt_cd', 10)->nullable();
            $table->char('accpt_no', 10)->nullable();
            $table->char('calc_strt_dt', 25)->nullable();
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
        Schema::dropIfExists('swms_med_inst_tbl_phrmcy_13');
    }
};
