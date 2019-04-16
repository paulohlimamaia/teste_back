<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refris', function (Blueprint $table) {
            $table->bigIncrements('id_refri');
            $table->string('marca')->nullable();
            $table->string('litragem')->nullable();
            $table->string('tipo')->nullable();
            $table->integer('quantidade')->nullable();
            $table->string('valor_unidade')->nullable();
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
        Schema::dropIfExists('refris');
    }
}
