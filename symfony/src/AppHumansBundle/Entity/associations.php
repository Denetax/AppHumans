<?php

namespace AppHumansBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * associations
 *
 * @ORM\Table(name="associations")
 * @ORM\Entity(repositoryClass="AppHumansBundle\Repository\associationsRepository")
 */
class associations
{
    /**
     * @ORM\ManyToMany(targetEntity="AppHumansBundle\Entity\beneficiaries", inversedBy="beneficiaries", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
    */
    private $beneficiaries;

    /**
    * @ORM\OneToMany(targetEntity="AppHumansBundle\Entity\User", mappedBy="User")
    */
    protected $user;
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
     * @ORM\Column(name="adress", type="string", length=255)
     */
    private $adress;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="type_entite", type="string", length=255)
     */
    private $typeEntite;

    /**
     * @var string
     *
     * @ORM\Column(name="department", type="string", length=255)
     */
    private $department;


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
     * @return associations
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
     * Set adress
     *
     * @param string $adress
     *
     * @return associations
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return associations
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
     * Set email
     *
     * @param string $email
     *
     * @return associations
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set typeEntite
     *
     * @param string $typeEntite
     *
     * @return associations
     */
    public function setTypeEntite($typeEntite)
    {
        $this->typeEntite = $typeEntite;

        return $this;
    }

    /**
     * Get typeEntite
     *
     * @return string
     */
    public function getTypeEntite()
    {
        return $this->typeEntite;
    }

    /**
     * Set department
     *
     * @param string $department
     *
     * @return associations
     */
    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return string
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaries()
    {
        return $this->beneficiaries;
    }

    /**
     * @param mixed $beneficiaries
     */
    public function setBeneficiaries($beneficiaries)
    {
        $this->beneficiaries = $beneficiaries;
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

