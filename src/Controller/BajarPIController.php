<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Unirest\Request as unirest;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class BajarPIController extends AbstractController
{
    private $endpointListaPi;

    public function __construct(ParameterBagInterface $params)
    {
        $this->endpointListaPi = $params->get('endpoint_lista_pi');
    }

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
        $code = 0;
        $mensaje = 'No hay datos para la fecha seleccionada.';
        $headers = array('Accept' => 'application/json');
        $data = array('shipper' => $request->get("shipper"), 'fecha' => $request->get("fecha"));
        $response = unirest::post($this->endpointListaPi, $headers, json_encode($data));
        if($response->code !== 200)
            throw new \RuntimeException('No anduvo.');

        if(!empty($response->body->data)){
            $mensaje = 'Total de piezas '. count($response->body->data);
            $code = 1;
        }
        $array = array(
            'mensaje' => $mensaje,
            'code' => $code
        );
        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
