<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OppossingTeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * create seeder:: php artisan make:seeder TeamsTableSeeder
     * run    seeder:: php artisan db:seed --class=OppossingTeamTableSeeder
     *
     * @return void
     */
    public function run()
    {
        \App\Models\OppossingTeam::insert(
            [
                [
                    'name' => 'Borracharia',
                    'responsible' => 'Não informado',
                    'cell_phone' => '16999999999',
                    'active' => 1
                ],
                [
                    'name' => 'Toca e Passa FC',
                    'responsible' => 'Não informado',
                    'cell_phone' => '16999999999',
                    'active' => 1
                ],
                [
                    'name' => 'Furacão FC',
                    'responsible' => 'Não informado',
                    'cell_phone' => '16999999999',
                    'active' => 1
                ],
                [
                    'name' => 'Master FC',
                    'responsible' => 'Não informado',
                    'cell_phone' => '16999999999',
                    'active' => 1
                ],
                [
                    'name' => 'Rejeitados',
                    'responsible' => 'Não informado',
                    'cell_phone' => '16999999999',
                    'active' => 1
                ],
                [
                    'name' => 'Arsenal DC',
                    'responsible' => 'Não informado',
                    'cell_phone' => '16999999999',
                    'active' => 1
                ],
                [
                    'name' => 'Mega Star',
                    'responsible' => 'Não informado',
                    'cell_phone' => '16999999999',
                    'active' => 1
                ],
                [
                    'name' => 'Amigos FC',
                    'responsible' => 'Não informado',
                    'cell_phone' => '16999999999',
                    'active' => 1
                ],
                [
                    'name' => 'Manchester',
                    'responsible' => 'Não informado',
                    'cell_phone' => '16999999999',
                    'active' => 1
                ],
                [
                    'name' => 'Grêmio SJ',
                    'responsible' => 'Não informado',
                    'cell_phone' => '16999999999',
                    'active' => 1
                ],
                [
                    'name' => 'Porto FC',
                    'responsible' => 'Não informado',
                    'cell_phone' => '16999999999',
                    'active' => 1
                ],
                [
                    'name' => 'Lado 2',
                    'responsible' => 'Não informado',
                    'cell_phone' => '16999999999',
                    'active' => 1
                ],
                [
                    'name' => 'R Portinari',
                    'responsible' => 'Não informado',
                    'cell_phone' => '16999999999',
                    'active' => 1
                ],
                [
                    'name' => 'RB Franca',
                    'responsible' => 'Não informado',
                    'cell_phone' => '16999999999',
                    'active' => 1
                ],
                [
                    'name' => 'Família FC',
                    'responsible' => 'Não informado',
                    'cell_phone' => '16999999999',
                    'active' => 1
                ],
                [
                    'name' => 'Redentor',
                    'responsible' => 'Não informado',
                    'cell_phone' => '16999999999',
                    'active' => 1
                ],
                [
                    'name' => 'Renovados',
                    'responsible' => 'Não informado',
                    'cell_phone' => '16999999999',
                    'active' => 1
                ],
                [
                    'name' => 'Valente FC',
                    'responsible' => 'Não informado',
                    'cell_phone' => '16999999999',
                    'active' => 1
                ],
                [
                    'name' => 'Verona',
                    'responsible' => 'Não informado',
                    'cell_phone' => '16999999999',
                    'active' => 1
                ],
                [
                    'name' => 'Manchester City',
                    'responsible' => 'Não informado',
                    'cell_phone' => '16999999999',
                    'active' => 1
                ],
                [
                    'name' => 'Paris Franca',
                    'responsible' => 'Não informado',
                    'cell_phone' => '16999999999',
                    'active' => 1
                ],
                [
                    'name' => 'Silverado FC',
                    'responsible' => 'Não informado',
                    'cell_phone' => '16999999999',
                    'active' => 1
                ],
                [
                    'name' => 'Família Silva',
                    'responsible' => 'Não informado',
                    'cell_phone' => '16999999999',
                    'active' => 1
                ]
            ]
        );
    }
}
