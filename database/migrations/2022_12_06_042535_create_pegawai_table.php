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
            $table->foreignId('jabatan_id')->nullable()->index('fk_pegawai_to_jabatan');
            $table->foreignId('cabang_id')->nullable()->index('fk_pegawai_to_cabang');
            $table->string('nama');
            $table->date('tglLahir');
            $table->enum('jKel', ['Laki-laki', 'Perempuan'])->default('Laki-laki');
            $table->char('alamat')->nullable();;
            $table->char('noHp', 13)->nullable();;            
            $table->timestamps();
            $table->softDeletes();
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
