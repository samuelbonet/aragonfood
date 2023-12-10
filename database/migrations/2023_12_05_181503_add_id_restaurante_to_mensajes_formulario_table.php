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
        Schema::table('mensajes_formulario', function (Blueprint $table) {
            $table->foreignId('id_restaurante')->after('mensaje')->nullable()->constrained('restaurantes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mensajes_formulario', function (Blueprint $table) {
            $table->dropForeign(['id_restaurante']);
            $table->dropColumn('id_restaurante');
        });
    }
};
