<?php

namespace App\Controller;

use App\Constantes\EstadosConstantes;
use App\Entity\Piezas;
use Doctrine\ORM\EntityManagerInterface;
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
    private $idUser;

    public function __construct(ParameterBagInterface $params)
    {
        $this->endpointListaPi = $params->get('endpoint_lista_pi');
        $this->idUser = 1;
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
    public function getPiezasU3(Request $request, EntityManagerInterface $entityManager)
    {
        $shipper = $request->get("shipper");
        $sucursal = $request->get("sucursal");
        $fecha = $request->get("fecha");
        $code = 0;
        $lote = date('YmdHis');
        $mensaje = 'No hay datos para la fecha seleccionada.';
        $headers = array('Accept' => 'application/json');
        $data = array('shipper' => $shipper, 'fecha' => $fecha);
        $response = unirest::post($this->endpointListaPi, $headers, json_encode($data));
        if($response->code !== 200)
            throw new \RuntimeException('No anduvo.');

        $startDate = new \DateTime('now');
        $repositorio = $entityManager->getRepository(Piezas::class);
        foreach ($response->body->data as $value){
            if(!empty($repositorio->findOneBySomeField($value)))
                continue;
            $pieza = new Piezas();
            $pieza->setIdReg($value->id_reg);
            $pieza->setLote($lote);
            $pieza->setShipper($shipper);
            $pieza->setSucursal($sucursal);
            $pieza->setCampo1($value->campo1);
            $pieza->setCampo2($value->campo2);
            $pieza->setCampo11($value->campo11);
            $pieza->setFileNombre($value->file_nombre);
            $pieza->setDatetime($startDate);
            $pieza->setIdUsuario($this->idUser);
            $pieza->setEstado(EstadosConstantes::ESTADO_PIEZA_PD);
            $em = $this->getDoctrine()->getManager();
            $em->persist($pieza);
            $em->flush();
        }

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
