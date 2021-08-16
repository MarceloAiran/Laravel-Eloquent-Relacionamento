<?php

use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            ['state_id' => '1', 'name'  => 'São Paulo'],
            ['state_id' => '1', 'name'  => 'Guarulhos'],
            ['state_id' => '1', 'name'  => 'Campinas'],
            ['state_id' => '1', 'name'  => 'São bernando do Campo'],
            ['state_id' => '1', 'name'  => 'Osasco'],

        ];

        foreach($cities as $city){
            City::create($city);
        }
    }
}
