<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')->nullable()->index('fk_presensi_to_pegawai');
            $table->foreignId('status_id')->nullable()->index('fk_presensi_to_status');
            $table->datetime('tglPresensi');
            $table->timestamp('jamMasuk');
            $table->timestamp('jamPulang');
            $table->text('keterangan');
            $table->longText('foto')->nullable();
            $table->string('lokasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.s
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presensi');
    }
}
