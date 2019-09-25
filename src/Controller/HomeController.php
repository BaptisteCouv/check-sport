<?php

namespace App\Controller;

use DateTime;
use App\Entity\Match;
use App\Entity\Player;
use App\Entity\Team;
use App\Repository\MatchRepository;
use App\Repository\TeamRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(MatchRepository $matchRepository)
    {
        // Liste tous les matchs de la table match, on trie chaque match par date
        $getMatchs = $matchRepository->findBy([], ['datage' => 'DESC']);

        dd($getMatchs); 
        // return $this->render('home/index.html.twig', [
        //     'controller_name' => 'HomeController',
        // ]);
    }


}
