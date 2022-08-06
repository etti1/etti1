<?php

namespace App\Controller;

use App\Entity\User;
use App\Manager\UserManager;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class DeleteUserController extends AbstractController
{
    #[Route('/api/v1/deleteUser/{id}', name: 'delete_user', methods: 'DELETE')]
    public function deleteUser( $id, ManagerRegistry $doctrine, UserManager $userManager): Response
    {
        $user = $doctrine->getRepository(User::class)->find($id);

        $em = $doctrine->getManager();
        $em->remove($user);
        $em->flush();

        return $this->json('удалил');
    }
}