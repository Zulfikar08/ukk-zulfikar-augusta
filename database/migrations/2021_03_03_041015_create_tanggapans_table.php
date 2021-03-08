<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanggapansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggapans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pengaduan_id')->unsigned();
            $table->date('tgl_tanggapan');
            $table->text('isi_tanggapan');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('tanggapans', function (Blueprint $table) {
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->foreign('pengaduan_id')
            ->references('id')
            ->on('pengaduans')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanggapans');
    }
}
