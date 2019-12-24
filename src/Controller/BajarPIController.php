<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BajarPIController extends AbstractController
{
    /**
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Route("/bajar_pi", name="bajar_pi")
     */
    public function index()
    {
        return $this->render('bajar_pi/index.html.twig', [
            'controller_name' => 'BajarPIController',
        ]);
    }
}
