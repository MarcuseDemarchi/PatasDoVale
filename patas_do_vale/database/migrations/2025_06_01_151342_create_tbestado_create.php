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
        Schema::create('tbestado', function (Blueprint $table) {
            $table->smallIncrements('estcodigo');
            $table->string('estnome', 100);
            $table->char('estsigla', 2);
            $table->unsignedSmallInteger('paicodigo');
            $table->foreign('paicodigo')->references('paicodigo')->on('tbpais')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbestado_create');
    }
};
