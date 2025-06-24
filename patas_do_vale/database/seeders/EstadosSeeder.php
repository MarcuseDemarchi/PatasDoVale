<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbestado')->insert([
            ['estnome' => 'Acre', 'estsigla' => 'AC', 'paicodigo' => 26],
            ['estnome' => 'Alagoas', 'estsigla' => 'AL', 'paicodigo' => 26],
            ['estnome' => 'Amapá', 'estsigla' => 'AP', 'paicodigo' => 26],
            ['estnome' => 'Amazonas', 'estsigla' => 'AM', 'paicodigo' => 26],
            ['estnome' => 'Bahia', 'estsigla' => 'BA', 'paicodigo' => 26],
            ['estnome' => 'Ceará', 'estsigla' => 'CE', 'paicodigo' => 26],
            ['estnome' => 'Distrito Federal', 'estsigla' => 'DF', 'paicodigo' => 26],
            ['estnome' => 'Espírito Santo', 'estsigla' => 'ES', 'paicodigo' => 26],
            ['estnome' => 'Goiás', 'estsigla' => 'GO', 'paicodigo' => 26],
            ['estnome' => 'Maranhão', 'estsigla' => 'MA', 'paicodigo' => 26],
            ['estnome' => 'Mato Grosso', 'estsigla' => 'MT', 'paicodigo' => 26],
            ['estnome' => 'Mato Grosso do Sul', 'estsigla' => 'MS', 'paicodigo' => 26],
            ['estnome' => 'Minas Gerais', 'estsigla' => 'MG', 'paicodigo' => 26],
            ['estnome' => 'Pará', 'estsigla' => 'PA', 'paicodigo' => 26],
            ['estnome' => 'Paraíba', 'estsigla' => 'PB', 'paicodigo' => 26],
            ['estnome' => 'Paraná', 'estsigla' => 'PR', 'paicodigo' => 26],
            ['estnome' => 'Pernambuco', 'estsigla' => 'PE', 'paicodigo' => 26],
            ['estnome' => 'Piauí', 'estsigla' => 'PI', 'paicodigo' => 26],
            ['estnome' => 'Rio de Janeiro', 'estsigla' => 'RJ', 'paicodigo' => 26],
            ['estnome' => 'Rio Grande do Norte', 'estsigla' => 'RN', 'paicodigo' => 26],
            ['estnome' => 'Rio Grande do Sul', 'estsigla' => 'RS', 'paicodigo' => 26],
            ['estnome' => 'Rondônia', 'estsigla' => 'RO', 'paicodigo' => 26],
            ['estnome' => 'Roraima', 'estsigla' => 'RR', 'paicodigo' => 26],
            ['estnome' => 'Santa Catarina', 'estsigla' => 'SC', 'paicodigo' => 26],
            ['estnome' => 'São Paulo', 'estsigla' => 'SP', 'paicodigo' => 26],
            ['estnome' => 'Sergipe', 'estsigla' => 'SE', 'paicodigo' => 26],
            ['estnome' => 'Tocantins', 'estsigla' => 'TO', 'paicodigo' => 26],
            ['estnome' => 'Outro estado', 'estsigla' => 'XX', 'paicodigo' => 26]
        ]);
    }
}
