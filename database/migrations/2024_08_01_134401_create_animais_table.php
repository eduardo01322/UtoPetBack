<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animais', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100)->nullable(false);
            $table->string('idade',20)->nullable(false);
            $table->string('sexo',10)->nullable(false);
            $table->string('raca',100)->nullable(false);
            $table->string('descricao',255)->nullable(false);
            $table->string('vacina',50)->nullable(false);
            $table->string('castracao',50)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animais');
    }
};
