<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwmsMhlwDtlEmpYog13Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swms_mhlw_dtl_emp_yog_13', function (Blueprint $table) {
            $table->char('offc_no', 10);
            $table->char('svc_type', 3);
            $table->string('emp_tran_implmt', 1000)->nullable();
            $table->decimal('hlth_nrs_sum', 3, 0)->nullable()->default(0);
            $table->decimal('hlth_nrs_rg', 3, 0)->nullable()->default(0);
            $table->decimal('hlth_nrs_pt', 3, 0)->nullable()->default(0);
            $table->decimal('nrs_sum', 3, 0)->nullable()->default(0);
            $table->decimal('nrs_rg', 3, 0)->nullable()->default(0);
            $table->decimal('nrs_pt', 3, 0)->nullable()->default(0);
            $table->decimal('assoc_nrs_sum', 3, 0)->nullable()->default(0);
            $table->decimal('assoc_nrs_rg', 3, 0)->nullable()->default(0);
            $table->decimal('assoc_nrs_pt', 3, 0)->nullable()->default(0);
            $table->decimal('vst_crwk_sum', 3, 0)->nullable()->default(0);
            $table->decimal('vst_crwk_rg', 3, 0)->nullable()->default(0);
            $table->decimal('vst_crwk_pt', 3, 0)->nullable()->default(0);
            $table->decimal('vst_crwk_chf_sum', 3, 0)->nullable()->default(0);
            $table->decimal('vst_crwk_chf_rg', 3, 0)->nullable()->default(0);
            $table->decimal('vst_crwk_chf_pt', 3, 0)->nullable()->default(0);
            $table->decimal('crwk_sum', 3, 0)->nullable()->default(0);
            $table->decimal('crwk_rg', 3, 0)->nullable()->default(0);
            $table->decimal('crwk_pt', 3, 0)->nullable()->default(0);
            $table->decimal('crmngr_sum', 3, 0)->nullable()->default(0);
            $table->decimal('crmngr_rg', 3, 0)->nullable()->default(0);
            $table->decimal('crmngr_pt', 3, 0)->nullable()->default(0);
            $table->decimal('crmngr_chf_sum', 3, 0)->nullable()->default(0);
            $table->decimal('crmngr_chf_rg', 3, 0)->nullable()->default(0);
            $table->decimal('crmngr_chf_pt', 3, 0)->nullable()->default(0);
            $table->decimal('pysc_therpst_sum', 3, 0)->nullable()->default(0);
            $table->decimal('pysc_therpst_rg', 3, 0)->nullable()->default(0);
            $table->decimal('pysc_therpst_pt', 3, 0)->nullable()->default(0);
            $table->decimal('ocp_therpst_sum', 3, 0)->nullable()->default(0);
            $table->decimal('ocp_therpst_rg', 3, 0)->nullable()->default(0);
            $table->decimal('ocp_therpst_pt', 3, 0)->nullable()->default(0);
            $table->decimal('advslst_sum', 3, 0)->nullable()->default(0);
            $table->decimal('advslst_rg', 3, 0)->nullable()->default(0);
            $table->decimal('advslst_pt', 3, 0)->nullable()->default(0);
            $table->decimal('oprtr_sum', 3, 0)->nullable()->default(0);
            $table->decimal('oprtr_rg', 3, 0)->nullable()->default(0);
            $table->decimal('oprtr_pt', 3, 0)->nullable()->default(0);
            $table->decimal('intvwr_sum', 3, 0)->nullable()->default(0);
            $table->decimal('intvwr_rg', 3, 0)->nullable()->default(0);
            $table->decimal('intvwr_pt', 3, 0)->nullable()->default(0);
            $table->decimal('wlfr_eqp_cnsl_sum', 3, 0)->nullable()->default(0);
            $table->decimal('wlfr_eqp_cnsl_rg', 3, 0)->nullable()->default(0);
            $table->decimal('wlfr_eqp_cnsl_pt', 3, 0)->nullable()->default(0);
            $table->decimal('clrk_sum', 3, 0)->nullable()->default(0);
            $table->decimal('clrk_rg', 3, 0)->nullable()->default(0);
            $table->decimal('clrk_pt', 3, 0)->nullable()->default(0);
            $table->decimal('othr_stff_sum', 3, 0)->nullable()->default(0);
            $table->decimal('othr_stff_rg', 3, 0)->nullable()->default(0);
            $table->decimal('othr_stff_pt', 3, 0)->nullable()->default(0);
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
        Schema::dropIfExists('swms_mhlw_dtl_emp_yog_13');
    }
};
