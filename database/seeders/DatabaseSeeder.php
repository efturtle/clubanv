<?php

namespace Database\Seeders;

use App\Models\Club;
use App\Models\DirectorInfo;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(30)->create();
        //districts
        \App\Models\Distrito::factory(2)->create();

        //3 clubs
        Club::create([
            'nombreClub' => 'Centinelas',
            'significado' => 'Guardianes de Cristo',
            'iglesia' => 'Santa Cecilia',
            'secretario' => 'Tolan',
            'anciano' => 'ramses',
            'distrito_id' => 1,
        ]);
        Club::create([
            'nombreClub' => 'Franjas Rojas',
            'significado' => 'Arqueros de Cristo',
            'iglesia' => 'San Roberto',
            'secretario' => 'Adrian',
            'anciano' => 'roger',
            'distrito_id' => 2,
        ]);
        Club::create([
            'nombreClub' => 'Perros de las Bocinas',
            'significado' => 'Musica al cien',
            'iglesia' => 'San Crispin',
            'secretario' => 'Tocayo',
            'anciano' => 'paty',
            'distrito_id' => 1,
        ]);
        //directorinfos
        for ($i=1; $i < 11; $i++) { 
            \App\Models\DirectorInfo::factory()->create(['user_id' => $i]);
        }

        for ($i=11; $i < 31; $i++) { 
            //\App\Models\MiembrosInfo::factory()->create(['user_id' => $i]);    
        }
    }
}
