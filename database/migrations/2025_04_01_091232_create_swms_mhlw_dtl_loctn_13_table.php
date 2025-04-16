<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwmsMhlwDtlLoctn13Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swms_mhlw_dtl_loctn_13', function (Blueprint $table) {
            $table->char('offc_no', 10);
            $table->char('svc_type', 3);
            $table->string('offc_name_kana', 100)->nullable();
            $table->string('offc_city_cd', 10)->nullable();
            $table->string('offc_locat_1', 50)->nullable();
            $table->string('offc_locat_2', 50)->nullable();
            $table->decimal('offc_locat_latitd', 18, 15)->nullable()->default(0);
            $table->decimal('offc_locat_longtd', 18, 15)->nullable()->default(0);
            $table->string('offc_tel', 50)->nullable();
            $table->string('offc_fax', 50)->nullable();
            $table->string('offc_hp', 150)->nullable();
            $table->char('offc_hp_sts', 2)->nullable();
            $table->string('offc_mgr_name', 30)->nullable();
            $table->string('offc_mgr_nm_job_title', 30)->nullable();
            $table->char('bsi_start_dt', 10)->nullable();
            $table->char('spec_dt_nrs_cr_svc', 10)->nullable();
            $table->char('spec_dt_nrs_cr_prev_svc', 10)->nullable();
            $table->char('spec_updt_dt_nrs_cr_svc', 10)->nullable();
            $table->char('spec_updt_dt_ch_nrs_cr_prev_svc', 10)->nullable();
            $table->char('spec_dt_most_rect_nrs_cr_svc', 10)->nullable();
            $table->char('spec_dt_most_rect_nrs_cr_prev_svc', 10)->nullable();
            $table->char('spec_dt_past_nrs_cr_svc', 10)->nullable();
            $table->char('spec_dt_past_nrs_cr_prev_svc', 10)->nullable();
            $table->char('cr_insurn_71_vst_nrs_deem_dsgn', 4)->nullable();
            $table->char('pub_assit_law_54_2_dsgn', 4)->nullable();
            $table->char('soc_wk_nrs_wlfr_law_48_3_dsgn_offc', 4)->nullable();
            $table->char('elder_disabi_simul_use_svc', 4)->nullable();
            $table->string('offc_atth_med_svc', 200)->nullable();
            $table->string('trnspt_to_offc', 700)->nullable();
            $table->char('offc_frm', 10)->nullable();
            $table->char('part_cons_reg', 100)->nullable();
            $table->char('part_cons_offc_nm_reg', 100)->nullable();
            $table->string('part_cons_offc_url_reg', 200)->nullable();
            $table->char('part_cons_anytm', 100)->nullable();
            $table->char('part_cons_offc_nm_anytm', 100)->nullable();
            $table->string('part_cons_offc_url_anytm', 200)->nullable();
            $table->char('part_cons_anytm_vst', 100)->nullable();
            $table->char('part_cons_offc_nm_any_vst', 100)->nullable();
            $table->string('part_cons_offc_url_any_vst', 200)->nullable();
            $table->char('part_cons_hm_vst_nrs', 100)->nullable();
            $table->char('part_cons_offc_nm_hm_vst_nrs', 100)->nullable();
            $table->string('part_cons_offc_url_hm_vst_nrs', 200)->nullable();
            $table->string('coop_hm_vst_nrs_offc_01_name', 100)->nullable();
            $table->string('coop_hm_vst_nrs_offc_01_url', 500)->nullable();
            $table->string('coop_hm_vst_nrs_offc_02_name', 100)->nullable();
            $table->string('coop_hm_vst_nrs_offc_02_url', 500)->nullable();
            $table->string('coop_hm_vst_nrs_offc_03_name', 100)->nullable();
            $table->string('coop_hm_vst_nrs_offc_03_url', 500)->nullable();
            $table->string('coop_hm_vst_nrs_offc_04_name', 100)->nullable();
            $table->string('coop_hm_vst_nrs_offc_014url', 500)->nullable();
            $table->string('coop_hm_vst_nrs_offc_05_name', 100)->nullable();
            $table->string('coop_hm_vst_nrs_offc_05_url', 500)->nullable();
            $table->string('coop_hm_vst_nrs_offc_06_name', 100)->nullable();
            $table->string('coop_hm_vst_nrs_offc_06_url', 500)->nullable();
            $table->string('coop_hm_vst_nrs_offc_07_name', 100)->nullable();
            $table->string('coop_hm_vst_nrs_offc_07_url', 500)->nullable();
            $table->string('coop_hm_vst_nrs_offc_08_name', 100)->nullable();
            $table->string('coop_hm_vst_nrs_offc_08_url', 500)->nullable();
            $table->string('coop_hm_vst_nrs_offc_09_name', 100)->nullable();
            $table->string('coop_hm_vst_nrs_offc_09_url', 500)->nullable();
            $table->string('coop_hm_vst_nrs_offc_10_name', 100)->nullable();
            $table->string('coop_hm_vst_nrs_offc_10_url', 500)->nullable();
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
        Schema::dropIfExists('swms_mhlw_dtl_loctn_13');
    }
};
