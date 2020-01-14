<?php

namespace AppBundle\Controller;

use AppBundle\Form\ContratType;

use AppBundle\Entity\contrat;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends Controller
{
    /**
     * @Route("/contrat/form/{id}", name="form_contrat")
     */
    public function indexAction(Request $request, $id=null)
    {

        if(is_null($id))
        {
            $contrat = new Contrat();

        }
        else{
            $contrat = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('AppBundle:Contrat')
                ->find($id);

        }
        $form = $this->createForm(ContratType::class, $contrat);


        $form->handleRequest($request);
        if ( $form->isValid()) {
                $contrat->setEntreprise($form->get('entreprise')->getData());
                $contrat->setNom($form->get('nom')->getData());
                $contrat->setPrenom($form->get('prenom')->getData());

            $brochureFile = $form['offrePdf']->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($brochureFile) {
                $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $brochureFile->move(
                        $this->getParameter('pdf_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $contrat->setOffrePdf($newFilename);
            }


            $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($contrat);
                $entityManager->flush($contrat);

            }



        return $this->render('homepage.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/", name="homepage")
     */
    public function mesOffresAction(Request $request)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Contrat')
        ;

        $listContrat = $repository->findAll();
        return $this->render('listeContrat.html.twig', [
            'listContrat' => $listContrat,
        ]);

    }


    /**
     * @Route("/find", name="finder")
     */
    public function finderAction(Request $request)
    {
        $em = $this
            ->getDoctrine()
            ->getManager();
        $corp =  $request->query->get('corp');
        $stud =  $request->query->get('student');
        if($corp =="" && $stud!="" )
        {
            $corp =  "%".$request->query->get('corp')."%";
            $stud =  "%".$request->query->get('student')."%";
            $listContrat= $em->getRepository("AppBundle:Contrat")->createQueryBuilder('c')
                ->andWhere('c.nom like :stud')
                ->setParameter('stud', $stud)
                ->select('c')
                ->getQuery()
                ->getResult();
        }
        if($stud ==""&& $corp !="")
            {
                $corp =  "%".$request->query->get('corp')."%";
                $stud =  "%".$request->query->get('student')."%";
                $listContrat= $em->getRepository("AppBundle:Contrat")->createQueryBuilder('c')
                    ->andWhere('c.entreprise like :corp')
                    ->setParameter('corp', $corp)
                    ->select('c')
                    ->getQuery()
                    ->getResult();
            }
        if($corp !=""&& $stud !="" )
        {
            $corp =  "%".$request->query->get('corp')."%";
            $stud =  "%".$request->query->get('student')."%";
            $listContrat= $em->getRepository("AppBundle:Contrat")->createQueryBuilder('c')
                ->andWhere('c.nom like :stud')
                ->andWhere('c.entreprise like :corp')
                ->setParameter('corp', $corp)
                ->setParameter('stud', $stud)
                ->select('c')
                ->getQuery()
                ->getResult();
        }
        if($corp ==""&& $stud =="" )
        {

            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('AppBundle:Contrat')
            ;

            $listContrat = $repository->findAll();

        }
        return $this->render('listeContrat.html.twig', [
            'listContrat' => $listContrat,
        ]);

    }
    /**
     * @Route("/remove/{id}", name="removeContrat")
     */
    public function removeContratAction(Request $request, $id)
    {
        $contrat = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Contrat')
            ->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($contrat);
        $entityManager->flush();

        return $this->redirectToRoute('homepage');

    }


    /**
     * @Route("/ajaxupdatecontrat", name="ajaxUpdateContrat")
     */
    public function updateContratAjaxAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $id = (int) $request->get('id');
            $contrat = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('AppBundle:Contrat')
                ->find($id);
            $contrat->setIsAccept(true);


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush($contrat);
            return new JsonResponse(array('ok'=>json_encode(true)));
        }

        return new JsonResponse(array('ok'=>json_encode(false)));

    }






}
