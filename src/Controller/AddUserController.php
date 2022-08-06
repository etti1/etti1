<?php

namespace App\Controller;

use App\DTOBuilder\Type\UserRegistrationTypeDTOBuilder;
use App\Entity\User;
use App\Manager\UserManager;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;


class AddUserController extends AbstractController
{

    #[Route('/api/v1/addUser')]
    public function addUser(Request $request, ManagerRegistry $doctrine, Serializer $serializer): Response
    {
        $user = new User();
        $param = json_decode($request->getContent(), true);
        $JsonContent = $serializer->serialize($user, 'json');

        $user->setName($param['name']);
        $user->setSurname($param['surname']);
        $user->setEmail($param['email']);
        $user->setPassword($param['password']);

        $em = $doctrine->getManager();
        $em->persist($user);
        $em->flush();
        return $this->json('nice');

    }

}