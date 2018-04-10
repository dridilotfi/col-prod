<?php

namespace Projet\ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjetController extends Controller
{
    public function indexAction()
    {
        $projets = $this->container->get('projet');

        return $this->render('ProjetBundle:Projet:projet.html.twig', array(
            'projets' => $projets->mesProjets()
        ));
    }

    public function detailsAction($slugProjet)
    {
        return $this->render('ProjetBundle:Projet:details.html.twig');
    }
}
