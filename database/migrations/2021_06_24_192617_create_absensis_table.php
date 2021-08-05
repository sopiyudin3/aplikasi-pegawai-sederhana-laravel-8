<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('jumlah_hari_kerja');
            $table->integer('jumlah_hari_sakit');
            $table->integer('jumlah_hari_izin');
            $table->integer('jumlah_hari_alfa');
            $table->integer('jumlah_hari_cuti');
            $table->integer('potongan_gaji_pokok');
            $table->integer('potongan_tunjangan_makan');
            $table->integer('potongan_tunjangan_transport');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensis');
    }
}
