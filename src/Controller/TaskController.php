<?php

namespace App\Controller;

use App\Service\ChampionManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    /**
     * @Route("/task", name="task")
     */
    public function index(): Response
    {
        $champions = new ChampionManager;
        $dChampions = $champions->getPacket();

        $currChamp = 'Neeko';

        $dChampions = file_get_contents("http://ddragon.leagueoflegends.com/cdn/11.23.1/data/fr_FR/champion/" . $currChamp . ".json");
        $rawPacket = json_decode($dChampions);

        // dd($rawPacket);
        dd($rawPacket['data'], [$currChamp], ['image'], ['full']);



        // dd($rawPacket);
        return $this->render('task/index.html.twig', [
            'controller_name' => 'TaskController',
        ]);
    }
}
