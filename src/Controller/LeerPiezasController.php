<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LeerPiezasController extends AbstractController
{
    /**
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Route("/leerPiezas", name="leerPiezas")
     */
    public function index()
    {
        return $this->render('leerPiezas/index.html.twig', [
            'controller_name' => 'LeerPiezasController',
        ]);
    }
}
