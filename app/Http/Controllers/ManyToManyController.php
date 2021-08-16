<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Company;

class ManyToManyController extends Controller
{
    public function manyToMany()
    {
        $city = City::where('name','São Paulo')->get()->first();

        echo "<b>{$city->name}:</b><br>";

        $companies = $city->companies;

        foreach ($companies as $company) {
            echo "{$company->name},";
        }

    }

    public function manyToManyInverse()
    {
        $company = Company::where('name','Evolution')->get()->first();

        echo "A empresa: <b>{$company->name}:</b><br>";

        $cities = $company->cities;

        foreach ($cities as $city) {
            echo "Fica em - {$city->name},";
        }
    }

    public function manyToManyInsert()
    {
        $companyCity = [2];

        $company = Company::find(1);

        echo "<b>{$company->name}:</b><br>";

        // ADICIONA OS VALORES 
        $company->cities()->attach($companyCity);
        
        // SINCRONIZA OS VALORES
        // $company->cities()->sync($companyCity);

        // DELETA OS VALORES ENVIADOS
        // $company->cities()->detach($companyCity);

        $cities = $company->cities;

        echo"Cidades: ";
        foreach($cities as $city)
        {
            echo" {$city->name},";
        }

    }
}
