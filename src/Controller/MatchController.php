<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Match;
use App\Entity\Team;
use App\Form\CreateMatchType;
use DateTime;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Player controller.
 * @Route("/api", name="api_")
 */
class MatchController extends FOSRestController
{
    /**
     * Lists all Matchs.
     * @Rest\Get("/match")
     *
     * @return Response
     */
    public function listMatchs()
    {
        $repository = $this->getDoctrine()->getRepository(Match::class);
        $matchs = $repository->findAll();
        return $this->handleView($this->view($matchs));
    }

    /**
     * Create Match.
     * @Rest\Post("/match")
     *
     * @return Response
     */
    public function createMatch(Request $request)
    {
        $match = new Match();
        $form = $this->createForm(CreateMatchType::class, $match);
        $data = json_decode($request->getContent(), true);
        //echo(json_encode($data));exit;
        //$dateTime = new DateTime($data["datage"]);
        //$match->setDatage($dateTime);

        $form->submit($data);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($match);
            $em->flush();
            return $this->handleView($this->view(['status' => 'ok'], Response::HTTP_CREATED));
        }                       


        return $this->handleView($this->view($form->getErrors()));
    }
}
