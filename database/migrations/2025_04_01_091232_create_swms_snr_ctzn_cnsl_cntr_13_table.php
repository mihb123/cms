<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwmsSnrCtznCnslCntr13Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swms_snr_ctzn_cnsl_cntr_13', function (Blueprint $table) {
            $table->char('sral_no', 4)->nullable();
            $table->char('mncplty_sral_no', 2)->nullable();
            $table->string('mncplty_name', 20)->nullable();
            $table->char('mncplty_no', 2)->nullable();
            $table->string('area_jrsdctn', 800)->nullable();
            $table->string('inst_nm', 50)->nullable();
            $table->string('inst_nm_kana', 100)->nullable();
            $table->string('tel', 50)->nullable();
            $table->string('fax', 50)->nullable();
            $table->string('pstcd', 10)->nullable();
            $table->string('addrs', 100)->nullable();
            $table->decimal('locat_latitd', 18, 15)->nullable()->default(0);
            $table->decimal('locat_longtd', 18, 15)->nullable()->default(0);
            $table->string('rsons_time_zone', 100)->nullable();
            $table->string('spcl_notes', 100)->nullable();
            $table->char('facl_typ_commnty_gnrl_spprt_cntr', 2)->nullable();
            $table->char('facl_typ_brnch_sub_cntr', 2)->nullable();
            $table->char('facl_typ_hm_cr_spprt_cntr', 2)->nullable();
            $table->char('facl_typ_othr_cnsl_srvc', 2)->nullable();
            $table->char('cntnt_cnsl_chng_eldry', 2)->nullable();
            $table->char('cntnt_cnsl_suspct_cnsmr_dmge', 2)->nullable();
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
        Schema::dropIfExists('swms_snr_ctzn_cnsl_cntr_13');
    }
};
