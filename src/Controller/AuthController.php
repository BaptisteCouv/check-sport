<?php

namespace App\Controller;

use App\Entity\Player;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AuthController extends AbstractController
{
    /**
     * @Route("/auth", name="auth")
     */
    public function index(Request $request, ObjectManager $objectManager, UserPasswordEncoderInterface $encoder)
    {
        dd($request);
        // dd($request->request->get('name'));
        $player = new Player();

        $player->setName($request->request->get('name'));
        $player->setFirstName($request->request->get('firstname'));
        $player->setEmail($request->request->get('email'));
        $player->setPassword($request->request->get('password'));
        $player->setBirthDate(new \DateTime());

        $hash = $encoder->encodePassword($player, $player->getPassword());
        $player->setPassword($hash);

        $objectManager->persist($player);
        $objectManager->flush();

        return $this->redirect('http://localhost:3000/LogIn');
    }

    /**
     *   @Route("/connection", name="connection")
     */
    public function connection()
    {
        // return $this->redirect('http://localhost:3000/LogIn');
    }

    /**
     * @Route("/connectionuser", name="connectionuser")
     */
    public function connectionuser(UserInterface $user)
    {
        // On récupère les données de la connection
        $playerName = $user->getName();

        // On transmet les données au template twig
        return new JsonResponse([
            "player" => $playerName,
            "redirect" => $this->redirect('http://localhost:3000/HomeClient')
        ]);
    }

    /**
    * @Route("/deconnexion", name="security_logout")
    */
    public function logout()
    {

    }
}
