<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutomovelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('automovels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('nome');
            $table->integer('ano');
            $table->string('modelo');
            $table->string('cor');
            $table->string('numero_chassi');
            $table->string('categoria');
            $table->unsignedBigInteger('id_filial');
            $table->foreign('id_filial')->references('id')->on('filials');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('automovels');
    }
}
