<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AdminController extends AbstractController
{
    #[Route('/v1', name: 'v1')]
    public function admin() : Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'НЕТ ДОСТУПА');

        return new Response('xxx');
    }
}