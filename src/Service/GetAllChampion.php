<?php

use App\Entity\Champion;
use App\Service\ChampionManager;
/**
 *@param
 *@out : tableau avec les champions qui contient d'autre tableau avec plein de trucs.
 */
class GetAllChampion {
    public function getJsonAllChampions (): array
    {
        //Appel de l'Api Riot game (https://developer.riotgames.com/)
        $json = file_get_contents('http://ddragon.leagueoflegends.com/cdn/11.23.1/data/en_US/champion.json' );
        $champ = json_decode($json, true);
        $nameChamp = $champ['data'];
        $tImg = [];
        //Push un tableau avec les liens des images sur l'api riot
        foreach($nameChamp as $name)
          {
              $img = $name['image']['full'];
              array_push($tImg, 'http://ddragon.leagueoflegends.com/cdn/11.23.1/img/champion/'. $img);

          }
        return $tImg;
    }

}
