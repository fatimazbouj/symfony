<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
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
            $this->addFlash('info','La liste des todos a été bien initialisée.');
        }
        return $this->render('todo/index.html.twig', [
            'controller_name' => 'TodoController',
        ]);
    }

    #[Route('/todo/add/{name}/{val}',name:"app_add_todo")]
    public function addTodo(Request $request,$name,$val):RedirectResponse{
        $session=$request->getSession();
        if($session->has('todos')){
            $todos=$session->get('todos');
            if(isset($todos[$name])){

                $this->addFlash('error',"Le todo $name existe déja!");
            }else{
                $todos[$name]=$val;
                $this->addFlash('success',"Le todo $name a été bien ajouté à la liste.");
                $session->set('todos',$todos);
            }

        }else{

            $this->addFlash('error',"La liste des todos n'est pas encore initialisée .");
        }
        return $this->redirectToRoute('app_todo');
    }


    #[Route('/todo/update/{name}/{val}',name:"app_update_todo")]
    public function updateTodo(Request $request,$name,$val):RedirectResponse{
        $session=$request->getSession();
        if($session->has('todos')){
            $todos=$session->get('todos');
            if(!isset($todos[$name])){

                $this->addFlash('error',"Le todo $name n'existe pas!");
            }else{
                $todos[$name]=$val;
                $this->addFlash('success',"Le todo $name a été bien modifié dans la liste.");
                $session->set('todos',$todos);
            }

        }else{

            $this->addFlash('error',"La liste des todos n'est pas encore initialisée .");
        }
        return $this->redirectToRoute('app_todo');
    }


    #[Route('/todo/delete/{name}',name:"app_delete_todo")]
    public function deleteTodo(Request $request,$name):RedirectResponse{
        $session=$request->getSession();
        if($session->has('todos')){
            $todos=$session->get('todos');
            if(!isset($todos[$name])){

                $this->addFlash('error',"Le todo $name n'existe pas!");
            }else{
                unset($todos[$name]);
                $this->addFlash('success',"Le todo $name a été bien supprimé.");
                $session->set('todos',$todos);
            }

        }else{

            $this->addFlash('error',"La liste des todos n'est pas encore initialisée .");
        }
        return $this->redirectToRoute('app_todo');

    }

    #[Route('/todo/reset',name:"app_reset_todo")]
    public function resetTodo(Request $request):RedirectResponse{
        $session=$request->getSession();
        $session->remove('todos');

        return $this->redirectToRoute('app_todo');
    }
}
