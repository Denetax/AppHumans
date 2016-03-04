<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as FOSUser;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 */
class User extends FOSUser
{


	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="sexe", type="string", length=255, nullable=true)
	 */
	private $sexe;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="year_born", type="datetime", nullable=true)
	 */
	private $yearBorn;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="phone", type="string", length=255, nullable=true)
	 */
	private $phone;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="adress", type="string", length=255, nullable=true)
	 */
	private $adress;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="cp", type="string", length=255, nullable=true)
	 */
	private $cp;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="city", type="string", length=255, nullable=true)
	 */
	private $city;


	/**
	 * @var string
	 *
	 * @ORM\Column(name="latitude", type="decimal", precision=8, scale=8, nullable=true)
	 */
	private $latitude;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="longitude", type="decimal", precision=10, scale=8, nullable=true)
	 */
	private $longitude;
	/**
	* @ORM\OneToMany(targetEntity="AppHumansBundle\Entity\need", mappedBy="need")
	*/
	protected $need;
	/**
	 * @ORM\ManyToOne(targetEntity="AppHumansBundle\Entity\associations", inversedBy="associations", cascade={"persist"})
	 * @ORM\JoinColumn(nullable=true)
	*/
	private $associations;





	public function __construct()
	{
		parent::__construct();
	}


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
	 * @return User
	 */
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Set sexe
	 *
	 * @param string $sexe
	 *
	 * @return User
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
	 * Set yearBorn
	 *
	 * @param \DateTime $yearBorn
	 *
	 * @return User
	 */
	public function setYearBorn($yearBorn)
	{
		$this->yearBorn = $yearBorn;

		return $this;
	}

	/**
	 * Get yearBorn
	 *
	 * @return \DateTime
	 */
	public function getYearBorn()
	{
		return $this->yearBorn;
	}

	/**
	 * Set phone
	 *
	 * @param string $phone
	 *
	 * @return User
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
	 * Set adress
	 *
	 * @param string $adress
	 *
	 * @return User
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
	 * Set cp
	 *
	 * @param string $cp
	 *
	 * @return User
	 */
	public function setCp($cp)
	{
		$this->cp = $cp;

		return $this;
	}

	/**
	 * Get cp
	 *
	 * @return string
	 */
	public function getCp()
	{
		return $this->cp;
	}

	/**
	 * Set city
	 *
	 * @param string $city
	 *
	 * @return User
	 */
	public function setCity($city)
	{
		$this->city = $city;

		return $this;
	}

	/**
	 * Get city
	 *
	 * @return string
	 */
	public function getCity()
	{
		return $this->city;
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
	 * Set latitude
	 *
	 * @param string $latitude
	 *
	 * @return User
	 */
	public function setLatitude($latitude)
	{
		$this->latitude = $latitude;

		return $this;
	}

	/**
	 * Get latitude
	 *
	 * @return string
	 */
	public function getLatitude()
	{
		return $this->latitude;
	}

	/**
	 * Set longitude
	 *
	 * @param string $longitude
	 *
	 * @return User
	 */
	public function setLongitude($longitude)
	{
		$this->longitude = $longitude;

		return $this;
	}

	/**
	 * Get longitude
	 *
	 * @return string
	 */
	public function getLongitude()
	{
		return $this->longitude;
	}
}



