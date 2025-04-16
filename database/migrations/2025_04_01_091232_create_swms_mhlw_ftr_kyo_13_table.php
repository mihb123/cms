<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwmsMhlwFtrKyo13Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swms_mhlw_ftr_kyo_13', function (Blueprint $table) {
            $table->char('offc_no', 10);
            $table->char('svc_type', 3);
            $table->char('accpt_num', 3)->nullable();
            $table->char('max_accpt_num', 4)->nullable();
            $table->string('svc_cont_fre_desc', 1500)->nullable();
            $table->string('svc_qua_imp_effr', 1500)->nullable();
            $table->string('wage_imp_othr_cont', 1500)->nullable();
            $table->string('side_svc', 1500)->nullable();
            $table->string('not_insurn_use_prc_fre_desc', 1500)->nullable();
            $table->integer('emply_ml_num')->nullable()->default(0);
            $table->integer('emply_ml_rt')->nullable()->default(0);
            $table->integer('emply_fml_num')->nullable()->default(0);
            $table->integer('emply_fml_rt')->nullable()->default(0);
            $table->string('emp_ftr_fre_desc', 1500)->nullable();
            $table->string('user_ftr_cmnt', 1500)->nullable();
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
        Schema::dropIfExists('swms_mhlw_ftr_kyo_13');
    }
};
