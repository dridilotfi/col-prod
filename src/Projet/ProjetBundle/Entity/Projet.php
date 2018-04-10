<?php

namespace Projet\ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet
 *
 * @ORM\Table(name="projet")
 * @ORM\Entity(repositoryClass="Projet\ProjetBundle\Repository\ProjetRepository")
 */
class Projet
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="slug_projet", type="string", length=255)
     */
    private $slugProjet;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_projet", type="string", length=255)
     */
    private $titreProjet;

    /**
     * @var string
     *
     * @ORM\Column(name="description_projet", type="text")
     */
    private $descriptionProjet;

    /**
     * @ORM\ManyToOne(targetEntity="Projet\ProjetBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $User;

    /**
     * @ORM\ManyToMany(targetEntity="Projet\ProjetBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $team;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_projet", type="datetime", nullable=true)
     */
    private $dateAjoutProjet;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titreProjet
     *
     * @param string $titreProjet
     *
     * @return Projet
     */
    public function setTitreProjet($titreProjet)
    {
        $this->titreProjet = $titreProjet;

        return $this;
    }

    /**
     * Get titreProjet
     *
     * @return string
     */
    public function getTitreProjet()
    {
        return $this->titreProjet;
    }

    /**
     * Set descriptionProjet
     *
     * @param string $descriptionProjet
     *
     * @return Projet
     */
    public function setDescriptionProjet($descriptionProjet)
    {
        $this->descriptionProjet = $descriptionProjet;

        return $this;
    }

    /**
     * Get descriptionProjet
     *
     * @return string
     */
    public function getDescriptionProjet()
    {
        return $this->descriptionProjet;
    }

    /**
     * Set user
     *
     * @param \Projet\ProjetBundle\Entity\User $user
     *
     * @return Projet
     */
    public function setUser(\Projet\ProjetBundle\Entity\User $user)
    {
        $this->User = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Projet\ProjetBundle\Entity\User
     */
    public function getUser()
    {
        return $this->User;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->team = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setDateAjoutProjet(new \DateTime);

    }

    /**
     * Add team
     *
     * @param \Projet\ProjetBundle\Entity\User $team
     *
     * @return Projet
     */
    public function addTeam(\Projet\ProjetBundle\Entity\User $team)
    {
        $this->team[] = $team;

        return $this;
    }

    /**
     * Remove team
     *
     * @param \Projet\ProjetBundle\Entity\User $team
     */
    public function removeTeam(\Projet\ProjetBundle\Entity\User $team)
    {
        $this->team->removeElement($team);
    }

    /**
     * Get team
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set dateAjoutProjet
     *
     * @param \DateTime $dateAjoutProjet
     *
     * @return Projet
     */
    public function setDateAjoutProjet($dateAjoutProjet)
    {
        $this->dateAjoutProjet = $dateAjoutProjet;

        return $this;
    }

    /**
     * Get dateAjoutProjet
     *
     * @return \DateTime
     */
    public function getDateAjoutProjet()
    {
        return $this->dateAjoutProjet;
    }

    /**
     * Set slugProjet
     *
     * @param string $slugProjet
     *
     * @return Projet
     */
    public function setSlugProjet($slugProjet)
    {
        $this->slugProjet = $slugProjet;

        return $this;
    }

    /**
     * Get slugProjet
     *
     * @return string
     */
    public function getSlugProjet()
    {
        return $this->slugProjet;
    }
}
