<?php

namespace App\Controller;

use App\Entity\Summoner;
use App\Form\SummFormType;
use App\Service\ChampionManager;
use App\Service\SummonerManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TaskController extends AbstractController
{
    /**
     * @Route("/task", name="task")
     */
    public function index(): Response
    {
        $champions = new ChampionManager;
        $dChampions = $champions->getPacket();
        $listFreeChamp = $dChampions->freeChampionIds;
        // $json = file_get_contents('http://ddragon.leagueoflegends.com/cdn/11.23.1/data/en_US/champion.json');
        // $champ = json_decode($json, true);
        // $nameChamp = $champ['data'];

        //dd($nameChamp);
        // foreach ($nameChamp as $name) {
        //     $img = $name['image']['full'];
        //     echo '<img src=http://ddragon.leagueoflegends.com/cdn/11.23.1/img/champion/' . $img . ' class="img-rounded">';
        // }
        return $this->render('task/index.html.twig', [
            'controller_name' => 'TaskController',
        ]);
    }


    /**
     * @Route("/task", name="task")
     */
    public function searchAction(Summoner $summoner = null, Request $request)
    {
        $form = $this->createForm(SummFormType::class, $summoner, []);
        $form->handleRequest($request);

        $data = $request->request->get('search');
        $summoner = new SummonerManager;
        $dSummoner = $summoner->getPacket($data);
        return $this->render('task/index.html.twig', array(
            'res' => $dSummoner,
        ));
    }
}
