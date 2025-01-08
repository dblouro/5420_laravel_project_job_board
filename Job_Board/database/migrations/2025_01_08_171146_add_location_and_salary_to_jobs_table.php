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
        Schema::table('jobs', function (Blueprint $table) {
            //add de novas colunas
            $table->string('location')->nullable(); // Adiciona a coluna location
            $table->decimal('salary', 10, 2)->nullable(); // Adiciona a coluna salary
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn(['location', 'salary']);
        });
    }
};
