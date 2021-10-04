<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_kegiatans', function (Blueprint $table) {
            $table->integer('id_kegiatan')->primary();
            $table->string('rencanakerja');
            $table->string('hari');
            $table->string('id_pelaksana');
            $table->string('waktu');
            $table->string('foto');
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
        Schema::dropIfExists('jadwal_kegiatans');
    }
}
