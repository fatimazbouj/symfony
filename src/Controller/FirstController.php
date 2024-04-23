<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FirstController extends AbstractController
{
    #[Route('/first', name: 'app_first')]
    public function index(): Response
    {
        // return $this->json([
        //     'message' => 'Welcome to your new controller!',
        //     'path' => 'src/Controller/FirstController.php',
        // ]);
        return $this->render('first/index.html.twig',[
            "controller_name"=>"FirstController",
            "name"=>"Fatima zahra"
        ]);

        // return new Response(
        //     "<h1> Hello world again</h1>"
        // );
    }
}
