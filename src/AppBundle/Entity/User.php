<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Contrat", mappedBy="user")
     */
    private $demandes;

    public function __construct()
    {
        parent::__construct();
        $this->demandes = new ArrayCollection();
        }

        public function addDemande($demande)
        {
            $this->demandes[] = $demande;
            $demande->setUser($this);
        }

        public function removeDemande($demande)
        {
            $this->demandes->remove($demande);

        }

        public function getDemandes()
        {
            return $this->demandes;
        }
}