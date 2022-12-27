<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresensisTable extends Migration
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
            // $table->foreignId('presensi_id');
            $table->date('tglPresensi');
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
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presensi');
    }
}
