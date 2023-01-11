<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ApiCity::create([
            'name' => "Bengo",
            'key' => "bengo",
        ]);
        ApiCity::create([
            'name' => "Benguela",
            'key' => "bengue",
        ]);
        ApiCity::create([
            'name' => "Bié",
            'key' => "bie",
        ]);
        ApiCity::create([
            'name' => "Cabinda",
            'key' => "cabinda",
        ]);
        ApiCity::create([
            'name' => ">Cuando-Cubango",
            'key' => "cuandocub",
        ]);
        ApiCity::create([
            'name' => "Cunene",
            'key' => "cunene",
        ]);
        ApiCity::create([
            'name' => "Huambo",
            'key' => "huambo",
        ]);
        ApiCity::create([
            'name' => "Huíla",
            'key' => "huila",
        ]);
        ApiCity::create([
            'name' => "Kwanza Norte",
            'key' => "kwanzano",
        ]);
        ApiCity::create([
            'name' => "Luanda",
            'key' => "luanda",
        ]);
        ApiCity::create([
            'name' => "lundano",
            'key' => "Lunda Norte",
        ]);
        ApiCity::create([
            'name' => "Lunda Sul",
            'key' => "lundasu",
        ]);
        ApiCity::create([
            'name' => "Malanje",
            'key' => "malanje",
        ]);
        ApiCity::create([
            'name' => "Moxico",
            'key' => "moxico",
        ]);
        ApiCity::create([
            'name' => "Namibe",
            'key' => "mamibe",
        ]);
        ApiCity::create([
            'name' => "Uíge",
            'key' => "uige",
        ]);
        ApiCity::create([
            'name' => "Zaire",
            'key' => "zaire",
        ]);
                  
    }
}
