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
            $table->foreignId('pegawai_id');
            $table->foreignId('status_id');
            $table->timestamps();

            // Foreign Key Relation
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade')->onUpdate('cascade');
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
