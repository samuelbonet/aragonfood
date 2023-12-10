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
        Schema::table('restaurantes', function (Blueprint $table) {
            $table->foreignId("id_poblacion")->after("poblacion")->nullable()->constrained("poblaciones");
            $table->dropColumn("poblacion");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('restaurantes', function (Blueprint $table) {
            //
            $table->dropForeign(["id_poblacion"]);
            $table->dropColumn("id_poblacion");
            $table->string("poblacion")->after("direccion");
        });
    }
};
