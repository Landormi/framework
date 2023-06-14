<?php

/**
 * Description du fichier : Contrôleur gérant les séismes
 * @author : Maxime ALBERT et Maryline LE BOT
 * @version : 1.0
 */
namespace App\Controller;

use App\Entity\Seismes;
use App\Form\SeismesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\SeismesRepository;

/**
 * @Route("/seismes")
 */
class SeismesController extends AbstractController
{
    /**
     * @Route("/", name="app_seismes_index", methods={"GET", "POST"})
     */
    public function index(Request $request, EntityManagerInterface $entityManager, SeismesRepository $seismesRepository): Response
    {
        $pays = $request->get('pays');
        $intensite = $request->get('intensite');

        $seismes = $seismesRepository->getSeisme($pays, $intensite);

        $listPays = $seismesRepository->getPays();

        $listExtremum = $seismesRepository->getExtremum();

        return $this->render('seismes/index.html.twig', [
            'seismes' => $seismes, 
            'listPays' => $listPays, 
            'listExtremum' => $listExtremum, 
        ]);
    }

    /**
     * @Route("/new", name="app_seismes_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $seisme = new Seismes();
        $form = $this->createForm(SeismesType::class, $seisme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($seisme);
            $entityManager->flush();

            return $this->redirectToRoute('app_seismes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('seismes/new.html.twig', [
            'seisme' => $seisme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_seismes_show", methods={"GET"})
     */
    public function show(Seismes $seisme): Response
    {
        return $this->render('seismes/show.html.twig', [
            'seisme' => $seisme,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_seismes_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Seismes $seisme, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SeismesType::class, $seisme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_seismes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('seismes/edit.html.twig', [
            'seisme' => $seisme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_seismes_delete", methods={"POST"})
     */
    public function delete(Request $request, Seismes $seisme, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$seisme->getId(), $request->request->get('_token'))) {
            $entityManager->remove($seisme);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_seismes_index', [], Response::HTTP_SEE_OTHER);
    }
}
