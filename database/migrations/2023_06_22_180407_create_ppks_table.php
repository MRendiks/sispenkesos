<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('jenis_kelamin');
            $table->string('tanggal_lahir');
            $table->string('pendidikan');
            $table->bigInteger('id_kecamatan')->unsigned();
            $table->bigInteger('id_kelurahan')->unsigned();
            $table->text('alamat');
            $table->bigInteger('id_jenis_ppks')->unsigned();
            $table->bigInteger('id_detail_ppks')->unsigned();
            $table->string('jaminan_kesehatan');
            $table->string('pekerjaan');
            $table->text('keterangann');
            $table->bigInteger('id_foto')->unsigned();
            $table->enum('status', ['verifikasi', 'ACC']);
            $table->timestamps();

            $table->foreign('id_kecamatan')
            ->references('id_kecamatan')->on('kecamatan')
            ->onDelete('cascade');

            $table->foreign('id_kelurahan')
            ->references('id_kelurahan')->on('kelurahan')
            ->onDelete('cascade');

            $table->foreign('id_jenis_ppks')
            ->references('jenis_ppks_id')->on('jenis_ppks')
            ->onDelete('cascade');

            $table->foreign('id_detail_ppks')
            ->references('id_detail_ppks')->on('detail_jenis')
            ->onDelete('cascade');

            $table->foreign('id_foto')
            ->references('id_foto')->on('foto')
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
        Schema::dropIfExists('ppks');
    }
};
