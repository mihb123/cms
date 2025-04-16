<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwmsMhlwMngOutOrgCoop13Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swms_mhlw_mng_out_org_coop_13', function (Blueprint $table) {
            $table->char('offc_no', 10);
            $table->char('svc_type', 3);
            $table->char('svc_plan_sup_spec_rept_rec', 2)->nullable();
            $table->string('svc_plan_sup_spec_rept_rec_othr', 100)->nullable();
            $table->char('svc_rep_mtg_atnd_rec', 2)->nullable();
            $table->string('svc_rep_mtg_atnd_rec_othr', 100)->nullable();
            $table->char('svc_plan_grasp', 2)->nullable();
            $table->string('svc_plan_grasp_othr', 100)->nullable();
            $table->char('svc_stts_grasp', 2)->nullable();
            $table->string('svc_stts_grasp_othr', 100)->nullable();
            $table->char('usr_infrm_offc_clbrtn', 2)->nullable();
            $table->string('usr_infrm_offc_clbrtn_othr', 100)->nullable();
            $table->char('svc_rep_mtg_offc_clbrtn', 2)->nullable();
            $table->string('svc_rep_mtg_offc_clbrtn_othr', 100)->nullable();
            $table->char('svc_rep_mtg_usr_attnd_rec', 2)->nullable();
            $table->string('svc_rep_mtg_usr_attnd_rec_othr', 100)->nullable();
            $table->char('svc_rep_mtg_doc_attnd_clbrtn', 2)->nullable();
            $table->string('svc_rep_mtg_doc_attnd_clbrtn_othr', 100)->nullable();
            $table->char('doc_cont_proc_desc', 2)->nullable();
            $table->string('doc_cont_proc_desc_othr', 100)->nullable();
            $table->char('doc_instr_str', 2)->nullable();
            $table->string('doc_instr_str_othr', 100)->nullable();
            $table->char('doc_instr_rec', 2)->nullable();
            $table->string('doc_instr_rec_othr', 100)->nullable();
            $table->char('doc_rhbl_plc_consul_rec', 2)->nullable();
            $table->string('doc_rhbl_plc_consul_rec_othr', 100)->nullable();
            $table->char('doc_svc_pln_doc_str', 2)->nullable();
            $table->string('doc_svc_pln_doc_str_othr', 100)->nullable();
            $table->char('doc_hm_vst_nrs_rep_str', 2)->nullable();
            $table->string('doc_hm_vst_nrs_rep_str_othr', 100)->nullable();
            $table->char('doc_nrs_plc_consul_rec', 2)->nullable();
            $table->string('doc_nrs_plc_consul_rec_othr', 100)->nullable();
            $table->char('ara_comp_sup_ctr_coop', 2)->nullable();
            $table->string('ara_comp_sup_ctr_coop_othr', 100)->nullable();
            $table->char('cr_prev_sup_offc_coop', 2)->nullable();
            $table->string('cr_prev_sup_offc_coop_othr', 100)->nullable();
            $table->char('vst_nrs_sta_coop', 2)->nullable();
            $table->string('vst_nrs_sta_coop_othr', 100)->nullable();
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
        Schema::dropIfExists('swms_mhlw_mng_out_org_coop_13');
    }
};
