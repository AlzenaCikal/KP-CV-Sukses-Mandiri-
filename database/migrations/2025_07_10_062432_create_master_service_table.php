<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterServiceTable extends Migration
{
    public function up()
    {
        Schema::create('master_service', function (Blueprint $table) {
            $table->id();
            $table->string('nama_service');
            $table->string('jenis_mesin');
            $table->string('estimasi');
            $table->integer('harga');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('master_service');
    }
};
