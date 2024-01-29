<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AthleteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * create seeder:: php artisan make:seeder AthletesTableSeeder
     * run    seeder:: php artisan db:seed --class=AthleteTableSeeder
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Athlete::insert(
            [
                [
                    'name' => 'Rener',
                    'surname' => 'Renin',
                    'date_birth' => '1989-07-07',
                    'cell_phone' => '99423-1391',
                    'active' => 1,
                    'goalkeeper' => 1,
                ],
                [ 
                    'name' => 'Pelézin',
                    'surname' => 'Pelézin',
                    'date_birth' => '1990-12-30',
                    'cell_phone' => '99442-3090',
                    'active' => 1,
                    'goalkeeper' => 0,
                ],
                [ 
                    'name' => 'Thiago',
                    'surname' => 'Thiago',
                    'date_birth' => '1990-12-30',
                    'cell_phone' => '99427-6500',
                    'active' => 1,
                    'goalkeeper' => 0,
                ],
                [ 
                    'name' => 'Rafael',
                    'surname' => 'Tião',
                    'date_birth' => '1995-03-02',
                    'cell_phone' => '98162-7936',
                    'active' => 1,
                    'goalkeeper' => 0,
                ],
                [ 
                    'name' => 'Patrick',
                    'surname' => 'Patrick',
                    'date_birth' => '1991-08-05',
                    'cell_phone' => '99204-4693',
                    'active' => 1,
                    'goalkeeper' => 0,
                ],
                [ 
                    'name' => 'Luciano',
                    'surname' => 'Luh',
                    'date_birth' => '1986-02-22',
                    'cell_phone' => '99236-3450',
                    'active' => 1,
                    'goalkeeper' => 0,
                ],
                [ 
                    'name' => 'Gustavo Brito',
                    'surname' => 'Gustavo',
                    'date_birth' => '1990-12-30',
                    'cell_phone' => '99260-3367',
                    'active' => 1,
                    'goalkeeper' => 0,
                ],
                [ 
                    'name' => 'Giovani De Carlo',
                    'surname' => 'Gio',
                    'date_birth' => '1995-11-28',
                    'cell_phone' => '99362-8747',
                    'active' => 1,
                    'goalkeeper' => 0,
                ],
                [ 
                    'name' => 'Diego Torres',
                    'surname' => 'Dieguin',
                    'date_birth' => '1992-04-30',
                    'cell_phone' => '99363-4254',
                    'active' => 1,
                    'goalkeeper' => 0,
                ],
                [ 
                    'name' => 'Alysson',
                    'surname' => 'Alysson',
                    'date_birth' => '2001-06-27',
                    'cell_phone' => '99408-2799',
                    'active' => 1,
                    'goalkeeper' => 0,
                ],
                [ 
                    'name' => 'Noelcio',
                    'surname' => 'Nonô',
                    'date_birth' => '1971-04-16',
                    'cell_phone' => '99137-2620',
                    'active' => 1,
                    'goalkeeper' => 0,
                ],
                [ 
                    'name' => 'Douglas',
                    'surname' => 'Douglão',
                    'date_birth' => '1990-12-30',
                    'cell_phone' => '99282-1076',
                    'active' => 1,
                    'goalkeeper' => 1,
                ],
                [ 
                    'name' => 'Everton Teixeira',
                    'surname' => 'Tim',
                    'date_birth' => '1982-12-01',
                    'cell_phone' => '98365-9915',
                    'active' => 1,
                    'goalkeeper' => 0,
                ],
                [
                    'name' => 'Edigleison',
                    'surname' => 'Edigleison',
                    'date_birth' => '1985-04-07',
                    'cell_phone' => '99133-5152',
                    'active' => 1,
                    'goalkeeper' => 0,
                ],
                [
                    'name' => 'Denner Alan',
                    'surname' => 'Denner',
                    'date_birth' => '1982-02-27',
                    'cell_phone' => '99152-0177',
                    'active' => 1,
                    'goalkeeper' => 0,
                ],
                [
                    'name' => 'Luiz Fernando',
                    'surname' => 'Luiz',
                    'date_birth' => '1990-10-17',
                    'cell_phone' => '99358-1511',
                    'active' => 1,
                    'goalkeeper' => 0,
                ],
                [
                    'name' => 'Fabio',
                    'surname' => 'Fabin',
                    'date_birth' => '1990-07-17',
                    'cell_phone' => '98438-1940',
                    'active' => 1,
                    'goalkeeper' => 0,
                ],
                [
                    'name' => 'André',
                    'surname' => 'André',
                    'date_birth' => '1990-10-12',
                    'cell_phone' => '98845-3927',
                    'active' => 1,
                    'goalkeeper' => 0,
                ],
                [
                    'name' => 'Thales',
                    'surname' => 'Thales',
                    'date_birth' => '1994-06-23',
                    'cell_phone' => '99403-4065',
                    'active' => 1,
                    'goalkeeper' => 1,
                ],
                [
                    'name' => 'Nilvanio Leifi',
                    'surname' => 'Vanin',
                    'date_birth' => '1974-08-16',
                    'cell_phone' => '99118-0769',
                    'active' => 1,
                    'goalkeeper' => 0,
                ],
                [
                    'name' => 'Denis Ferreira',
                    'surname' => 'Dênis',
                    'date_birth' => '1993-09-21',
                    'cell_phone' => '99118-0769',
                    'active' => 1,
                    'goalkeeper' => 0,
                ],
                // [
                //     'name' => 'Jealison Santos',
                //     'surname' => 'Jê',
                //     'date_birth' => '1993-08-23',
                //     'cell_phone' => '99408-2272',
                //     'active' => 1,
                //     'goalkeeper' => 0,
                // ],
                // [
                //     'name' => 'Cleverson Santos',
                //     'surname' => 'Clevin',
                //     'date_birth' => '1987-07-02',
                //     'cell_phone' => '99223-8606',
                //     'active' => 1,
                //     'goalkeeper' => 0,
                // ],
                [
                    'name' => 'Murilo Guilherme',
                    'surname' => 'Murilo',
                    'date_birth' => '1990-08-28',
                    'cell_phone' => '99242-2653',
                    'active' => 1,
                    'goalkeeper' => 0,
                ],
                [
                    'name' => 'Denis Maicon',
                    'surname' => 'Manico',
                    'date_birth' => '1990-12-14',
                    'cell_phone' => '99262-4141',
                    'active' => 1,
                    'goalkeeper' => 0,
                ],
                [
                    'name' => 'Denis Oliver',
                    'surname' => 'Denão',
                    'date_birth' => '1994-12-09',
                    'cell_phone' => '99190-9284',
                    'active' => 1,
                    'goalkeeper' => 0,
                ]
            ]
        );
    }
}


















