<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Mailer\Emailer;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, \Swift_Mailer $mailer, Emailer $emailer)
    {
        //How we grab the ContactType form class
        $form = $this->createForm(ContactType::class);
        
        $form->handleRequest($request);

        //If the form is submitted, get the data. In this way, the data
        //is an associative array.
        if ($form-> isSubmitted() && $form->isValid()){
            $contactFormData = $form->getData();
            dump($contactFormData);

            $message = (new \Swift_Message('I got this!'))
                //We get the email that is added from the contact form.
                ->setFrom($contactFormData['email'])
                //Who are we sending it to?
                ->setTo('cjvaughn@rocketmail.com')

                //The message the user enters in plain text
                ->setBody(
                    $contactFormData['message'],
                    'text/plain'
                );
                
                //Send the message
                $mailer->send($message); 
        };
            

        //pass the form variable into the render
        return $this->render('contact/contact.html.twig', [
            'our_form' => $form->createView()
        ]
        );
    }
}
