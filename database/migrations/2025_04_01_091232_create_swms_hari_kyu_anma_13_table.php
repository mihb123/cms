<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwmsHariKyuAnma13Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swms_hari_kyu_anma_13', function (Blueprint $table) {
            $table->char('item_nm', 5)->nullable();
            $table->char('inst_nm', 50)->nullable();
            $table->char('vist_spec_flg', 2)->nullable();
            $table->char('pstcd', 8)->nullable();
            $table->char('addrs', 100)->nullable();
            $table->char('area_blng', 15)->nullable();
            $table->decimal('locat_latitd', 18, 15)->nullable()->default(0);
            $table->decimal('locat_longtd', 18, 15)->nullable()->default(0);
            $table->char('tel', 15)->nullable();
            $table->char('hari_commit_dt', 16)->nullable();
            $table->char('hari_regist_no', 10)->nullable();
            $table->char('hari_med_treat_mng', 50)->nullable();
            $table->char('kyu_commit_dt', 16)->nullable();
            $table->char('kyu_regist_no', 10)->nullable();
            $table->char('kyu_med_treat_mng', 50)->nullable();
            $table->char('anma_commit_dt', 16)->nullable();
            $table->char('anma_regist_no', 10)->nullable();
            $table->char('anma_med_treat_mng', 50)->nullable();
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
        Schema::dropIfExists('swms_hari_kyu_anma_13');
    }
};
