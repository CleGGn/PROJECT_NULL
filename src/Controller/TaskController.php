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


        //Envoie sur le twig mon tableau de lien vers les images de l'Api
        $getAllChamp = new \GetAllChampion();
        $nameChamp = $getAllChamp->getJsonAllChampions();


        return $this->render('task/index.html.twig', [
            'controller_name' => 'TaskController',
            'nameChamp' => $nameChamp
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
