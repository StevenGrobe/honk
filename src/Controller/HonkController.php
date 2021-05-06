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
     * @Route("/honk", name="honk")
     */

    public function index(): Response
    {
        return $this->render('honk/index.html.twig', [
            'controller_name' => 'HonkController',
        ]);
    }

    /**
     * @Route("/", name="home")
     */

    public function display()
    {
        return $this->render('honk/display.html.twig');
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
     * @Route("/modify", name="modify")
     */

    public function modify()
    {
        return $this->render('honk/modify.html.twig');
    }

    /**
     * @Route("/delete", name="delete")
     */

    public function delete()
    {
        return $this->render('honk/delete.html.twig');
    }

    /**
     * @Route("/list", name="list")
     */
    public function list()
    {
        return $this->render('honk/list.html.twig');
    }
}
