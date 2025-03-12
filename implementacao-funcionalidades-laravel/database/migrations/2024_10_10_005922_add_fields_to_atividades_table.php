<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        public function up() {
        Schema::table('atividades', function (Blueprint $table) {
            $table->timestamp('data_submissao')->nullable(); // Data de submissão
            $table->timestamp('data_avaliacao')->nullable(); // Data de avaliação
            $table->string('situacao')->default('Em análise'); // Situação inicial
        });
    }

    public function down() {
        Schema::table('atividades', function (Blueprint $table) {
            $table->dropColumn('data_submissao');
            $table->dropColumn('data_avaliacao');
            $table->dropColumn('situacao');
        });
    }
};
