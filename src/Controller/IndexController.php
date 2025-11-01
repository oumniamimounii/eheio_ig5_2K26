<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    #[Route('/index', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
    // #[Route('/index',name: 'app_index')]
    // public function Welcome():Response
    // {
    //     return new Response("Hello World!");
    // }

     #[Route('/index/{smia}/{age}', name: 'app_home', requirements:['smia'=>'[a-zA-Z]+','age'=>'\d+'])]
    public function home(string $smia ,int $age ): Response
    {
        return new Response("hello ".$smia. " your age is " .$age." !");
    }
}
