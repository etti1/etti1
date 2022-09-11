<?php

namespace App\Controller;

use App\DTO\Type\UserRegistrationTypeDTO;
use App\DTOBuilder\Type\UserDTOBuilder;
use App\DTOBuilder\Type\UserRegistrationTypeDTOBuilder;
use App\Entity\User;
use App\Form\Type\UserRegistrationType;
use App\Manager\UserManager;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ManagerRegistry;
use FOS\RestBundle\Controller\Annotations\Post;
use JMS\Serializer\Serializer;
use phpDocumentor\Reflection\Types\String_;
use PhpParser\JsonDecoder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;


class AddUserController extends AbstractController
{
    /**
     * @param Request $request
     * @param ManagerRegistry $doctrine
     * @return Response
     */
    #[Route('/api/v1/addUser')]

    public function addUser(Request $request, ManagerRegistry $doctrine, SerializerInterface $serializer): Response
    {
        $user = new User();
        $param = json_decode($request->getContent(), true);
        $serializer->serialize($user, 'json');



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