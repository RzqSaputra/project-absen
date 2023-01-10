<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pegawai', function (Blueprint $table) {
            $table->foreign('jabatan_id', 'fk_pegawai_to_jabatan')
            ->references('id')->on('jabatan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cabang_id', 'fk_pegawai_to_cabang')
            ->references('id')->on('cabang')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id', 'fk_pegawai_to_users')
            ->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pegawai', function (Blueprint $table) {
            $table->dropForeign('fk_pegawai_to_jabatan');
            $table->dropForeign('fk_pegawai_to_cabang');
            $table->dropForeign('fk_pegawai_to_users');
        });
    }
}
