<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwmsMhlwMngResConsulComplaKyo13Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swms_mhlw_mng_res_consul_compla_kyo_13', function (Blueprint $table) {
            $table->char('offc_no', 10);
            $table->char('svc_type', 3);
            $table->char('consul_compla_imp_doc_spec', 2)->nullable();
            $table->string('consul_compla_imp_doc_spec_othr', 100)->nullable();
            $table->char('consul_compl_mnal', 2)->nullable();
            $table->string('consul_compl_mnal_othr', 100)->nullable();
            $table->char('consul_compl_rec', 2)->nullable();
            $table->string('consul_compl_rec_othr', 100)->nullable();
            $table->char('consul_compl_resl_desc_rec', 2)->nullable();
            $table->string('consul_compl_resl_desc_rec_othr', 100)->nullable();
            $table->char('nrs_cont_vst_dt_rec', 2)->nullable();
            $table->string('nrs_cont_vst_dt_rec_othr', 100)->nullable();
            $table->char('rhbl_cont_vst_dt_rec', 2)->nullable();
            $table->string('rhbl_cont_vst_dt_rec_othr', 100)->nullable();
            $table->char('svc_cont_vst_dt_rec', 2)->nullable();
            $table->string('svc_cont_vst_dt_rec_othr', 100)->nullable();
            $table->char('reg_vst_assesmt_rec', 2)->nullable();
            $table->string('reg_vst_assesmt_rec_othr', 100)->nullable();
            $table->char('evy_6_mos_once_vst_req_mtl_rec', 2)->nullable();
            $table->string('evy_6_mos_once_vst_req_mtl_rec_othr', 100)->nullable();
            $table->char('svc_plan_eval_rec', 2)->nullable();
            $table->string('svc_plan_eval_rec_othr', 100)->nullable();
            $table->char('svc_plan_chg_cont_dt_rec', 2)->nullable();
            $table->string('svc_plan_chg_cont_dt_rec_othr', 100)->nullable();
            $table->char('svc_plan_chg_mtg_evy_3_mo_rec', 2)->nullable();
            $table->string('svc_plan_chg_mtg_evy_3_mo_rec_othr', 100)->nullable();
            $table->char('svc_plan_chg_mtg_evy_6_mo_rec', 2)->nullable();
            $table->string('svc_plan_chg_mtg_evy_6_mo_rec_othr', 100)->nullable();
            $table->char('svc_plan_chg_mnger_sugst_rec', 2)->nullable();
            $table->string('svc_plan_chg_mnger_sugst_rec_othr', 100)->nullable();
            $table->char('wlfr_eqp_in_10d_use_cdtn_cfm_rec', 2)->nullable();
            $table->string('wlfr_eqp_in_10d_use_cdtn_cfm_rec_othr', 100)->nullable();
            $table->char('wlfr_eqp_use_cdtn_confm_adj_rec', 2)->nullable();
            $table->string('wlfr_eqp_use_cdtn_confm_adj_rec_othr', 100)->nullable();
            $table->char('cr_expt_wlfr_eqp_use_cdtn_cfm_rec', 2)->nullable();
            $table->string('cr_expt_wlfr_eqp_use_cdtn_cfm_rec_othr', 100)->nullable();
            $table->char('cr_expt_ovr_1tm_pr_1mnth_rec', 2)->nullable();
            $table->string('cr_expt_ovr_1tm_pr_2mnth_rec_othr', 100)->nullable();
            $table->char('rvw_svc_plan_agrmt_doc_sig', 2)->nullable();
            $table->string('rvw_svc_plan_agrmt_doc_sig_othr', 100)->nullable();
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
        Schema::dropIfExists('swms_mhlw_mng_res_consul_compla_kyo_13');
    }
};
