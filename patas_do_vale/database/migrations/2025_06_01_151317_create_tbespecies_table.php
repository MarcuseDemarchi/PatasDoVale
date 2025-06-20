<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbespecies', function (Blueprint $table) {
            $table->id('espcodigo');
            $table->string('espnome', 100)->nullable(false);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbespecie');
    }
};
