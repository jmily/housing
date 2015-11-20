<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Property
 *
 * @ORM\Table(name="property")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PropertyRepository")
 */
class Property
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
     * @ORM\Column(name="landSize", type="string", length=255)
     */
    private $landSize;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var float
     *
     * @ORM\Column(name="soldPrice", type="float")
     */
    private $soldPrice;

    /**
     * @var int
     *
     * @ORM\Column(name="numberOfBathRoom", type="integer")
     */
    private $numberOfBathRoom;

    /**
     * @var int
     *
     * @ORM\Column(name="numOfGarage", type="integer")
     */
    private $numOfGarage;


    /**
     * @ORM\ManyToOne(targetEntity="PropertyType", inversedBy="properties")
     * @ORM\JoinColumn(name="property_type_id", referencedColumnName="id")
     */
    protected $propertyType;

    /**
     * @ORM\ManyToOne(targetEntity="Area", inversedBy="properties")
     * @ORM\JoinColumn(name="suburb_id", referencedColumnName="id")
     */
    protected $suburb;


    /**
     * @ORM\OneToMany(targetEntity="Area", mappedBy="property")
     */
    protected $areas;

    public function __construct()
    {
        $this->areas = new ArrayCollection();
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
     * Set landSize
     *
     * @param string $landSize
     *
     * @return Property
     */
    public function setLandSize($landSize)
    {
        $this->landSize = $landSize;

        return $this;
    }

    /**
     * Get landSize
     *
     * @return string
     */
    public function getLandSize()
    {
        return $this->landSize;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Property
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set soldPrice
     *
     * @param float $soldPrice
     *
     * @return Property
     */
    public function setSoldPrice($soldPrice)
    {
        $this->soldPrice = $soldPrice;

        return $this;
    }

    /**
     * Get soldPrice
     *
     * @return float
     */
    public function getSoldPrice()
    {
        return $this->soldPrice;
    }

    /**
     * Set numberOfBathRoom
     *
     * @param integer $numberOfBathRoom
     *
     * @return Property
     */
    public function setNumberOfBathRoom($numberOfBathRoom)
    {
        $this->numberOfBathRoom = $numberOfBathRoom;

        return $this;
    }

    /**
     * Get numberOfBathRoom
     *
     * @return int
     */
    public function getNumberOfBathRoom()
    {
        return $this->numberOfBathRoom;
    }

    /**
     * Set numOfGarage
     *
     * @param integer $numOfGarage
     *
     * @return Property
     */
    public function setNumOfGarage($numOfGarage)
    {
        $this->numOfGarage = $numOfGarage;

        return $this;
    }

    /**
     * Get numOfGarage
     *
     * @return int
     */
    public function getNumOfGarage()
    {
        return $this->numOfGarage;
    }
}

