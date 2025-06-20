<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspeciesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbespecies')->insert([
            ['espnome' => 'Cachorro'],
            ['espnome' => 'Gato'],
            ['espnome' => 'Pássaro'],
            ['espnome' => 'Coelho'],
            ['espnome' => 'Outros']
        ]);
    }
}
