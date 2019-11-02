<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Entity\Player;
use App\Form\RegisterType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Player controller.
 * @Route("/api", name="api_")
 */
class PlayerController extends FOSRestController
{
    /**
     * Lists all Players.
     * @Rest\Get("/players")
     *
     * @return Response
     */
    public function getPlayerAction()
    {
        $repository = $this->getDoctrine()->getRepository(Player::class);
        $players = $repository->findAll();
        return $this->handleView($this->view($players));
    }

    /**
     * Create Player.
     * @Rest\Post("/player")
     *
     * @return Response
     */
    public function postPlayerAction(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $player = new Player();
        $form = $this->createForm(RegisterType::class, $player);
        $data = json_decode($request->getContent(), true);
        //echo(json_encode($data));exit;

        $form->submit($data);
        
        if ($form->isValid()) {
            $hash = $encoder->encodePassword($player, $player->getPassword());
            $player->setPassword($hash);

            $player->setRoles(["ROLE_USER", "ROLE_PLAYER"]);

            $em = $this->getDoctrine()->getManager();
            $em->persist($player);
            $em->flush();
            return $this->handleView($this->view(['status' => 'ok'], Response::HTTP_CREATED));
        }

        return $this->handleView($this->view($form->getErrors()));
    }
}
