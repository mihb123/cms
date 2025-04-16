<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwmsMhlwMngSafeHygiMgmtKyo13Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swms_mhlw_mng_safe_hygi_mgmt_kyo_13', function (Blueprint $table) {
            $table->char('offc_no', 10);
            $table->char('svc_type', 3);
            $table->char('acdt_prev_mnal', 2)->nullable();
            $table->string('acdt_prev_mnal_othr', 100)->nullable();
            $table->char('acdt_prev_cs_exam_rec', 2)->nullable();
            $table->string('acdt_prev_cs_exam_rec_othr', 100)->nullable();
            $table->char('acdt_prev_tran_implmt_rec', 2)->nullable();
            $table->string('acdt_prev_tran_implmt_rec_othr', 100)->nullable();
            $table->char('acdt_evt_emg_resp_mnal', 2)->nullable();
            $table->string('acdt_evt_emg_resp_mnal_othr', 100)->nullable();
            $table->char('acdt_evt_emg_do_implmt_rec', 2)->nullable();
            $table->string('acdt_evt_emg_do_implmt_rec_othr', 100)->nullable();
            $table->char('emg_dist_resp_mnal', 2)->nullable();
            $table->string('emg_dist_resp_mnal_othr', 100)->nullable();
            $table->char('emg_cont_lst', 2)->nullable();
            $table->string('emg_cont_lst_othr', 100)->nullable();
            $table->char('infe_poisng_prev_exam_rec', 2)->nullable();
            $table->string('infe_poisng_prev_exam_rec_othr', 100)->nullable();
            $table->char('infe_dise_fp_prev_mnal', 2)->nullable();
            $table->string('infe_dise_fp_prev_mnal_othr', 100)->nullable();
            $table->char('infe_dise_fp_prev_tran_implmt_rec', 2)->nullable();
            $table->string('infe_dise_fp_prev_tran_implmt_rec_othr', 100)->nullable();
            $table->char('infe_dise_prev_exam_rec', 2)->nullable();
            $table->string('infe_dise_prev_exam_rec_othr', 100)->nullable();
            $table->char('infe_dise_prev_mnal', 2)->nullable();
            $table->string('infe_dise_prev_mnal_othr', 100)->nullable();
            $table->char('infe_dise_prev_tran_implmt_rec', 2)->nullable();
            $table->string('infe_dise_prev_tran_implmt_rec_othr', 100)->nullable();
            $table->char('infe_wst_hdlg_mnal', 2)->nullable();
            $table->string('infe_wst_hdlg_mnal_othr', 100)->nullable();
            $table->char('emp_no_wel_repl_std_mnal', 2)->nullable();
            $table->string('emp_no_wel_repl_std_mnal_othr', 100)->nullable();
            $table->char('wlfr_eqp_use_histy_mgmt_ldg', 2)->nullable();
            $table->string('wlfr_eqp_use_histy_mgmt_ldg_othr', 100)->nullable();
            $table->char('wlfr_eqp_disp_repl_crit', 2)->nullable();
            $table->string('wlfr_eqp_disp_repl_crit_othr', 100)->nullable();
            $table->char('wlfr_eqp_acdt_prev_desc_cfm_sig', 2)->nullable();
            $table->string('wlfr_eqp_acdt_prev_desc_cfm_sig_othr', 100)->nullable();
            $table->char('wlfr_eqp_acdt_prev_cas_col', 2)->nullable();
            $table->string('wlfr_eqp_acdt_prev_cas_col_othr', 100)->nullable();
            $table->char('wlfr_eqp_acdt_cont_info', 2)->nullable();
            $table->string('wlfr_eqp_acdt_cont_info_othr', 100)->nullable();
            $table->char('wlfr_eqp_acdt_emg_resp_mnal', 2)->nullable();
            $table->string('wlfr_eqp_acdt_emg_resp_mnal_othr', 100)->nullable();
            $table->char('wlfr_eqp_acdt_emg_resp_tran_implmt_rec', 2)->nullable();
            $table->string('wlfr_eqp_acdt_emg_resp_tran_implmt_rec_othr', 100)->nullable();
            $table->char('wlfr_eqp_acdt_emg_resp_rec', 2)->nullable();
            $table->string('wlfr_eqp_acdt_emg_resp_rec_othr', 100)->nullable();
            $table->char('wlfr_eqp_cln_disif_mnal', 2)->nullable();
            $table->string('wlfr_eqp_cln_disif_mnal_othr', 100)->nullable();
            $table->char('wlfr_eqp_cln_disif_implmt_dt_rec', 2)->nullable();
            $table->string('wlfr_eqp_cln_disif_implmt_dt_rec_othr', 100)->nullable();
            $table->char('wlfr_eqp_cln_disif_sprt_stg', 2)->nullable();
            $table->string('wlfr_eqp_cln_disif_sprt_stg_othr', 100)->nullable();
            $table->char('wlfr_eqp_pkg_tanns_mnal', 2)->nullable();
            $table->string('wlfr_eqp_pkg_tanns_mnal_othr', 100)->nullable();
            $table->char('pers_info_doc_pst_distro', 2)->nullable();
            $table->string('pers_info_doc_pst_distro_othr', 100)->nullable();
            $table->char('pers_info_bsi_plc_offc_pst', 2)->nullable();
            $table->string('pers_info_bsi_plc_offc_pst_othr', 100)->nullable();
            $table->char('pers_info_bsi_plc_rel_publc', 2)->nullable();
            $table->string('pers_info_bsi_plc_rel_publc_othr', 100)->nullable();
            $table->char('svc_prov_rec_disclo_stts_doc', 2)->nullable();
            $table->string('svc_prov_rec_disclo_stts_doc_othr', 100)->nullable();
            $table->char('wlfr_eqp_acdt_prev_exam_rec', 2)->nullable();
            $table->string('wlfr_eqp_acdt_prev_exam_rec_othr', 100)->nullable();
            $table->char('usr_emg_cntct_resp_mnal', 2)->nullable();
            $table->string('usr_emg_cntct_resp_mnal_othr', 100)->nullable();
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
        Schema::dropIfExists('swms_mhlw_mng_safe_hygi_mgmt_kyo_13');
    }
};
