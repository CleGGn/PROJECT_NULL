<?php

use App\Entity\Champion;
use App\Service\ChampionManager;

class ChampionTender
{

    /** 
     * @input Array $packet : packet fetched from API 
     * @return array beer list (name+description) 
     */

    function filterPacket(): array
    {
        $championsName = [];
        $packet = ChampionManager::getPacket();

        //Extract needed params for each object 
        for ($i = 0; $i < count($packet); $i++) {
            $temp = new Champion;
            $temp->setName($packet[$i]->name);
            //Push the beers into $temp 
            array_push($championsName, $temp);
        }
        return $championsName;
    }


    /** 
     * @return array : champion list (name+name) 
     */

    public function filterChampionList(): array
    {
        $FilteredChampionNameList = $this->filterPacket();
        $championListName = [];

        for ($i = 0; $i < count($FilteredChampionNameList); $i++) {
            array_push($championListName, [$FilteredChampionNameList[$i]
                ->getName() => $FilteredChampionNameList[$i]->getName()]);
        }
        return $championListName;
    }
}
