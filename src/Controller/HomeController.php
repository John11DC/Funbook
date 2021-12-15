<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/login', name: 'home_login')]
    public function login(): Response
    {
        return $this->render('account/login.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/signup', name: 'home_signup')]
    public function signup(): Response
    {
        return $this->render('account/signup.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/book', name: 'home_book')]
    public function book(): Response
    {
        return $this->render('book/book.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    



}
