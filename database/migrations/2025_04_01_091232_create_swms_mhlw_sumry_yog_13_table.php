<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwmsMhlwSumryYog13Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swms_mhlw_sumry_yog_13', function (Blueprint $table) {
            $table->char('offc_no', 10);
            $table->char('svc_type', 3);
            $table->char('entry_date', 15)->nullable();
            $table->char('entry_date_jp_year', 4)->nullable();
            $table->string('admn_plcy', 4000)->nullable();
            $table->integer('emp_ttl_num')->nullable()->default(0);
            $table->string('emp_exprncd_title', 30)->nullable();
            $table->decimal('emp_exprncd_rt', 3, 0)->nullable();
            $table->char('dmg_cpstn_ins_join', 2)->nullable();
            $table->string('prvd_svc', 600)->nullable();
            $table->char('noList_flg', 1)->nullable();
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
        Schema::dropIfExists('swms_mhlw_sumry_yog_13');
    }
};
