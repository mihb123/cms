<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwmsMhlwMngUserRghtPrtctYog13Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swms_mhlw_mng_user_rght_prtct_yog_13', function (Blueprint $table) {
            $table->char('offc_no', 10);
            $table->char('svc_type', 3);
            $table->char('imp_subj_appli_sig', 2)->nullable();
            $table->string('imp_subj_appli_sig_othr', 100)->nullable();
            $table->char('agt_cont', 2)->nullable();
            $table->string('agt_cont_othr', 100)->nullable();
            $table->char('hope_hlth_rec', 2)->nullable();
            $table->string('hope_hlth_rec_othr', 100)->nullable();
            $table->char('assess_listn_desc', 2)->nullable();
            $table->string('assess_listn_desc_othr', 100)->nullable();
            $table->char('assess_itvw', 2)->nullable();
            $table->string('assess_itvw_othr', 100)->nullable();
            $table->char('assess_hope', 2)->nullable();
            $table->string('assess_hope_othr', 100)->nullable();
            $table->char('hm_pk_pos_cary_in_rout', 2)->nullable();
            $table->string('hm_pk_pos_cary_in_rout_othr', 100)->nullable();
            $table->char('wlfr_eqp_bfr_slc_itvw', 2)->nullable();
            $table->string('wlfr_eqp_bfr_slc_itvw_othr', 100)->nullable();
            $table->char('phys_nrs_cdtn_liv_env_rec', 2)->nullable();
            $table->string('phys_nrs_cdtn_liv_env_rec_othr', 100)->nullable();
            $table->char('svc_plan', 2)->nullable();
            $table->string('svc_plan_othr', 100)->nullable();
            $table->char('svc_plan_exam_rec', 2)->nullable();
            $table->string('svc_plan_exam_rec_othr', 100)->nullable();
            $table->char('svc_plan_goal_desc', 2)->nullable();
            $table->string('svc_plan_goal_desc_othr', 100)->nullable();
            $table->char('svc_pln_agrmt_doc_sig', 2)->nullable();
            $table->string('svc_pln_agrmt_doc_sig_othr', 100)->nullable();
            $table->char('wlfr_eqp_consul_rec_evy_6_mo', 2)->nullable();
            $table->string('wlfr_eqp_consul_rec_evy_6_mo_othr', 100)->nullable();
            $table->char('wlfr_eqp_slc_resn_rec', 2)->nullable();
            $table->string('wlfr_eqp_slc_resn_rec_othr', 100)->nullable();
            $table->char('svc_prov_cont_desc_spcfctn', 2)->nullable();
            $table->string('svc_prov_cont_desc_spcfctn_othr', 100)->nullable();
            $table->char('dist_prc_lst', 2)->nullable();
            $table->string('dist_prc_lst_othr', 100)->nullable();
            $table->char('nrs_cr_ins_expln_doc', 2)->nullable();
            $table->string('nrs_cr_ins_expln_doc_pthr', 100)->nullable();
            $table->char('nrs_cr_svc_ancmnt_expln_doc', 2)->nullable();
            $table->string('nrs_cr_svc_ancmnt_expln_doc_othr', 100)->nullable();
            $table->char('infmtn_mtrl_ovr2type', 2)->nullable();
            $table->string('infmtn_mtrl_ovr2type_othr', 100)->nullable();
            $table->char('svc_pln_expt_nrs_cr_ins', 2)->nullable();
            $table->string('svc_pln_expt_nrs_cr_ins_othr', 100)->nullable();
            $table->char('svc_pln_dlvry_rec', 2)->nullable();
            $table->string('svc_pln_dlvry_rec_othr', 100)->nullable();
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
        Schema::dropIfExists('swms_mhlw_mng_user_rght_prtct_yog_13');
    }
};
