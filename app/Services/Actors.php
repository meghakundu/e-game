<?php

namespace App\Services;

class Actors
{
    public function getCharacters()
    {
         $httpClient = new \GuzzleHttp\Client();
    $request = $httpClient
                ->get("https://hp-api.onrender.com/api/characters");

        $response = json_decode($request->getBody()->getContents());

        return $response;
    }
}