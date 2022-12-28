 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD:database/migrations/2022_12_12_140425_create_task_table.php
            $table->foreignId('id_pegawai')->nullable()->index('fk_task_to_pegawai');
=======
            $table->foreignId('pegawai_id');
>>>>>>> 9ffeb15ac4e0bd8a8e877ae7f296ff1514d2e0ca:database/migrations/2022_12_12_140425_create_tasks_table.php
            $table->char('namaTask');
            $table->datetime('mulaiTask');
            $table->datetime('selesaiTask');
            $table->string('keterangan');
            $table->timestamps();
<<<<<<< HEAD:database/migrations/2022_12_12_140425_create_task_table.php
            $table->softDeletes();
=======

            // Foreign Key Relation
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade')->onUpdate('cascade');
>>>>>>> 9ffeb15ac4e0bd8a8e877ae7f296ff1514d2e0ca:database/migrations/2022_12_12_140425_create_tasks_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task');
    }
}
