<?php
// src/Entity/Contrat.php
namespace AppBundle\Entity;

use \DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity()
 * @ORM\Table(name="contrat")
 */
class Contrat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $entreprise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commentaire;

    /**
     * @var \DateTime
     * @ORM\Column( type="datetime")
     */
    private $sub;


    /**
     * @ORM\Column( type="boolean")
     */
    private $isAccept;



    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $offrePdf;

    /**
     * Many features have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="User", inversedBy="demandes")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;


    public function __construct()
    {
        $this->sub = new \DateTime();
        $this->isAccept = false;
    }



    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * @return mixed
     */
    public function getIsAccept()
    {
        return $this->isAccept;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getSub()
    {
        return $this->sub;
    }

    /**
     * @param mixed $entreprise
     */
    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;
    }

    /**
     * @param mixed $isAccept
     */
    public function setIsAccept($isAccept)
    {
        $this->isAccept = $isAccept;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @param mixed $sub
     */
    public function setSub($sub)
    {
        $this->sub = $sub;
    }

    /**
     * @return mixed
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * @param mixed $commentaire
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }

    /**
     * @return mixed
     */
    public function getOffrePdf()
    {
        return $this->offrePdf;
    }

    /**
     * @param mixed $offrePdf
     */
    public function setOffrePdf($offrePdf)
    {
        $this->offrePdf = $offrePdf;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
}