<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


use App\Repository\SeismesRepository;

/**
 * @Route("/api", name="api_")
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/pay", name="pay", methods={"GET"})
     */
    public function pay(SeismesRepository $seismesRepository): Response
    {
        $listPays = $seismesRepository->getPays();

        $reponse = new Response();
        $reponse->setContent(json_encode($listPays));
        $reponse->headers->set('Content-Type', 'application/json');
		$reponse->headers->set('Access-Control-Allow-Origin', '*');
        return $reponse;
    }
    /**
     * @Route("/extremum", name="extremum", methods={"GET"})
     */
    public function extremum(SeismesRepository $seismesRepository): Response
    {
        $listExtremum = $seismesRepository->getExtremum();
        $reponse = new Response();
        $reponse->setContent(json_encode($listExtremum));
        $reponse->headers->set('Content-Type', 'application/json');
		$reponse->headers->set('Access-Control-Allow-Origin', '*');
        return $reponse;
    }
    /**
     * @Route("/seismes/{pays}/{intensite}", name="seismes", methods={"GET"})
     */
    public function seismes($pays = 'tous', $intensite = 'tous', SeismesRepository $seismesRepository): Response
    {
        $seismes = $seismesRepository->getSeisme($pays, $intensite);

        $reponse = new Response();
        $reponse->setContent(json_encode($seismes));
        $reponse->headers->set('Content-Type', 'application/json');
		$reponse->headers->set('Access-Control-Allow-Origin', '*');
        return $reponse;
    }
}
