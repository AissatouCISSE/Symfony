<?php

namespace App\Controller;
use App\Entity\Compte;
use App\Form\CompteType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CompteController extends AbstractController
{
    /**
     * @Route("/", name="listecompte")
     */
    public function index()
    {

        $cp = $this->getDoctrine()->getManager();
        $data['comptes'] = $cp->getRepository(Compte::class)->findAll();
        return $this->render('compte/index.html.twig', $data);


        /* return $this->render('compte/index.html.twig', [
            'controller_name' => 'CompteController',
        ]); */
    }

    /**
     * @Route("/createcompte", name="create-compte")
     */
    public function create(Request $request)
    {
        $compte = new Compte();
        /* $client->setNom('CISSE');
        $client->setPrenom('Aissatou');
        $client->setEmail('aissatoucisse351@gmail.com');
        $client->setTelephone('772345623'); */

        /* $form = $this->createForm(CompteType::class, $compte);
        return $this->render('compte/create-compte.html.twig', [
            'form' => $form->createView(),
        ]); */
        $form = $this->createForm(CompteType::class, $compte);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $compte = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($compte);
            $entityManager->flush();
            return $this->redirectToRoute('create-compte');
        }
        return $this->render('compte/create-compte.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
