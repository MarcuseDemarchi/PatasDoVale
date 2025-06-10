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
        Schema::create('tbanimais', function (Blueprint $table) {
            $table->id('anicodigo');
            $table->string('anipelido',255)->nullable(false);
            $table->smallinteger('aniespecie')->nullable(false);
            $table->decimal('anipeso',total : 4, places : 2)->nullable(false);
            $table->smallinteger('aniporte')->nullable(false)->comment(' 1 - Pequeno porte | 2 - Medio Porte | 3 - Grande Porte');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbanimais');
    }
};
