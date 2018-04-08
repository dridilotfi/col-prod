<?php
/**
 * Created by PhpStorm.
 * User: lotfidev
 * Date: 20/08/17
 * Time: 16:23
 */

namespace Projet\ProjetBundle\Services;


use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class Projet
{

    protected $em;
    protected $container;
    private $request;

    /**
     * Projet constructor.
     * @param RequestStack $request
     * @param EntityManager $em
     * @param Container $container
     */
    public function __construct(RequestStack $request, EntityManager $em, Container $container)
    {
        $this->em = $em;
        $this->container = $container;
        $this->request = $request;
    }

    /**
     * @return array|\Projet\ProjetBundle\Entity\Projet[]
     * @throws \Exception
     */
    public function mesProjets(){

        $user = $this->container->get('security.token_storage')->getToken()->getUser();

        $projets = $this->em->getRepository('ProjetBundle:Projet')->mesProjets($user->getId());

        return $projets;

    }


}