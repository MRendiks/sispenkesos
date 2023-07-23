<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKecamatanTable extends Migration
{
    public function up()
    {
        Schema::create('kecamatan', function (Blueprint $table) {
            $table->id('id_kecamatan');
            $table->string('nama_kecamatan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kecamatan');
    }
}
