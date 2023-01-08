<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialRentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_rentas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_usuario");
            $table->foreign("id_usuario")->references("id")
            ->on("users")->onDelete("cascade");
            $table->unsignedBigInteger("id_pelicula");
            $table->foreign("id_pelicula")->references("id")
            ->on("peliculas")->onDelete("cascade");
            $table->boolean("devuelta");
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
        Schema::dropIfExists('historial_rentas');
    }
}
