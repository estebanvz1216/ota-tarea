<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Perfil_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfil')->insert([
            'usuario'=>'Tobi',
            'descripcion'=>'vivo en popayan ',
            'hobby'=>'ver peliculas,animes',
            'gustos'=>'salir bastante con amigos',
            
        ]);
    }
}
