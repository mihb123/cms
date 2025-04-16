<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwmsMedInstLstMdcl13Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swms_med_inst_lst_mdcl_13', function (Blueprint $table) {
            $table->char('inst_cd', 10)->nullable();
            $table->char('inst_type', 10)->nullable();
            $table->string('inst_nm', 100)->nullable();
            $table->char('pstcd', 8)->nullable();
            $table->string('addrs', 100)->nullable();
            $table->char('area_blng', 15)->nullable();
            $table->decimal('locat_latitd', 18, 15)->nullable()->default(0);
            $table->decimal('locat_longtd', 18, 15)->nullable()->default(0);
            $table->char('tel', 15)->nullable();
            $table->string('fndr_name', 50)->nullable();
            $table->string('mgr_name', 50)->nullable();
            $table->string('spec_dt', 15)->nullable();
            $table->integer('fulltm_cnt_all')->nullable()->default(0);
            $table->integer('fulltm_cnt_doc')->nullable()->default(0);
            $table->integer('fulltm_cnt_dnt')->nullable()->default(0);
            $table->integer('fulltm_cnt_mdc')->nullable()->default(0);
            $table->integer('not_fulltm_cnt_all')->nullable()->default(0);
            $table->integer('not_fulltm_cnt_doc')->nullable()->default(0);
            $table->integer('not_fulltm_cnt_dnt')->nullable()->default(0);
            $table->integer('not_fulltm_cnt_mdc')->nullable()->default(0);
            $table->string('hsptl_dptmnt', 250)->nullable();
            $table->char('status', 6)->nullable();
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
        Schema::dropIfExists('swms_med_inst_lst_mdcl_13');
    }
};
