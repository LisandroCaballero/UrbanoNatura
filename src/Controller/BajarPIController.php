<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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

    /**
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     *  @Route("/get-piezas-U3", name="get-piezas-U3", methods={"POST"}, options={"expose"=true})
     */
    public function getPiezasU3()
    {
        sleep(5);
        $array = array(
            'name' => "lisandro",
            'domicilio' => array("telefonoDomicilio" => 123456, "direccion" => "ferre 6660")
        );
        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
