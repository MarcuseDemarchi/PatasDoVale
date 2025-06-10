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
        Schema::create('tbcontatopessoa', function (Blueprint $table) {
            $table->id('ctpcodigo');
            $table->unsignedSmallInteger('tcocodigo');
            $table->foreign('tcocodigo')->references('tcocodigo')->on('tbtipocontato')->onDelete('restrict');
            $table->unsignedBigInteger('pescodigo');
            $table->foreign('pescodigo')->references('pescodigo')->on('tbpessoa')->onDelete('cascade');            
            $table->string('ctpdescricao', 240);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbcontatopessoa');
    }
};
