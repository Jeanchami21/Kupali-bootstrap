<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SeedController extends AbstractController
{
    /**
     * @Route("/seed", name="seed")
     */
    public function index()
    {
        return $this->render('seed/index.html.twig', [
            'controller_name' => 'SeedController',
        ]);
    }
}
