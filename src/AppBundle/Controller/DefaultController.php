<?php

namespace AppBundle\Controller;

use AppBundle\Form\ContratType;

use AppBundle\Entity\contrat;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $contrat = new Contrat();
        $form = $this->createForm(ContratType::class, $contrat);


        $form->handleRequest($request);
        if ( $form->isValid()) {
            dump($form->getData());
                $contrat->setEntreprise($form->get('entreprise')->getData());
                $contrat->setNom($form->get('nom')->getData());
                $contrat->setPrenom($form->get('prenom')->getData());

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($contrat);
                $entityManager->flush($contrat);

            }



        return $this->render('homepage.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/mesOffres", name="mesOffres")
     */
    public function mesOffresAction(Request $request)
    {

    }





}
