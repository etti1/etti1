<?php

namespace App\Controller;
use App\DTOBuilder\Type\UserRegistrationTypeDTOBuilder;
use App\Form\Type\UserRegistrationType;
use App\Manager\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;




/**
 * Class UserRegistrationController.
 */
class UserRegistrationController extends AbstractController
{

    #[Route('/helloUser', name: 'hello_user')]
    public function index(): Response
    {
        return new Response('hello, User');
    }

    #[Route('/logout', name: 'logout')]
    public function logout()
    {
    }


    #[Route('/reg', name: 'user_registration')]
    public function registration(Request $request, UserManager $userManager, UserRegistrationTypeDTOBuilder $registrationTypeDTOBuilder): Response
    {
        $userRegistrationForm = $this->createForm(UserRegistrationType::class);

        $userRegistrationForm->handleRequest($request);

        if ($userRegistrationForm->isSubmitted() && $userRegistrationForm->isValid()) {
            $user = $registrationTypeDTOBuilder->buildEntity($userRegistrationForm->getData());
            $userManager->create($user);
            return $this->redirectToRoute('info_user', ['userEmail' => $user->getEmail(), 'userName' => $user->getName()]);

        }

        return $this->render('user_registration/registration_page.html.twig', [
            'userRegistrationForm' => $userRegistrationForm->createView(),
        ]);

    }

    #[Route('/info/{userEmail}/{userName}', name: 'info_user')]
    public function getUserInfo(string $userEmail, string $userName, UserManager $userManager): Response
    {
        return new Response('Привет ' . $userName . '.<br/> Ты зарегистрировался.<br/> Почта: ' . $userEmail);
    }
}