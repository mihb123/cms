<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwmsMhlwMngSvcQuaEffrYog13Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swms_mhlw_mng_svc_qua_effr_yog_13', function (Blueprint $table) {
            $table->char('offc_no', 10);
            $table->char('svc_type', 3);
            $table->char('deme_tran_implmt_rec', 2)->nullable();
            $table->string('deme_tran_implmt_rec_othr', 100)->nullable();
            $table->char('deme_cr_mnal', 2)->nullable();
            $table->string('deme_cr_mnal_othr', 100)->nullable();
            $table->char('priv_prot_mnal', 2)->nullable();
            $table->string('priv_prot_mnal_othr', 100)->nullable();
            $table->char('priv_prot_tran_implmt_rec', 2)->nullable();
            $table->string('priv_prot_tran_implmt_rec_othr', 100)->nullable();
            $table->char('regrd_functn_rec', 2)->nullable();
            $table->string('regrd_functn_rec_othr', 100)->nullable();
            $table->char('pysc_ocp_therpst_confer_attd_rec', 2)->nullable();
            $table->string('pysc_ocp_therpst_confer_attd_rec_othr', 100)->nullable();
            $table->char('svc_heal_stat_cfm_doc', 2)->nullable();
            $table->string('svc_heal_stat_cfm_doc_othr', 100)->nullable();
            $table->char('bth_crite_bdy_temp_bld_prese_desc', 2)->nullable();
            $table->string('bth_crite_bdy_temp_bld_prese_desc_othr', 100)->nullable();
            $table->char('bth_avail_jud_rec', 2)->nullable();
            $table->string('bth_avail_jud_rec_othr', 100)->nullable();
            $table->char('bth_avail_jud_nrs', 2)->nullable();
            $table->string('bth_avail_jud_nrs_othr', 100)->nullable();
            $table->char('bth_not_poss_desc_agrmt_sig', 2)->nullable();
            $table->string('bth_not_poss_desc_agrmt_sig_othr', 100)->nullable();
            $table->char('rhbl_desc_goal_achiv', 2)->nullable();
            $table->string('rhbl_desc_goal_achiv_othr', 100)->nullable();
            $table->char('pysc_ocp_lng_hrg_therpst_ment_perio_rec', 2)->nullable();
            $table->string('pysc_ocp_lng_hrg_therpst_ment_perio_rec_othr', 100)->nullable();
            $table->char('daiy_actv_lif_env_rec', 2)->nullable();
            $table->string('daiy_actv_lif_env_rec_othr', 100)->nullable();
            $table->char('wlfr_svc_use_cdtn_rec', 2)->nullable();
            $table->string('wlfr_svc_use_cdtn_rec_othr', 100)->nullable();
            $table->char('fam_mtl_cond_rec', 2)->nullable();
            $table->string('fam_mtl_cond_rec_othr', 100)->nullable();
            $table->char('fam_cr_mtd_desc_rec', 2)->nullable();
            $table->string('fam_cr_mtd_desc_rec_othr', 100)->nullable();
            $table->char('bth_svc_prov_mnal', 2)->nullable();
            $table->string('bth_svc_prov_mnal_othr', 100)->nullable();
            $table->char('bth_svc_implmt_rec', 2)->nullable();
            $table->string('bth_svc_implmt_rec_othr', 100)->nullable();
            $table->char('bth_cln__cond_svc_mnal', 2)->nullable();
            $table->string('bth_cln__cond_svc_mnal_othr', 100)->nullable();
            $table->char('cln_part_bath_mnal', 2)->nullable();
            $table->string('cln_part_bath_mnal_othr', 100)->nullable();
            $table->char('cln_part_bath_implmt_rec', 2)->nullable();
            $table->string('cln_part_bath_implmt_rec_othr', 100)->nullable();
            $table->char('bth_cln_cond_implmt_rec', 2)->nullable();
            $table->string('bth_cln_cond_implmt_rec_othr', 100)->nullable();
            $table->char('dep_bfr_eqp_cfm_rec', 2)->nullable();
            $table->string('dep_bfr_eqp_cfm_rec_othr', 100)->nullable();
            $table->char('hot_wte_temp_set_mnal', 2)->nullable();
            $table->string('hot_wte_temp_set_mnal_othr', 100)->nullable();
            $table->char('excrt_asst_mnal', 2)->nullable();
            $table->string('excrt_asst_mnal_othr', 100)->nullable();
            $table->char('excrt_asst_implmt_rec', 2)->nullable();
            $table->string('excrt_asst_implmt_rec_othr', 100)->nullable();
            $table->char('mel_asst_mnal', 2)->nullable();
            $table->string('mel_asst_mnal_othr', 100)->nullable();
            $table->char('mel_asst_implmt_rec', 2)->nullable();
            $table->string('mel_asst_implmt_rec_othr', 100)->nullable();
            $table->char('orl_cvty_cr_mnal', 2)->nullable();
            $table->string('orl_cvty_cr_mnal_othr', 100)->nullable();
            $table->char('go_out_asst_mnal', 2)->nullable();
            $table->string('go_out_asst_mnal_othr', 100)->nullable();
            $table->char('out_asst_implmt_rec', 2)->nullable();
            $table->string('out_asst_implmt_rec_othr', 100)->nullable();
            $table->char('hous_wk_lif_sup_mnal', 2)->nullable();
            $table->string('hous_wk_lif_sup_mnal_othr', 100)->nullable();
            $table->char('hous_wk_lif_sup_implmt_rec', 2)->nullable();
            $table->string('hous_wk_lif_sup_implmt_rec_othr', 100)->nullable();
            $table->char('ck_implmt_mnal', 2)->nullable();
            $table->string('ck_implmt_mnal_othr', 100)->nullable();
            $table->char('vtl_sgn_med_cond_rec', 2)->nullable();
            $table->string('vtl_sgn_med_cond_rec_othr', 100)->nullable();
            $table->char('pysc_ocp_lng_hrg_therapy_sup_rec', 2)->nullable();
            $table->string('pysc_ocp_lng_hrg_therapy_sup_rec_othr', 100)->nullable();
            $table->char('vst_sched_chg_mnal', 2)->nullable();
            $table->string('vst_sched_chg_mnal_othr', 100)->nullable();
            $table->char('hous_reno_stdy_rec', 2)->nullable();
            $table->string('hous_reno_stdy_rec_othr', 100)->nullable();
            $table->char('hous_reno_nrs_reno_coop_rec', 2)->nullable();
            $table->string('hous_reno_nrs_reno_coop_rec_othr', 100)->nullable();
            $table->char('wlfr_eqp_exam_rec', 2)->nullable();
            $table->string('wlfr_eqp_exam_rec_othr', 100)->nullable();
            $table->char('wlfr_eqp_nrs_wlfr_reno_coop_rec', 2)->nullable();
            $table->string('wlfr_eqp_nrs_wlfr_reno_coop_rec_othr', 100)->nullable();
            $table->char('lif_imp_desc_rec', 2)->nullable();
            $table->string('lif_imp_desc_rec_othr', 100)->nullable();
            $table->char('mtnl_sup_rec', 2)->nullable();
            $table->string('mtnl_sup_rec_othr', 100)->nullable();
            $table->char('eqp_disift_cln_implmt_rec', 2)->nullable();
            $table->string('eqp_disift_cln_implmt_rec_othr', 100)->nullable();
            $table->char('bth_cr_sht_repl_disift_rec', 2)->nullable();
            $table->string('bth_cr_sht_repl_disift_rec_othr', 100)->nullable();
            $table->char('eqp_vhc_inspct_mtnc_implmt_rec', 2)->nullable();
            $table->string('eqp_vhc_inspct_mtnc_implmt_rec_othr', 100)->nullable();
            $table->char('prev_rhbl_implmt_rec', 2)->nullable();
            $table->string('prev_rhbl_implmt_rec_othr', 100)->nullable();
            $table->char('mel_sup_rec', 2)->nullable();
            $table->string('mel_sup_rec_othr', 100)->nullable();
            $table->char('cln_sup_rec', 2)->nullable();
            $table->string('cln_sup_rec_othr', 100)->nullable();
            $table->char('slp_sup_rec', 2)->nullable();
            $table->string('slp_sup_rec_othr', 100)->nullable();
            $table->char('clth_lif_sup_rec', 2)->nullable();
            $table->string('clth_lif_sup_rec_othr', 100)->nullable();
            $table->char('medctn_instr_rec', 2)->nullable();
            $table->string('medctn_instr_rec_othr', 100)->nullable();
            $table->char('med_proc_mnal', 2)->nullable();
            $table->string('med_proc_mnal_othr', 100)->nullable();
            $table->char('bdrd_dec_disu_syndm_pre_desc', 2)->nullable();
            $table->string('bdrd_dec_disu_syndm_pre_desc_othr', 100)->nullable();
            $table->char('med_cond_chg_cont_mnal', 2)->nullable();
            $table->string('med_cond_chg_cont_mnal_othr', 100)->nullable();
            $table->char('othr_svc_mgrt_desc_rec', 2)->nullable();
            $table->string('othr_svc_mgrt_desc_rec_othr', 100)->nullable();
            $table->char('othr_svc_mgrt_mnal', 2)->nullable();
            $table->string('othr_svc_mgrt_mnal_othr', 100)->nullable();
            $table->char('emp_hspt_mnal', 2)->nullable();
            $table->string('emp_hspt_mnal_othr', 100)->nullable();
            $table->char('emp_hspt_tran_implmt_rec', 2)->nullable();
            $table->string('emp_hspt_tran_implmt_rec_othr', 100)->nullable();
            $table->char('mny_mgmt_mnal', 2)->nullable();
            $table->string('mny_mgmt_mnal_othr', 100)->nullable();
            $table->char('mny_mgmt_rec', 2)->nullable();
            $table->string('mny_mgmt_rec_othr', 100)->nullable();
            $table->char('mny_mgmt_agrmt_doc_sig', 2)->nullable();
            $table->string('mny_mgmt_agrmt_doc_sig_othr', 100)->nullable();
            $table->char('ky_mgmt_mnal', 2)->nullable();
            $table->string('ky_mgmt_mnal_othr', 100)->nullable();
            $table->char('ky_nm_mgmt', 2)->nullable();
            $table->string('ky_nm_mgmt_othr', 100)->nullable();
            $table->char('pain_relf_mnal', 2)->nullable();
            $table->string('pain_relf_mnal_othr', 100)->nullable();
            $table->char('tmnl_cr_mnal', 2)->nullable();
            $table->string('tmnl_cr_mnal_othr', 100)->nullable();
            $table->char('nrs_mtd_pl_user_intnt_rec', 2)->nullable();
            $table->string('nrs_mtd_pl_usr_intnt_rec_othr', 100)->nullable();
            $table->char('tmnl_cr_implmt_prgs_rec', 2)->nullable();
            $table->string('tmnl_cr_implmt_prgs_rec_othr', 100)->nullable();
            $table->char('nrs_nrs_stf_mtg_rec', 2)->nullable();
            $table->string('nrs_nrs_stf_mtg_rec_othr', 100)->nullable();
            $table->char('nrs_med_coop_mtg_attd_rec', 2)->nullable();
            $table->string('nrs_med_coop_mtg_attd_rec_othr', 100)->nullable();
            $table->char('wlfr_eqp_in_out_dt_req_doc', 2)->nullable();
            $table->string('wlfr_eqp_in_out_dt_req_doc_othr', 100)->nullable();
            $table->char('wlfr_eqp_use_bef_insp_doc', 2)->nullable();
            $table->string('wlfr_eqp_use_bef_insp_doc_othr', 100)->nullable();
            $table->char('wlfr_eqp_compt_implmt_mnal', 2)->nullable();
            $table->string('wlfr_eqp_compt_implmt_mnal_othr', 100)->nullable();
            $table->char('wlfr_eqp_compt_rec', 2)->nullable();
            $table->string('wlfr_eqp_compt_rec_othr', 100)->nullable();
            $table->char('wlfr_eqp_mnal_issu_user_sig', 2)->nullable();
            $table->string('wlfr_eqp_mnal_issu_user_sig_othr', 100)->nullable();
            $table->char('wlfr_eqp_mnal_cfm_user_sig', 2)->nullable();
            $table->string('wlfr_eqp_mnal_cfm_user_sig_othr', 100)->nullable();
            $table->char('appl_crtf_nrs_cr_cnfm_doc', 2)->nullable();
            $table->string('appl_crtf_nrs_cr_cnfm_doc_othr', 100)->nullable();
            $table->char('cr_pln_nrs_cr_insrnc_fcl', 2)->nullable();
            $table->string('cr_pln_nrs_cr_insrnc_fcl_othr', 100)->nullable();
            $table->char('disch_hsptl_attnd_cnf_rec', 2)->nullable();
            $table->string('disch_hsptl_attnd_cnf_rec_othr', 100)->nullable();
            $table->char('bsnss_slct_stpltn', 2)->nullable();
            $table->string('bsnss_slct_stpltn_othr', 100)->nullable();
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
        Schema::dropIfExists('swms_mhlw_mng_svc_qua_effr_yog_13');
    }
};
