<?php

namespace Projet\ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjetController extends Controller
{
    public function indexAction()
    {
        return $this->render('ProjetBundle:Default:projet.html.twig');
    }
}
