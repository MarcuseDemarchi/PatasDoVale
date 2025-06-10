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
        Schema::create('tbpais', function (Blueprint $table) {
            $table->smallIncrements('paicodigo'); // Chave primária smallint auto-incrementada
            $table->string('painome', 100);
            $table->char('paisigla', 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbpais');
    }
};
