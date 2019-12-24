<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ImpresionesricohController extends AbstractController
{
    /**
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Route("/impresionesricoh", name="impresionesricoh")
     */
    public function index()
    {
        return $this->render('impresionesricoh/index.html.twig', [
            'controller_name' => 'ImpresionesricohController',
        ]);
    }
}
