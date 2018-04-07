<?php

namespace Projet\ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MessageController extends Controller
{
    public function indexAction()
    {

        return $this->render('ProjetBundle:include:message.html.twig');
    }
}
