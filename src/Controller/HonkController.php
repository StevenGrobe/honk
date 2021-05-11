<?php

namespace App\Controller;

use App\Entity\Honk;
use App\Form\HonkType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class HonkController extends AbstractController
{
    /**
     * @Route("/", name="list")
     */
    public function list()
    {
        $honks = $this->getDoctrine()->getRepository(Honk::class)->findBy([], ['created_at' => 'desc']);
        return $this->render('honk/list.html.twig', [
            'honks' => $honks,
        ]);
    }

    /**
     * @Route("/create", name="create")
     */

    public function create(Request $request, EntityManagerInterface $manager)
    {
        $honk = new Honk();
        $form = $this->createForm(HonkType::class, $honk);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $honk->setHonks($this->getUser());
            $honk->setCreatedAt(new \DateTime());
            $manager->persist($honk);
            $manager->flush();

            return $this->redirectToRoute('list');
        }
        return $this->render('honk/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/modify/{id}", name="modify")
     */

    public function modify(Honk $honk, Request $request, EntityManagerInterface $manager)
    {
        $manager = $this->getDoctrine()->getManager();
        $form = $this->createForm(HonkType::class, $honk);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $honk->setCreatedAt(new \DateTime());
            $manager->flush();
            return $this->redirectToRoute('list');
        }
        return $this->render('honk/modify.html.twig', [
        'controller_name' => 'HonkController',
        'form' => $form->createView(),
            ]);
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */

    public function delete(Honk $honk)
    {
        $entityManager = $this->getDoctrine()->getManager();
        if (!$honk) {
            throw $this->createNotFoundException(
                'No quack found for id ' . $honk
            );
        }
        $entityManager->remove($honk);
        $entityManager->flush();
        return $this->redirectToRoute('list', [
            'id' => $honk->getId(),

        ]);
    }
}
