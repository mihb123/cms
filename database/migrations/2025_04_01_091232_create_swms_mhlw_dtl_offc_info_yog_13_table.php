<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwmsMhlwDtlOffcInfoYog13Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swms_mhlw_dtl_offc_info_yog_13', function (Blueprint $table) {
            $table->char('offc_no', 10);
            $table->char('svc_type', 3);
            $table->string('corp_type', 30)->nullable();
            $table->string('corp_type_othr', 30)->nullable();
            $table->string('corp_name', 50)->nullable();
            $table->string('corp_name_kana', 50)->nullable();
            $table->char('corp_nm_exit', 12)->nullable();
            $table->char('corp_nm', 15)->nullable();
            $table->char('corp_pstcd', 8)->nullable();
            $table->string('corp_locat', 100)->nullable();
            $table->char('corp_tel', 15)->nullable();
            $table->char('corp_fax', 15)->nullable();
            $table->string('corp_hp', 50)->nullable();
            $table->string('corp_rep_name', 30)->nullable();
            $table->string('corp_rep_job_title', 30)->nullable();
            $table->char('corp_estab_date', 10)->nullable();
            $table->char('vst_cr_offc_num', 3)->nullable();
            $table->string('vst_cr_offc_name', 100)->nullable();
            $table->string('vst_cr_offc_locat', 100)->nullable();
            $table->char('vst_bth_cr_offc_num', 3)->nullable();
            $table->string('vst_bth_cr_offc_name', 100)->nullable();
            $table->string('vst_bth_cr_offc_locat', 100)->nullable();
            $table->char('vst_nrs_offc_num', 3)->nullable();
            $table->string('vst_nrs_offc_name', 100)->nullable();
            $table->string('vst_nrs_offc_locat', 100)->nullable();
            $table->char('vst_rhbl_offc_num', 3)->nullable();
            $table->string('vst_rhbl_offc_name', 100)->nullable();
            $table->string('vst_rhbl_offc_locat', 100)->nullable();
            $table->char('hm_cr_magt_guidan_offc_num', 3)->nullable();
            $table->string('hm_cr_magt_guidan_offc_name', 100)->nullable();
            $table->string('hm_cr_magt_guidan_offc_locat', 100)->nullable();
            $table->char('opat_cr_offc_num', 3)->nullable();
            $table->string('opat_cr_offc_name', 100)->nullable();
            $table->string('opat_cr_offc_locat', 100)->nullable();
            $table->char('opat_rhbl_offc_num', 3)->nullable();
            $table->string('opat_rhbl_offc_name', 100)->nullable();
            $table->string('opat_rhbl_offc_locat', 100)->nullable();
            $table->char('sho_tm_admis_lif_cr_offc_num', 3)->nullable();
            $table->string('sho_tm_admis_lif_cr_offc_name', 100)->nullable();
            $table->string('sho_tm_admis_lif_cr_offc_locat', 100)->nullable();
            $table->char('sho_tm_admis_med_cr_offc_num', 3)->nullable();
            $table->string('sho_tm_admis_med_cr_offc_name', 100)->nullable();
            $table->string('sho_tm_admis_med_cr_offc_locat', 100)->nullable();
            $table->char('spec_fac_res_lif_cr_offc_num', 3)->nullable();
            $table->string('spec_fac_res_lif_cr_offc_name', 100)->nullable();
            $table->string('spec_fac_res_lif_cr_offc_locat', 100)->nullable();
            $table->char('welf_eqp_rent_offc_num', 3)->nullable();
            $table->string('welf_eqp_rent_offc_name', 100)->nullable();
            $table->string('welf_eqp_rent_offc_locat', 100)->nullable();
            $table->char('wlfr_eqp_sell_offc_num', 3)->nullable();
            $table->string('wlfr_eqp_sell_offc_name', 100)->nullable();
            $table->string('wlfr_eqp_sell_offc_locat', 100)->nullable();
            $table->char('reg_vst_cr_nrs_offc_num', 3)->nullable();
            $table->string('reg_vst_cr_nrs_offc_name', 100)->nullable();
            $table->string('reg_vst_cr_nrs_offc_locat', 100)->nullable();
            $table->char('nght_vst_cr_offc_num', 3)->nullable();
            $table->string('nght_vst_cr_offc_name', 100)->nullable();
            $table->string('nght_vst_cr_offc_locat', 100)->nullable();
            $table->char('comm_opat_cr_offc_num', 3)->nullable();
            $table->string('comm_opat_cr_offc_name', 100)->nullable();
            $table->string('comm_opat_cr_offc_locat', 100)->nullable();
            $table->char('deme_cpat_cr_offc_num', 3)->nullable();
            $table->string('deme_cpat_cr_offc_name', 100)->nullable();
            $table->string('deme_cpat_cr_offc_locat', 100)->nullable();
            $table->char('sml_multi_hm_cr_offc_num', 3)->nullable();
            $table->string('sml_multi_hm_cr_offc_name', 100)->nullable();
            $table->string('sml_multi_hm_cr_offc_locat', 100)->nullable();
            $table->char('deme_comm_lif_cr_offc_num', 3)->nullable();
            $table->string('deme_comm_lif_cr_offc_name', 100)->nullable();
            $table->string('deme_comm_lif_cr_offc_locat', 100)->nullable();
            $table->char('comm_spec_fac_lif_cr_offc_num', 3)->nullable();
            $table->string('comm_spec_fac_lif_cr_offc_name', 100)->nullable();
            $table->string('comm_spec_fac_lif_cr_offc_locat', 100)->nullable();
            $table->char('comm_elder_welf_fac_lif_cr_offc_num', 3)->nullable();
            $table->string('comm_elder_welf_fac_lif_cr_offc_name', 100)->nullable();
            $table->string('comm_elder_welf_fac_lif_cr_offc_locat', 100)->nullable();
            $table->char('nrs_smal_multi_hm_cr_comp_svc_offc_num', 3)->nullable();
            $table->string('nrs_smal_multi_hm_cr_comp_svc_offc_name', 100)->nullable();
            $table->string('nrs_smal_multi_hm_cr_comp_svc_offc_locat', 100)->nullable();
            $table->char('comp_svc_nrs_smal_multi_hm_cr_offc_num', 3)->nullable();
            $table->string('comp_svc_nrs_smal_multi_hm_cr_offc_name', 100)->nullable();
            $table->string('comp_svc_nrs_smal_multi_hm_cr_offc_locat', 100)->nullable();
            $table->char('comp_svc_offc_num', 3)->nullable();
            $table->string('comp_svc_offc_name', 100)->nullable();
            $table->string('comp_svc_offc_locat', 100)->nullable();
            $table->char('hm_cr_sup_offc_num', 3)->nullable();
            $table->string('hm_cr_sup_offc_name', 100)->nullable();
            $table->string('hm_cr_sup_offc_locat', 100)->nullable();
            $table->char('cr_prev_vst_bth_cr_offc_num', 3)->nullable();
            $table->string('cr_prev_vst_bth_cr_offc_name', 100)->nullable();
            $table->string('cr_prev_vst_bth_cr_offc_locat', 100)->nullable();
            $table->char('cr_prev_vst_nrs_offc_num', 3)->nullable();
            $table->string('cr_prev_vst_nrs_offc_name', 100)->nullable();
            $table->string('cr_prev_vst_nrs_offc_locat', 100)->nullable();
            $table->char('cr_prev_vst_cr_offc_num', 3)->nullable();
            $table->string('cr_prev_vst_cr_offc_name', 100)->nullable();
            $table->string('cr_prev_vst_cr_offc_locat', 100)->nullable();
            $table->char('cr_prev_opat_cr_offc_num', 3)->nullable();
            $table->string('cr_prev_opat_cr_offc_name', 100)->nullable();
            $table->string('cr_prev_opat_cr_offc_locat', 100)->nullable();
            $table->char('cr_prev_vst_rhbl_offc_num', 3)->nullable();
            $table->string('cr_prev_vst_rhbl_offc_name', 100)->nullable();
            $table->string('cr_prev_vst_rhbl_offc_locat', 100)->nullable();
            $table->char('cr_prev_hm_cr_magt_gidn_offc_num', 3)->nullable();
            $table->string('cr_prev_hm_cr_magt_gidn_offc_name', 100)->nullable();
            $table->string('cr_prev_hm_cr_magt_gidn_offc_locat', 100)->nullable();
            $table->char('cr_prev_opat_rhbl_offc_num', 3)->nullable();
            $table->string('cr_prev_opat_rhbl_offc_name', 100)->nullable();
            $table->string('cr_prev_opat_rhbl_offc_locat', 100)->nullable();
            $table->char('cr_prev_sho_tm_lif_cr_offc_num', 3)->nullable();
            $table->string('cr_prev_sho_tm_lif_cr_offc_name', 100)->nullable();
            $table->string('cr_prev_sho_tm_lif_cr_offc_locat', 100)->nullable();
            $table->char('cr_prev_sho_tm_med_cr_offc_num', 3)->nullable();
            $table->string('cr_prev_sho_tm_med_cr_offc_name', 100)->nullable();
            $table->string('cr_prev_sho_tm_med_cr_offc_locat', 100)->nullable();
            $table->char('cr_prev_spec_fac_lif_cr_offc_num', 3)->nullable();
            $table->string('cr_prev_spec_fac_lif_cr_offc_name', 100)->nullable();
            $table->string('cr_prev_spec_fac_lif_cr_offc_locat', 100)->nullable();
            $table->char('cr_prev_wlfr_eqp_rent_offc_num', 3)->nullable();
            $table->string('cr_prev_wlfr_eqp_rent_offc_name', 100)->nullable();
            $table->string('cr_prev_wlfr_eqp_rent_offc_locat', 100)->nullable();
            $table->char('spec_cr_prev_wlfr_eqp_sell_offc_num', 3)->nullable();
            $table->string('spec_cr_prev_wlfr_eqp_sell_offc_name', 100)->nullable();
            $table->string('spec_cr_prev_wlfr_eqp_sell_offc_locat', 100)->nullable();
            $table->char('cr_prev_deme_cpat_cr_offc_num', 3)->nullable();
            $table->string('cr_prev_deme_cpat_cr_offc_name', 100)->nullable();
            $table->string('cr_prev_deme_cpat_cr_offc_locat', 100)->nullable();
            $table->char('cr_prev_sml_multi_hm_cr_offc_num', 3)->nullable();
            $table->string('cr_prev_sml_multi_hm_cr_offc_name', 100)->nullable();
            $table->string('cr_prev_sml_multi_hm_cr_offc_locat', 100)->nullable();
            $table->char('cr_prev_deme_comm_lif_cr_offc_num', 3)->nullable();
            $table->string('cr_prev_deme_comm_lif_cr_offc_name', 100)->nullable();
            $table->string('cr_prev_deme_comm_lif_cr_offc_locat', 100)->nullable();
            $table->char('cr_prev_sup_offc_num', 3)->nullable();
            $table->string('cr_prev_sup_offc_name', 100)->nullable();
            $table->string('cr_prev_sup_offc_locat', 100)->nullable();
            $table->char('cr_elder_welf_fac_offc_num', 3)->nullable();
            $table->string('cr_elder_welf_fac_offc_name', 100)->nullable();
            $table->string('cr_elder_welf_fac_offc_locat', 100)->nullable();
            $table->char('cr_elder_heal_fac_offc_num', 3)->nullable();
            $table->string('cr_elder_heal_fac_offc_name', 100)->nullable();
            $table->string('cr_elder_heal_fac_offc_locat', 100)->nullable();
            $table->char('nrs_cr_clnc_offc_num', 3)->nullable();
            $table->string('nrs_cr_clnc_offc_name', 100)->nullable();
            $table->string('nrs_cr_clnc_offc_locat', 100)->nullable();
            $table->char('nrs_cr_med_fac_offc_num', 3)->nullable();
            $table->string('nrs_cr_med_fac_offc_name', 100)->nullable();
            $table->string('nrs_cr_med_fac_offc_locat', 100)->nullable();
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
        Schema::dropIfExists('swms_mhlw_dtl_offc_info_yog_13');
    }
};
