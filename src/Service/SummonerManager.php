<?php

namespace App\Service;

use GuzzleHttp\Client;

class SummonerManager
{

    public static function getPacket($summoner)
    {
        $client = new Client();


        $res = $client->request(
            'GET',
            'https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/' . $summoner . '?api_key=RGAPI-fa49d1c7-1b25-4d1a-94af-6fcde62130ab',
            ['verify' => false] //NE FAITES PAS CA A LA MAISON LES ENFANTS* !!
        );

        $body = $res->getBody();
        $rawPacket = json_decode($body);

        return dd($rawPacket);
    }
}
