<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LeerpiezasController extends AbstractController
{
    /**
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Route("/leerpiezas", name="leerpiezas")
     */
    public function index()
    {
        return $this->render('leerpiezas/index.html.twig', [
            'controller_name' => 'LeerpiezasController',
        ]);
    }
}
