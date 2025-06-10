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
        Schema::create('tbpessoa', function (Blueprint $table) {
            $table->id('pescodigo');
            $table->string('pesnome',255)->nullable(false);
            $table->timestamp('pesdatanascimento')->nullable(false);
            $table->foreignId('cidcodigo')->constrained('tbcidade', 'cidcodigo')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbpessoa');
    }
};
