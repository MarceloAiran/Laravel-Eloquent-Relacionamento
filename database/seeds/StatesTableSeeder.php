<?php

use Illuminate\Database\Seeder;
use App\Models\State;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $states = [
            ['country_id' => '2', 'name'  => 'Pequim', 'initials'  =>  'PE'],
            ['country_id' => '2', 'name'  => 'Xangai', 'initials'  =>  'XA']
        ];

        foreach($states as $state){
            State::create($state);
        }
    }
}
