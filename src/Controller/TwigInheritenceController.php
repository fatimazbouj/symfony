<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TwigInheritenceController extends AbstractController
{
    #[Route('/twig/', name: 'app_twig_heritage')]
    public function index(): Response
    {
        return $this->render('twig_inheritence/index.html.twig', [
            'controller_name' => 'TwigInheritenceController',
        ]);
    }

    #[Route('/twig/heritage/', name: 'app_heritage')]
    public function heritage(): Response
    {
        return $this->render('heritage.html.twig');
    }
}
