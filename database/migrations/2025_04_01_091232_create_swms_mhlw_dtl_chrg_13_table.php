<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwmsMhlwDtlChrg13Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swms_mhlw_dtl_chrg_13', function (Blueprint $table) {
            $table->char('offc_no', 10);
            $table->char('svc_type', 3);
            $table->string('ex_reg_ca_svc_cst_calc_mthd', 1500)->nullable();
            $table->string('sp_bth_svc_cst_calc_mthd', 500)->nullable();
            $table->string('sp_wlfr_eqp_in_cst_calc_mthd', 500)->nullable();
            $table->char('can_fee_col', 4)->nullable();
            $table->string('can_fee_col_calc_mthd', 700)->nullable();
            $table->char('op_chg_col', 4)->nullable();
            $table->string('op_chg_col_calc_mthd', 500)->nullable();
            $table->char('user_burd_red_sys_implmt', 4)->nullable();
            $table->char('user_burd_wc', 4)->nullable();
            $table->char('user_burd_wc_min', 10)->nullable();
            $table->char('user_burd_wc_max', 10)->nullable();
            $table->integer('user_burd_wc_type')->nullable()->default(0);
            $table->char('user_burd_sp_sle', 4)->nullable();
            $table->char('user_burd_sp_sle_min', 10)->nullable();
            $table->char('user_burd_sp_sle_max', 10)->nullable();
            $table->integer('user_burd_sp_sle_type')->nullable()->default(0);
            $table->char('user_burd_bdsr_eqp', 4)->nullable();
            $table->char('user_burd_bdsr_eqp_min', 10)->nullable();
            $table->char('user_burd_bdsr_eqp_max', 10)->nullable();
            $table->integer('user_burd_bdsr_eqp_type')->nullable()->default(0);
            $table->char('user_burd_pstr', 4)->nullable();
            $table->char('user_burd_pstr_min', 10)->nullable();
            $table->char('user_burd_pstr_max', 10)->nullable();
            $table->integer('user_burd_pstr_type')->nullable()->default(0);
            $table->char('user_burd_hadral', 4)->nullable();
            $table->char('user_burd_hadral_min', 10)->nullable();
            $table->char('user_burd_hadral_max', 10)->nullable();
            $table->integer('user_burd_hadral_type')->nullable()->default(0);
            $table->char('user_burd_slp', 4)->nullable();
            $table->char('user_burd_slp_min', 10)->nullable();
            $table->char('user_burd_slp_max', 10)->nullable();
            $table->integer('user_burd_slp_type')->nullable()->default(0);
            $table->char('user_burd_wakr', 4)->nullable();
            $table->char('user_burd_wakr_min', 10)->nullable();
            $table->char('user_burd_wakr_max', 10)->nullable();
            $table->integer('user_burd_wakr_type')->nullable()->default(0);
            $table->char('user_burd_ws', 4)->nullable();
            $table->char('user_burd_ws_min', 10)->nullable();
            $table->char('user_burd_ws_max', 10)->nullable();
            $table->integer('user_burd_ws_type')->nullable()->default(0);
            $table->char('user_burd_deme', 4)->nullable();
            $table->char('user_burd_deme_min', 10)->nullable();
            $table->char('user_burd_deme_max', 10)->nullable();
            $table->integer('user_burd_deme_type')->nullable()->default(0);
            $table->char('user_burd_lf_mov', 4)->nullable();
            $table->char('user_burd_lf_mov_min', 10)->nullable();
            $table->char('user_burd_lf_mov_max', 10)->nullable();
            $table->integer('user_burd_lf_mov_type')->nullable()->default(0);
            $table->char('user_burd_excrt', 4)->nullable();
            $table->char('user_burd_excrt_min', 10)->nullable();
            $table->char('user_burd_excrt_max', 10)->nullable();
            $table->integer('user_burd_excrt_type')->nullable()->default(0);
            $table->char('user_burd_sit_wc', 4)->nullable();
            $table->char('user_burd_sit_wc_min', 10)->nullable();
            $table->char('user_burd_sit_wc_max', 10)->nullable();
            $table->integer('user_burd_sit_wc_type')->nullable()->default(0);
            $table->char('user_burd_amt_repl', 4)->nullable();
            $table->char('user_burd_amt_repl_min', 10)->nullable();
            $table->char('user_burd_amt_repl_max', 10)->nullable();
            $table->integer('user_burd_amt_repl_type')->nullable()->default(0);
            $table->char('user_burd_use_bth', 4)->nullable();
            $table->char('user_burd_use_bth_min', 10)->nullable();
            $table->char('user_burd_use_bth_max', 10)->nullable();
            $table->integer('user_burd_use_bth_type')->nullable()->default(0);
            $table->char('user_burd_bth_tb_hadral', 4)->nullable();
            $table->char('user_burd_bth_tb_hadral_min', 10)->nullable();
            $table->char('user_burd_bth_tb_hadral_max', 10)->nullable();
            $table->integer('user_burd_bth_tb_hadral_type')->nullable()->default(0);
            $table->char('user_burd_bth_tb_chir', 4)->nullable();
            $table->char('user_burd_bth_tb_chir_min', 10)->nullable();
            $table->char('user_burd_bth_tb_chir_max', 10)->nullable();
            $table->integer('user_burd_bth_tb_chir_type')->nullable()->default(0);
            $table->char('user_burd_bth_tab', 4)->nullable();
            $table->char('user_burd_bth_tab_min', 10)->nullable();
            $table->char('user_burd_bth_tab_max', 10)->nullable();
            $table->integer('user_burd_bth_tab_type')->nullable()->default(0);
            $table->char('user_burd_br_slat_bd', 4)->nullable();
            $table->char('user_burd_br_slat_bd_min', 10)->nullable();
            $table->char('user_burd_br_slat_bd_max', 10)->nullable();
            $table->integer('user_burd_br_slat_bd_type')->nullable()->default(0);
            $table->char('user_burd_bth_tb_dri_bd', 4)->nullable();
            $table->char('user_burd_bth_tb_dri_bd_min', 10)->nullable();
            $table->char('user_burd_bth_tb_dri_bd_max', 10)->nullable();
            $table->integer('user_burd_bth_tb_dri_bd_type')->nullable()->default(0);
            $table->char('user_burd_bth_assis_bet', 4)->nullable();
            $table->char('user_burd_bth_assis_bet_min', 10)->nullable();
            $table->char('user_burd_bth_assis_bet_max', 10)->nullable();
            $table->integer('user_burd_bth_assis_bet_type')->nullable()->default(0);
            $table->char('user_burd_simp_bth_tb', 4)->nullable();
            $table->char('user_burd_simp_bth_tb_min', 10)->nullable();
            $table->char('user_burd_simp_bth_tb_max', 10)->nullable();
            $table->integer('user_burd_simp_bth_tb_type')->nullable()->default(0);
            $table->char('user_burd_lf_fs', 4)->nullable();
            $table->char('user_burd_lf_fs_min', 10)->nullable();
            $table->char('user_burd_lf_fs_max', 10)->nullable();
            $table->integer('user_burd_lf_fs_type')->nullable()->default(0);
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
        Schema::dropIfExists('swms_mhlw_dtl_chrg_13');
    }
};
