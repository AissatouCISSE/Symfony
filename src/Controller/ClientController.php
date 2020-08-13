<?php

namespace App\Controller;
use App\Entity\Client;
use App\Form\ClientType;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    /**
     * @Route("/liste", name="listeclient")
     */
    public function index()
    {
        $cl = $this->getDoctrine()->getManager();
        $data['clients'] = $cl->getRepository(Client::class)->findAll();
        return $this->render('client/index.html.twig', $data);

       /*  return $this->render('client/index.html.twig',  [
            'controller_name' => 'ClientController',
        ]); */
    }

    /**
     * @Route("/create", name="create-client")
     */
    public function create(Request $request )
    {
        /* $client = new Client();
        $client->setNom('CISSE');
        $client->setPrenom('Aissatou');
        $client->setEmail('aissatoucisse351@gmail.com');
        $client->setTelephone('772345623'); 

        $form = $this->createForm(ClientType::class, $client);
        $form ->handleRequest($request);
        $form ->getData();
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager ->persist($client);
        $entityManager ->flush();
        return $this->redirectToRoute('listeclient');
        return $this->render('client/create-client.html.twig', [
            'form' => $form->createView(),
        ]); */

        $client = new Client;

        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $client = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($client);
            $entityManager->flush();
            return $this->redirectToRoute('create-client');
        }
        return $this->render('client/create-client.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
