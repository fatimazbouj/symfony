<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TodoController extends AbstractController
{
    #[Route('/todo', name: 'app_todo')]
    public function index(Request $request): Response
    {
        $session=$request->getSession();
        if(!$session->has('todos')){
            $todos=[
                "nettoyage"=>"nettoyer la maison",
                "achats"=>"faire des achats",
                "apprentissage"=>"edudier une nouvelle langue",
            ];
            $session->set('todos',$todos);
        }
        return $this->render('todo/index.html.twig', [
            'controller_name' => 'TodoController',
        ]);
    }
}
