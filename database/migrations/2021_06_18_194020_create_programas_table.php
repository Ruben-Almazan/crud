<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programas', function (Blueprint $table) {
            $table->id();
            $table->string('calendario', 6);
            $table->integer('folio');
            $table->string('programa');
            $table->string('dependencia'); 
            $table->string('titular');
            /*$table->id();
            $table->string('nombre_titular', 6);
            $table->integer('cabana');
            $table->string('telefono');
            $table->string('dias'); 
            $table->string('precio');
            $table->timestamps();*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programas');
    }
}
