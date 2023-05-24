<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupirsTable extends Migration
{
    public function up()
    {
        Schema::create('supirs', function (Blueprint $table) {
           
            $table->string('supirname');
            $table->string('Id_pegawai');
            $table->string('umur');
            $table->string('jenis_kelamin');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
