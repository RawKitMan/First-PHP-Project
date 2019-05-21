<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class WelcomeController extends AbstractController
{
    /**
     * @Route("/", name="welcome")
     */
    public function index()
    {
        return $this->render('welcome/index.html.twig');
    }
    
    //This is how we do queries if we put something in the URL
    /**
     * @Route("/hello", name="hello_page")
     */
    //public function hello(Request $request){

       // $name = $request->query->get('name', 'Rhonda');
       // return $this->render(
       //     'hello_page.html.twig',
       //     [
      //          'name' => $name
       //     ]
       // );
   // }

   //Regular routing method

   /**
    * @Route(
    *    "/hello/{name}", 
    *   name="hello_page", 
    *   defaults={"name" = "CJ"},
    *   requirements={"name" = "[A-Za-z]+"}
    * )
    * @return \Synfony\Component\HttpFoundation\Response
    */
    public function hello(Request $request, $name){

        
        return $this->render(
            'hello_page.html.twig',
            [
                 'name' => $name
             ]
         );
    }
}
