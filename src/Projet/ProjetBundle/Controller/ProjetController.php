<?php

namespace Projet\ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjetController extends Controller
{
    public function indexAction()
    {
        return $this->render('ProjetBundle:Projet:projet.html.twig');
    }

    public function detailsAction()
    {
        return $this->render('ProjetBundle:Projet:details.html.twig');
    }
}
