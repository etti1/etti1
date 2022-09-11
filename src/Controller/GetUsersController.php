<?php

namespace App\Controller;

use App\DTOBuilder\Type\UserDTOBuilder;
use App\DTOBuilder\Type\UserRegistrationTypeDTOBuilder;
use App\Entity\User;
use App\Manager\UserManager;
use App\Repository\UserRepository;
use App\Service\UserCategoryService;
use OpenApi\Attributes\Get;
use OpenApi\Attributes\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\Type\UserRegistrationType;
use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Symfony\Component\Serializer\Normalizer\NormalizableInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use JMS\Serializer\SerializerInterface;

class GetUsersController extends AbstractController
{

    #[Route('/api/v1/getUsers')]
    public function categories(Request $request, UserRepository $userRepository, SerializerInterface $serializer): Response
    {

        $user = new User();

        return $this->json($serializer->serialize($userRepository->findName(), 'json'));

    }

}