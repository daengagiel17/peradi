<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('no_hp')->nullable();
            $table->string('nia')->nullable();
            $table->string('alamat_kantor')->nullable();
            $table->string('photo')->default('img/advokat.jpg');
            $table->string('kecamatan_id')->nullable();
            $table->string('status')->default('aktif');
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggotas');
    }
}
