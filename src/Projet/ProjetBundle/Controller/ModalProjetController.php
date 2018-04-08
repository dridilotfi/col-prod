<?php

namespace Projet\ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ModalProjetController extends Controller
{
    public function supprimerAction()
    {
        return $this->render('ProjetBundle:Projet:supprimer.html.twig');
    }

    public function modifierAction()
    {
        return $this->render('ProjetBundle:Projet:modifier.html.twig');
    }

    public function ajouterAction()
    {
        return $this->render('ProjetBundle:Projet:ajouter.html.twig');
    }
}
