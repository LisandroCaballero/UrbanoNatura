<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ImpresionesricohController extends AbstractController
{
    /**
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Route("/impresionesRicoh", name="impresionesRicoh")
     */
    public function index()
    {
        return $this->render('impresionesRicoh/index.html.twig', [

        ]);
    }
}
