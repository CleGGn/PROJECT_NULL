<?php

namespace App\Service;

use GuzzleHttp\Client;

class ChampionManager
{

    public static function getPacket()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request(
            'GET',
            'https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/ElPoivrot?api_key=RGAPI-c61cb607-66c2-4cc7-850a-60b5a3c2beeb',
            ['verify' => false] //NE FAITES PAS CA A LA MAISON LES ENFANTS* !!

        );

        $body = $res->getBody();
        $rawPacket = json_decode($body);
        return $rawPacket;
    }
}
