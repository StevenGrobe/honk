<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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

    public function create()
    {
        return $this->render('honk/create.html.twig');
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
