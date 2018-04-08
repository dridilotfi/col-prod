<?php

namespace Projet\ProjetBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Projet\ProjetBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        $this->setDateAjoutUser(new \DateTime);

        // navigateur

        if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE)
            $navig='Internet explorer';
        elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) //For Supporting IE 11
            $navig='Internet explorer';
        elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)
            $navig='Mozilla Firefox';
        elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
            $navig='Google Chrome';
        elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE)
            $navig="Opera Mini";
        elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE)
            $navig="Opera";
        elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE)
            $navig="Safari";
        else
            $navig='autre';
        $this->setNavigateurUser($navig);

        // systeme d'exploitation

        $user_agent = getenv("HTTP_USER_AGENT");

        if (strpos($user_agent, "Win") !== FALSE)
            $os = "Windows";
        elseif ((strpos($user_agent, "Mac") !== FALSE) || (strpos($user_agent, "PPC") !== FALSE))
            $os = "Mac";
        elseif (strpos($user_agent, "Linux") !== FALSE)
            $os = "Linux";
        elseif (strpos($user_agent, "FreeBSD") !== FALSE)
            $os = "FreeBSD";
        elseif (strpos($user_agent, "SunOS") !== FALSE)
            $os = "SunOS";
        elseif (strpos($user_agent, "IRIX") !== FALSE)
            $os = "IRIX";
        elseif (strpos($user_agent, "BeOS") !== FALSE)
            $os = "BeOS";
        elseif (strpos($user_agent, "OS/2") !== FALSE)
            $os = "OS/2";
        elseif (strpos($user_agent, "AIX") !== FALSE)
            $os = "AIX";
        else
            $os = "Autre";
        $this->setOsUser($os);
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_user", type="date", nullable=true)
     */
    private $dateAjoutUser;

    /**
     * @var string
     *
     * @ORM\Column(name="navigateur_user", type="string", length=100,nullable=true)
     */
    private $navigateurUser;

    /**
     * @var string
     *
     * @ORM\Column(name="os_user", type="string", length=100,nullable=true)
     */
    private $osUser;


    /**
     * @var string
     *
     * @ORM\Column(name="nom_user", type="string", length=100,nullable=true)
     */
    private $nomUser;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_user", type="string", length=100,nullable=true)
     */
    private $prenomUser;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_user", type="string", length=200,nullable=true)
     */
    private $adresseUser;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe_user", type="string", length=100,nullable=true)
     */
    private $sexeUser;

    /**
     * @var string
     *
     * @ORM\Column(name="date_naissance_user", type="string", length=100,nullable=true)
     */
    private $dateNaissanceUser;

    /**
     * @var string
     *
     * @ORM\Column(name="description_user", type="text",nullable=true)
     */
    private $descriptionUser;

    /**
     * @var string
     *
     * @ORM\Column(name="pays_user", type="string", length=100,nullable=true)
     */
    private $paysUser;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_user", type="string", length=100,nullable=true)
     */
    private $villeUser;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile_user", type="string", length=100,nullable=true)
     */
    private $mobileUser;

    /**
     * @var string
     *
     * @ORM\Column(name="fixe_user", type="string", length=100,nullable=true)
     */
    private $fixeUser;

    /**
     * @var string
     *
     * @ORM\Column(name="fax_user", type="string", length=100,nullable=true)
     */
    private $faxUser;

    /**
     * @var string
     *
     * @ORM\Column(name="site_user", type="string", length=100,nullable=true)
     */
    private $siteUser;

    /**
     * @var string
     *
     * @ORM\Column(name="situation_user", type="string", length=100,nullable=true)
     */
    private $situationUser;

    /**
     * Set dateAjoutUser
     *
     * @param \DateTime $dateAjoutUser
     *
     * @return User
     */
    public function setDateAjoutUser($dateAjoutUser)
    {
        $this->dateAjoutUser = $dateAjoutUser;

        return $this;
    }

    /**
     * Get dateAjoutUser
     *
     * @return \DateTime
     */
    public function getDateAjoutUser()
    {
        return $this->dateAjoutUser;
    }

    /**
     * Set navigateurUser
     *
     * @param string $navigateurUser
     *
     * @return User
     */
    public function setNavigateurUser($navigateurUser)
    {
        $this->navigateurUser = $navigateurUser;

        return $this;
    }

    /**
     * Get navigateurUser
     *
     * @return string
     */
    public function getNavigateurUser()
    {
        return $this->navigateurUser;
    }

    /**
     * Set osUser
     *
     * @param string $osUser
     *
     * @return User
     */
    public function setOsUser($osUser)
    {
        $this->osUser = $osUser;

        return $this;
    }

    /**
     * Get osUser
     *
     * @return string
     */
    public function getOsUser()
    {
        return $this->osUser;
    }

    /**
     * Set nomUser
     *
     * @param string $nomUser
     *
     * @return User
     */
    public function setNomUser($nomUser)
    {
        $this->nomUser = $nomUser;

        return $this;
    }

    /**
     * Get nomUser
     *
     * @return string
     */
    public function getNomUser()
    {
        return $this->nomUser;
    }

    /**
     * Set prenomUser
     *
     * @param string $prenomUser
     *
     * @return User
     */
    public function setPrenomUser($prenomUser)
    {
        $this->prenomUser = $prenomUser;

        return $this;
    }

    /**
     * Get prenomUser
     *
     * @return string
     */
    public function getPrenomUser()
    {
        return $this->prenomUser;
    }

    /**
     * Set adresseUser
     *
     * @param string $adresseUser
     *
     * @return User
     */
    public function setAdresseUser($adresseUser)
    {
        $this->adresseUser = $adresseUser;

        return $this;
    }

    /**
     * Get adresseUser
     *
     * @return string
     */
    public function getAdresseUser()
    {
        return $this->adresseUser;
    }

    /**
     * Set sexeUser
     *
     * @param string $sexeUser
     *
     * @return User
     */
    public function setSexeUser($sexeUser)
    {
        $this->sexeUser = $sexeUser;

        return $this;
    }

    /**
     * Get sexeUser
     *
     * @return string
     */
    public function getSexeUser()
    {
        return $this->sexeUser;
    }

    /**
     * Set dateNaissanceUser
     *
     * @param string $dateNaissanceUser
     *
     * @return User
     */
    public function setDateNaissanceUser($dateNaissanceUser)
    {
        $this->dateNaissanceUser = $dateNaissanceUser;

        return $this;
    }

    /**
     * Get dateNaissanceUser
     *
     * @return string
     */
    public function getDateNaissanceUser()
    {
        return $this->dateNaissanceUser;
    }

    /**
     * Set descriptionUser
     *
     * @param string $descriptionUser
     *
     * @return User
     */
    public function setDescriptionUser($descriptionUser)
    {
        $this->descriptionUser = $descriptionUser;

        return $this;
    }

    /**
     * Get descriptionUser
     *
     * @return string
     */
    public function getDescriptionUser()
    {
        return $this->descriptionUser;
    }

    /**
     * Set paysUser
     *
     * @param string $paysUser
     *
     * @return User
     */
    public function setPaysUser($paysUser)
    {
        $this->paysUser = $paysUser;

        return $this;
    }

    /**
     * Get paysUser
     *
     * @return string
     */
    public function getPaysUser()
    {
        return $this->paysUser;
    }

    /**
     * Set villeUser
     *
     * @param string $villeUser
     *
     * @return User
     */
    public function setVilleUser($villeUser)
    {
        $this->villeUser = $villeUser;

        return $this;
    }

    /**
     * Get villeUser
     *
     * @return string
     */
    public function getVilleUser()
    {
        return $this->villeUser;
    }

    /**
     * Set mobileUser
     *
     * @param string $mobileUser
     *
     * @return User
     */
    public function setMobileUser($mobileUser)
    {
        $this->mobileUser = $mobileUser;

        return $this;
    }

    /**
     * Get mobileUser
     *
     * @return string
     */
    public function getMobileUser()
    {
        return $this->mobileUser;
    }

    /**
     * Set fixeUser
     *
     * @param string $fixeUser
     *
     * @return User
     */
    public function setFixeUser($fixeUser)
    {
        $this->fixeUser = $fixeUser;

        return $this;
    }

    /**
     * Get fixeUser
     *
     * @return string
     */
    public function getFixeUser()
    {
        return $this->fixeUser;
    }

    /**
     * Set faxUser
     *
     * @param string $faxUser
     *
     * @return User
     */
    public function setFaxUser($faxUser)
    {
        $this->faxUser = $faxUser;

        return $this;
    }

    /**
     * Get faxUser
     *
     * @return string
     */
    public function getFaxUser()
    {
        return $this->faxUser;
    }

    /**
     * Set siteUser
     *
     * @param string $siteUser
     *
     * @return User
     */
    public function setSiteUser($siteUser)
    {
        $this->siteUser = $siteUser;

        return $this;
    }

    /**
     * Get siteUser
     *
     * @return string
     */
    public function getSiteUser()
    {
        return $this->siteUser;
    }

    /**
     * Set situationUser
     *
     * @param string $situationUser
     *
     * @return User
     */
    public function setSituationUser($situationUser)
    {
        $this->situationUser = $situationUser;

        return $this;
    }

    /**
     * Get situationUser
     *
     * @return string
     */
    public function getSituationUser()
    {
        return $this->situationUser;
    }
}
