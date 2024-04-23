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

    // #[Route(
    //     '/multi/{integer1}/{integer2}',
    //     name:"app_multi",
    //     requirements:[
    //         "integer1"=>"\d+",
    //         "integer2"=>"\d+",
    //     ]
    // )]
    // OR
    #[Route(
        '/multi/{integer1<\d+>}/{integer2<\d+>}',
        name:"app_multi"
    )]
    public function multiplication($integer1,$integer2 ){
        $result=$integer1* $integer2;
        return new Response("<h1> $result </h1>");
    }
}
