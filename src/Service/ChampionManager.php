<?php

namespace App\Service;

class ChampionManager
{

    public static function getPacket()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request(
            'GET',
            'https://euw1.api.riotgames.com/lol/platform/v3/champion-rotations',
            ['verify' => false] //NE FAITES PAS CA A LA MAISON LES ENFANTS* !! 
        );

        $body = $res->getBody();
        $rawPacket = json_decode($body);
        return $rawPacket;
    }
}
