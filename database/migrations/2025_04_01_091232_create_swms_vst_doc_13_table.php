<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwmsVstDoc13Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swms_vst_doc_13', function (Blueprint $table) {
            $table->char('inst_cd', 10)->nullable();
            $table->char('hm_cr_sup_notifictn_div', 1)->nullable();
            $table->decimal('hm_cr_pt_avg_med_cr_perd', 5)->nullable()->default(0);
            $table->integer('hm_cr_pt_sum_med_cr_pt_num')->nullable()->default(0);
            $table->integer('hm_cr_pt_die_num')->nullable()->default(0);
            $table->integer('hm_cr_pt_die_num_med_coop_oth')->nullable()->default(0);
            $table->integer('hm_cr_pt_die_num_med_coop_oth_hm')->nullable()->default(0);
            $table->integer('hm_cr_pt_die_num_med_coop_oth_hm_oth')->nullable()->default(0);
            $table->integer('hm_cr_pt_die_num_med_coop')->nullable()->default(0);
            $table->integer('hm_cr_pt_die_num_med_coop_link')->nullable()->default(0);
            $table->integer('hm_cr_pt_die_num_med_coop_link_oth')->nullable()->default(0);
            $table->integer('hm_cr_pt_sup_ill_chid_sem_ill_chid_num')->nullable()->default(0);
            $table->integer('implmt_num_avg')->nullable()->default(0);
            $table->integer('implmt_num_hm_vst')->nullable()->default(0);
            $table->integer('implmt_num_hm_vst_emg')->nullable()->default(0);
            $table->integer('implmt_num_med_cr')->nullable()->default(0);
            $table->integer('implmt_num_nrs')->nullable()->default(0);
            $table->integer('med_exam_hm_vst_hm_med_cr_pt_num_all')->nullable()->default(0);
            $table->integer('med_exam_hm_vst_hm_med_cr_pt_num')->nullable()->default(0);
            $table->decimal('med_exam_hm_vst_hm_med_cr_pt_rt', 6, 5)->nullable()->default(0);
            $table->string('intro_insurn_med_coop_1_nm', 100)->nullable();
            $table->string('intro_insurn_med_coop_2_nm', 100)->nullable();
            $table->string('intro_insurn_med_coop_3_nm', 100)->nullable();
            $table->string('intro_insurn_med_coop_4_nm', 100)->nullable();
            $table->string('intro_insurn_med_coop_5_nm', 100)->nullable();
            $table->integer('med_mngt_fee_calc_hm_pt_num')->nullable()->default(0);
            $table->integer('med_mngt_fee_calc_fac_pt_num')->nullable()->default(0);
            $table->integer('med_mngt_fee_calc_hp_3_pt_num')->nullable()->default(0);
            $table->decimal('med_mngt_fee_calc_fac_pt_rt', 5)->nullable()->default(0);
            $table->decimal('med_mngt_fee_calc_hp_3_pt_rt', 6, 3)->nullable()->default(0);
            $table->integer('clic_med_link_sys_doc_nm')->nullable()->default(0);
            $table->integer('clic_med_link_sys_med_coop_nm')->nullable()->default(0);
            $table->integer('clic_med_link_sys_med_confers_nm')->nullable()->default(0);
            $table->string('clic_med_link_sys_rept_prest_med_coop', 200)->nullable();
            $table->string('clic_med_link_sys_rept_prest_med_coop_cd', 100)->nullable();
            $table->string('nt', 300)->nullable();
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
        Schema::dropIfExists('swms_vst_doc_13');
    }
};
