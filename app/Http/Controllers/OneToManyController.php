<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class OneToManyController extends Controller
{
    public function oneToMany()
    {
        // $country = Country::where('name','Brazil')->get()->first();
        $keySearch = 'a';
        // $countries = Country::where('name','LIKE', "%{$keySearch}%")->get();
        $countries = Country::where('name','LIKE', "%{$keySearch}%")->with('states')->get();

        foreach ($countries as $country) {
            echo "<br> {$country->name}";

            // $states = $country->states()->where('initials','Like','SP')->get();
            $states = $country->states();
            // $states = $country->states()->get();

            foreach($states as $state)
            {
                echo '<br>';
                echo "Inicial - {$state->initials} -- Estado - {$state->name}";
            }

            echo '<hr>';
        }
    }

    public function manyToOne()
    {
        $stateName = 'São Paulo';

        $state = State::where('name', $stateName)->get()->first();

        echo "<b> {$state->name} </br>";

        $country = $state->country;

        $country->name;

        echo "<br> Pais: {$country->name}";

    }

    public function oneToManyTwo()
    {
        // $country = Country::where('name','Brazil')->get()->first();
        $keySearch = '';
        // $countries = Country::where('name','LIKE', "%{$keySearch}%")->get();
        $countries = Country::where('name','LIKE', "%{$keySearch}%")->with('states')->get();

        foreach ($countries as $country) {
            echo "<br> {$country->name}";

            // $states = $country->states()->where('initials','Like','SP')->get();
            $states = $country->states;
            // $states = $country->states()->get();

            foreach($states as $state)
            {
                echo '<br>';
                echo "Inicial - {$state->initials} -- Estado - {$state->name} ";

                foreach ($state->cities as $city) {
                    echo "{$city->name}, ";
                }
                echo'<br>';
            }

            echo '<hr>';
        }

    }

    public function oneToManyInsert()
    {
        $dataForm = [
            'name' => 'Bahia',
            'initials' => 'BA'
        ];

        $country = Country::find(1);

        $insertState = $country->states()->create($dataForm);

        var_dump($insertState->name);

    }

    public function oneToManyInsertTwo()
    {
        $dataForm = [
            'name'       => 'Amazonas',
            'initials'   => 'AM',
            'country_id' => 1
        ];

        // $country = Country::find(1);

        $insertState = State::create($dataForm);

        var_dump($insertState->name);

    }

    public function hasManyThrough()
    {
        $country = Country::find(1);

        echo "<b>{$country->name}:</b> <br>";

        $cities = $country->cities;

        foreach ($cities as $city) {
            echo " {$city->name},";
        }

        echo "<br>Total Cidades: {$cities->count() }";
    }

}
