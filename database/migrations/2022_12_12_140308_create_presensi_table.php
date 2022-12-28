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
<<<<<<< HEAD:database/migrations/2022_12_12_140308_create_presensi_table.php
            $table->string('lokasi')->nullable();
            $table->timestamps();
            $table->softDeletes();
=======
            $table->string('lokasi');
            $table->foreignId('pegawai_id');
            $table->foreignId('status_id');
            $table->timestamps();

            // Foreign Key Relation
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade')->onUpdate('cascade');
>>>>>>> 9ffeb15ac4e0bd8a8e877ae7f296ff1514d2e0ca:database/migrations/2022_12_12_140308_create_presensis_table.php
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
