<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_treino', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('treino_id');
            $table->timestamps();
            $table->string("tipnome");
            $table->text("tipdescricao");
            $table->foreign('treino_id')
     ->references('id')->on('treino')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_treino');
    }
};
