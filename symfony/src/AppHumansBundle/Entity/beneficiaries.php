<?php

namespace AppHumansBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * beneficiaries
 *
 * @ORM\Table(name="beneficiaries")
 * @ORM\Entity(repositoryClass="AppHumansBundle\Repository\beneficiariesRepository")
 */
class beneficiaries
{
    /**
    * @ORM\ManyToMany(targetEntity="AppHumansBundle\Entity\associations", mappedBy="beneficiaries")
    */
    protected $associations;
    
    /**
    * @ORM\OneToMany(targetEntity="AppHumansBundle\Entity\need", mappedBy="beneficiaries")
    */
    protected $need;

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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=255)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="commentary", type="text")
     */
    private $commentary;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_vie", type="string", length=255)
     */
    private $lieuVie;

    /**
     * @var string
     *
     * @ORM\Column(name="type_habitat", type="string", length=255)
     */
    private $typeHabitat;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255, nullable=true)
     */
    private $role;


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
     * Set name
     *
     * @param string $name
     *
     * @return beneficiaries
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     *
     * @return beneficiaries
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set commentary
     *
     * @param string $commentary
     *
     * @return beneficiaries
     */
    public function setCommentary($commentary)
    {
        $this->commentary = $commentary;

        return $this;
    }

    /**
     * Get commentary
     *
     * @return string
     */
    public function getCommentary()
    {
        return $this->commentary;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return beneficiaries
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set lieuVie
     *
     * @param string $lieuVie
     *
     * @return beneficiaries
     */
    public function setLieuVie($lieuVie)
    {
        $this->lieuVie = $lieuVie;

        return $this;
    }

    /**
     * Get lieuVie
     *
     * @return string
     */
    public function getLieuVie()
    {
        return $this->lieuVie;
    }

    /**
     * Set typeHabitat
     *
     * @param string $typeHabitat
     *
     * @return beneficiaries
     */
    public function setTypeHabitat($typeHabitat)
    {
        $this->typeHabitat = $typeHabitat;

        return $this;
    }

    /**
     * Get typeHabitat
     *
     * @return string
     */
    public function getTypeHabitat()
    {
        return $this->typeHabitat;
    }

    /**
     * @param mixed $associations
     */
    public function addAssociations($associations)
    {
        $this->associations[] = $associations;
    }

    /**
     * @return mixed
     */
    public function getAssociations()
    {
        return $this->associations;
    }

    /**
     * @param mixed $associations
     */
    public function setAssociations($associations)
    {
        $this->associations = $associations;
    }

    /**
     * @return mixed
     */
    public function getNeed()
    {
        return $this->need;
    }

    /**
     * @param mixed $need
     */
    public function setNeed($need)
    {
        $this->need = $need;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

}

