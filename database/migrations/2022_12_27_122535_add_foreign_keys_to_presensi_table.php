<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPresensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('presensi', function (Blueprint $table) {
            $table->foreign('pegawai_id', 'fk_presensi_to_pegawai')
            ->references('id')->on('pegawai')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('status_id', 'fk_presensi_to_status')
            ->references('id')->on('status')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('presensi', function (Blueprint $table) {
            $table->dropForeign('fk_presensi_to_pegawai');
            $table->dropForeign('fk_presensi_to_status');
        });
    }
}
