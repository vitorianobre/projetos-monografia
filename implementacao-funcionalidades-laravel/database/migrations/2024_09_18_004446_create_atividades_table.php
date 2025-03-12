<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('atividades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('acao_extensao');
            $table->string('tipo')->nullable();
            $table->integer('horas');
            $table->string('anexo');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('atividades');
    }
};
