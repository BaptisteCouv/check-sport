<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Entity\Team;
use App\Form\RegisterType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Team controller.
 * @Route("/api", name="api_")
 */
class TeamController extends FOSRestController
{
    /**
     * Lists all Teams.
     * @Rest\Get("/teams")
     *
     * @return Response
     */
    public function getTeamAction()
    {
        $repository = $this->getDoctrine()->getRepository(Team::class);
        $teams = $repository->findAll();
        return $this->handleView($this->view($teams));
    }

    /**
     * Create Team.
     * @Rest\Post("/team")
     *
     * @return Response
     */
    public function postTeamAction(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $team = new Team();
        $form = $this->createForm(RegisterType::class, $team);
        $data = json_decode($request->getContent(), true);
        //echo(json_encode($data));exit;

        $form->submit($data);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($team);
            $em->flush();
            return $this->handleView($this->view(['status' => 'ok'], Response::HTTP_CREATED));
        }

        return $this->handleView($this->view($form->getErrors()));
    }
}
