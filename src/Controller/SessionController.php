<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SessionController extends AbstractController
{
    #[Route('/session', name: 'app_session')]
    public function index(Request $request): Response
    {
        //session_start()
        $session=$request->getSession();
        $nbrVisites=0;

        if($session->has('nbrVisites')){
            $nbrVisites=$session->get('nbrVisites')+1;

        }else{
            $nbrVisites=1;
        }
        $session->set('nbrVisites',$nbrVisites);
        return $this->render('session/index.html.twig');
    }
}
