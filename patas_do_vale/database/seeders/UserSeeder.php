<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::Table('users')->insert([
            'name' => 'Patas do Vale',
            'email' => 'suporte@patasdovale.com',
            'password' => Hash::make('!Patasdovale123')
        ]);
    }
}