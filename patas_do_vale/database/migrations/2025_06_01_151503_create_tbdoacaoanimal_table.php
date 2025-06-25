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
        Schema::create('tbdoacaoanimal', function (Blueprint $table) {
            $table->id('doacodigo');
            $table->unsignedBigInteger('pescodigo');
            $table->foreign('pescodigo')->references('pescodigo')->on('tbpessoa')->onDelete('restrict');
            $table->unsignedBigInteger('anicodigo');
            $table->foreign('anicodigo')->references('anicodigo')->on('tbanimais')->onDelete('restrict');
            $table->date('doadata');
            $table->string('doaobservacao', 255)->nullable();
            $table->unsignedBigInteger('anicodigo')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbdoacaoanimal');
    }
};
