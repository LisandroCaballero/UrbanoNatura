<?php

namespace App\Controller;

use App\Entity\Piezas;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LeerPiezasController extends AbstractController
{

    private $entityManagerPiezas;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManagerPiezas = $entityManager->getRepository(Piezas::class);;
    }

    /**
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Route("/leerPiezas", name="leerPiezas")
     */
    public function index()
    {
        return $this->render('leerPiezas/index.html.twig', [
            'lotes' => $this->entityManagerPiezas->findAllLotes()
        ]);
    }

    /**
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Route("/get-piezas-lote", name="get-piezas-lote", methods={"POST"}, options={"expose"=true})
     */
    public function getPiezasLote(Request $request)
    {
        return $this->render('leerPiezas/leer_lote.html.twig', [
            'piezas' => $this->entityManagerPiezas->findPiezasXLote($request->get('lote'))
        ]);
    }
}
