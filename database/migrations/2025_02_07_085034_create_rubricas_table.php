<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRubricasTable extends Migration
{
    public function up()
    {
        Schema::create('rubricas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('titulo');
            $table->text('descripcion');
            $table->boolean('claridad');
            $table->boolean('comentario');
            $table->json('preguntas'); // Usamos JSON para almacenar las preguntas y puntuaciones
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rubricas');
    }
}
