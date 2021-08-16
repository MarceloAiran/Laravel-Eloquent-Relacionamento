<?php

use Illuminate\Database\Seeder;
Use App\Models\Company;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            [ 'name'  => 'Evolution'],
            [ 'name'  => 'New World'],

        ];

        foreach($companies as $companie){
            Company::create($companie);
        }
    }
}
