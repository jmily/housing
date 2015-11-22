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
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;


    /**
     * @ORM\ManyToOne(targetEntity="PropertyType", inversedBy="properties")
     * @ORM\JoinColumn(name="property_type_id", referencedColumnName="id")
     */
    protected $propertyType;

    /**
     * @ORM\ManyToOne(targetEntity="Suburb", inversedBy="properties")
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
     * Set propertyType
     *
     * @param \AppBundle\Entity\PropertyType $propertyType
     *
     * @return Property
     */
    public function setPropertyType(\AppBundle\Entity\PropertyType $propertyType = null)
    {
        $this->propertyType = $propertyType;

        return $this;
    }

    /**
     * Get propertyType
     *
     * @return \AppBundle\Entity\PropertyType
     */
    public function getPropertyType()
    {
        return $this->propertyType;
    }

    /**
     * Set suburb
     *
     * @param \AppBundle\Entity\Suburb $suburb
     *
     * @return Property
     */
    public function setSuburb(\AppBundle\Entity\Suburb $suburb = null)
    {
        $this->suburb = $suburb;

        return $this;
    }

    /**
     * Get suburb
     *
     * @return \AppBundle\Entity\Suburb
     */
    public function getSuburb()
    {
        return $this->suburb;
    }

    /**
     * Add area
     *
     * @param \AppBundle\Entity\Area $area
     *
     * @return Property
     */
    public function addArea(\AppBundle\Entity\Area $area)
    {
        $this->areas[] = $area;

        return $this;
    }

    /**
     * Remove area
     *
     * @param \AppBundle\Entity\Area $area
     */
    public function removeArea(\AppBundle\Entity\Area $area)
    {
        $this->areas->removeElement($area);
    }

    /**
     * Get areas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAreas()
    {
        return $this->areas;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Property
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }
}
