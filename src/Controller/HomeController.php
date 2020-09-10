<?php

namespace App\Controller;

use App\Entity\Variety;
use App\Repository\VarietyRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
       
        $repo = $this->getDoctrine()->getRepository(Variety::class);

        $varieties = $repo->findAll();

        return $this->render('home/index.html.twig', [
            'varieties' => $varieties
        ]);
    }

    /**
     * On reçoit l'argument "letter" défini dans la vue et on définit le nom de la route
     * 
     * @Route("/pagination/{letter}", name="alphabetical_pagination")
     */
    public function alphabeticalPagination($letter){
        
        return $this->render('home/index.html.twig', [
            'clickedLetter' => $letter
            
            ]);
    }
}
