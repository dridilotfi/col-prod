<?php

namespace Projet\ProjetBundle\Controller;

use Cocur\Slugify\Slugify;
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

        $slugify = new Slugify();

        $titreProjetAjout = $request->request->get('titreProjetAjout');
        $descriptionProjetAjout = $request->request->get('descriptionProjetAjout');

        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $owner = $em->getRepository('ProjetBundle:User')->find($user);
        $projet->setTitreProjet($titreProjetAjout);
        $slug = $slugify->slugify($titreProjetAjout, ['separator' => '-', 'trim' => false, 'lowercase' => true]);
        $projet->setSlugProjet($slug);
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

    public function getProjetAction(Request $request){

        $em = $this->getDoctrine()->getManager();

        $idProjet = $request->request->get('idProjetModif');

        $projet = $em->getRepository('ProjetBundle:Projet')->find($idProjet);

        $projetArray = array(
            'id' => $projet->getId(),
            'titre' => $projet->getTitreProjet(),
            'description' => $projet->getDescriptionProjet()
        );

        return new JsonResponse($projetArray);
    }


    public function modifProjetAction(Request $request){

        $em = $this->getDoctrine()->getManager();

        $idProjetModif = $request->request->get('idProjetModif');

        $titreProjetModif = $request->request->get('titreProjetModif');

        $descriptionProjetModif = $request->request->get('descriptionProjetModif');

        $projet = $em->getRepository('ProjetBundle:Projet')->find($idProjetModif);

        $projet->setTitreProjet($titreProjetModif);

        $projet->setDescriptionProjet($descriptionProjetModif);

        $em->flush();

        return new JsonResponse('modif_projet_ok');
    }
}
