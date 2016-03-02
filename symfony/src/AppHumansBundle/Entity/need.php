<?php

namespace AppHumansBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * need
 *
 * @ORM\Table(name="need")
 * @ORM\Entity(repositoryClass="AppHumansBundle\Repository\needRepository")
 */
class need
{
    /**
     * @ORM\ManyToOne(targetEntity="AppHumansBundle\Entity\User", inversedBy="User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
    */
    private $User;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppHumansBundle\Entity\beneficiaries", inversedBy="beneficiaries", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
    */
    private $beneficiaries;

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
     * @ORM\Column(name="need_categories", type="string", length=255)
     */
    private $needCategories;

    /**
     * @var string
     *
     * @ORM\Column(name="creation_date", type="string", length=255)
     */
    private $creationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="response_date", type="string", length=255)
     */
    private $responseDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="alert", type="boolean", nullable=true)
     */
    private $alert;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;


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
     * Set needCategories
     *
     * @param string $needCategories
     *
     * @return need
     */
    public function setNeedCategories($needCategories)
    {
        $this->needCategories = $needCategories;

        return $this;
    }

    /**
     * Get needCategories
     *
     * @return string
     */
    public function getNeedCategories()
    {
        return $this->needCategories;
    }

    /**
     * Set creationDate
     *
     * @param string $creationDate
     *
     * @return need
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return string
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set responseDate
     *
     * @param string $responseDate
     *
     * @return need
     */
    public function setResponseDate($responseDate)
    {
        $this->responseDate = $responseDate;

        return $this;
    }

    /**
     * Get responseDate
     *
     * @return string
     */
    public function getResponseDate()
    {
        return $this->responseDate;
    }

    /**
     * Set alert
     *
     * @param boolean $alert
     *
     * @return need
     */
    public function setAlert($alert)
    {
        $this->alert = $alert;

        return $this;
    }

    /**
     * Get alert
     *
     * @return bool
     */
    public function getAlert()
    {
        return $this->alert;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return need
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}

