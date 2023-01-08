<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->string("titulo",100);
            $table->unsignedBigInteger("id_categoria")->nullable();
            $table->foreign("id_categoria")->references("id")
            ->on("categorias")->onDelete("set null");
            $table->integer("agno_estreno");
            $table->float("precio_renta");
            $table->float("precio_compra");
            $table->integer("cantidad_disponible");
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
        Schema::dropIfExists('peliculas');
    }
}
