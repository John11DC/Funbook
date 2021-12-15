<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;


class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(Request $request, MailerInterface $mailer)
    {

        if($request->request->all()) {

           
            
            $message = (new Email())
                ->from($request->request->get("email"))
                ->to((new Address("FunB00k.dat@gmail.com","John")))
                ->subject($request->request->get("sujet"))
                ->text($request->request->get("message"));
            $mailer->send($message);

            $this->addFlash('success', 'Vore message a été envoyé');

            return $this->redirectToRoute('home');
        }

        return $this->render('home/contact.html.twig', [ 
            'controller_name' => 'ContactController',
           
        ]);
    }
    
}