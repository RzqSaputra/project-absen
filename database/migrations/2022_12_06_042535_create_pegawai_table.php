<?php

use App\Models\Jabatan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->char('nip', 10)->unique();
            $table->string('nama');
            $table->date('tglLahir');
            $table->enum('jKel', ['Laki-laki', 'Perempuan'])->default('Laki-laki');
            $table->char('alamat');
            $table->char('noHp', 13);
            // $table->char('jabatan');
            $table->foreignId('jabatan_id');
            // $table->char('cabang');
            $table->foreignId('cabang_id');
            $table->timestamps();
            // Foreign Key Relation
            $table->foreign('jabatan_id')->references('id')->on('jabatan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cabang_id')->references('id')->on('cabang')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
