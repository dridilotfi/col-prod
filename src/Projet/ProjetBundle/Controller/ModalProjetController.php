<?php

namespace Projet\ProjetBundle\Controller;

use Projet\ProjetBundle\Entity\Projet;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

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

    public function ajoutProjetAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $projet = new Projet();

        $titreProjetAjout = $request->request->get('titreProjetAjout');
        $descriptionProjetAjout = $request->request->get('descriptionProjetAjout');

        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $owner = $em->getRepository('ProjetBundle:User')->find($user);
        $projet->setTitreProjet($titreProjetAjout);
        $projet->setDescriptionProjet($descriptionProjetAjout);
        $projet->setUser($owner);

        $em->persist($projet);
        $em->flush();

        return new JsonResponse('ajout_projet_ok');
    }

    public function supprimerProjetAction(Request $request){

        $em = $this->getDoctrine()->getManager();

        $idProjetDelete = $request->request->get('idProjetDelete');

        $projet = $em->getRepository('ProjetBundle:Projet')->find($idProjetDelete);


        $em->remove($projet);
        $em->flush();

        return new JsonResponse('suppression_projet_ok');
    }
}
