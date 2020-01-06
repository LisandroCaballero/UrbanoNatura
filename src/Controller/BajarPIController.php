<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Unirest\Request as unirest;

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
     * @Route("/get-piezas-U3", name="get-piezas-U3", methods={"POST"}, options={"expose"=true})
     */
    public function getPiezasU3(Request $request)
    {
        $fecha = $request->get("fecha");
        $array = array();
        $headers = array('Accept' => 'application/json');
        $data = array('shipper' => 1861, 'fecha' => $fecha);
        $response = unirest::get('http://desarrollo.urbano.com.ar/webservice/natura/listaPi/', $headers, $data);
        $total = count((array)$response->body);
        if (isset($response->body->error)) {
            $array = array(
                'response' => $response->body,
                'mensaje' => $response->body->descError,
                'code' => 0
            );
        }else{
            $array = array(
                'mensaje' => 'Total de piezas bajadas ' .$total,
                'code' => 1
            );

        }
        //throw new \RuntimeException('No anduvo.');
        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
