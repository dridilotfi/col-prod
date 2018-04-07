<?php

namespace Projet\ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NotificationController extends Controller
{
    public function indexAction()
    {

        return $this->render('ProjetBundle:include:notification.html.twig');
    }
}
