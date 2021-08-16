<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Comment;

class PolymorphicsController extends Controller
{
    public function polymorphic()
    {
        $city = City::where('name','São Paulo')->get()->first();
        echo "<br>Cidade - <b>{$city->name}:</b><br>";

        $commentsCity = $city->comments()->get();

        foreach ($commentsCity as $comment) {
            echo "{$comment->description}<hr>";
        }

        $state = State::where('name','São Paulo')->get()->first();
        echo "<br>Estado - <b>{$state->name}-{$state->initials}:</b><br>";

        $commentsState = $state->comments()->get();

        foreach ($commentsState as $comment) {
            echo "{$comment->description}<hr>";
        }

        $country = Country::where('name','Brazil')->get()->first();
        echo "<br>País - <b>{$country->name}:</b><br>";

        $commentsCountry = $country->comments()->get();

        foreach ($commentsCountry as $comment) {
            echo "{$comment->description}<hr>";
        }
    }

    public function polymorphicInsert()
    {
        // $city = City::where('name','São Paulo')->get()->first();

        // echo $city->name;

        // $comment = $city->comments()->create([
        //     "description" =>  "New Comment {$city->name}".date('YmdHis')
        // ]);

        // var_dump($comment);

        // $state = State::where('name','São Paulo')->get()->first();

        // echo $state->name;

        // $comment = $state->comments()->create([
        //     "description" =>  "New Comment {$state->name}".date('YmdHis')
        // ]);

        // var_dump($comment);

        $country = Country::where('name','Brazil')->get()->first();

        echo $country->name;

        $comment = $country->comments()->create([
            "description" =>  "New Comment {$country->name}".date('YmdHis')
        ]);

        var_dump($comment);
      
    }
}
