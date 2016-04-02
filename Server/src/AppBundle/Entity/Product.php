<?php
// src/AppBundle/Entity/Product.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product
{
    /**
     * @ORM\Column(type="string", length=16)
     * @ORM\Id
     */
    protected $ean;
    /**
     * @ORM\Column(type="string", length=64)
     */
    protected $name;
    /**
     * @ORM\Column(type="float", scale=2)
     */
    protected $price;
    /**
     * @ORM\Column(type="string", length=256)
     */
    protected $description;
    /**
     * @ORM\Column(type="string", length=256)
     */
    protected $smallImageURL;
    /**
     * @ORM\Column(type="string", length=256)
     */
    protected $mediumImageURL;
    /**
     * @ORM\Column(type="string", length=256)
     */
    protected $largeImageURL;
    /**
     * @ORM\Column(type="string", length=256)
     */
    protected $lidlURL;
    /**
     * @ORM\Column(type="boolean")
     */
    protected $availableOnline;
    /**
     * @ORM\Column(type="integer")
     */
    protected $daysForDelivery;
    /**
     * @ORM\Column(type="integer")
     */
    protected $maxOrderQuantity;
    /**
     * @ORM\Column(type="integer")
     */
    protected $stockValue;



    /**
     * Set ean
     *
     * @param integer $ean
     *
     * @return Product
     */
    public function setEan($ean)
    {
        $this->ean = $ean;

        return $this;
    }

    /**
     * Get ean
     *
     * @return string
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Product
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
     * Set price
     *
     * @param float $price
     *
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set smallImageURL
     *
     * @param string $smallImageURL
     *
     * @return Product
     */
    public function setSmallImageURL($smallImageURL)
    {
        $this->smallImageURL = $smallImageURL;

        return $this;
    }

    /**
     * Get smallImageURL
     *
     * @return string
     */
    public function getSmallImageURL()
    {
        return $this->smallImageURL;
    }

    /**
     * Set mediumImageURL
     *
     * @param string $mediumImageURL
     *
     * @return Product
     */
    public function setMediumImageURL($mediumImageURL)
    {
        $this->mediumImageURL = $mediumImageURL;

        return $this;
    }

    /**
     * Get mediumImageURL
     *
     * @return string
     */
    public function getMediumImageURL()
    {
        return $this->mediumImageURL;
    }

    /**
     * Set largeImageURL
     *
     * @param string $largeImageURL
     *
     * @return Product
     */
    public function setLargeImageURL($largeImageURL)
    {
        $this->largeImageURL = $largeImageURL;

        return $this;
    }

    /**
     * Get largeImageURL
     *
     * @return string
     */
    public function getLargeImageURL()
    {
        return $this->largeImageURL;
    }

    /**
     * Set lidlURL
     *
     * @param string $lidlURL
     *
     * @return Product
     */
    public function setLidlURL($lidlURL)
    {
        $this->lidlURL = $lidlURL;

        return $this;
    }

    /**
     * Get lidlURL
     *
     * @return string
     */
    public function getLidlURL()
    {
        return $this->lidlURL;
    }

    /**
     * Set availableOnline
     *
     * @param boolean $availableOnline
     *
     * @return Product
     */
    public function setAvailableOnline($availableOnline)
    {
        $this->availableOnline = $availableOnline;

        return $this;
    }

    /**
     * Get availableOnline
     *
     * @return boolean
     */
    public function getAvailableOnline()
    {
        return $this->availableOnline;
    }

    /**
     * Set daysForDelivery
     *
     * @param integer $daysForDelivery
     *
     * @return Product
     */
    public function setDaysForDelivery($daysForDelivery)
    {
        $this->daysForDelivery = $daysForDelivery;

        return $this;
    }

    /**
     * Get daysForDelivery
     *
     * @return integer
     */
    public function getDaysForDelivery()
    {
        return $this->daysForDelivery;
    }

    /**
     * Set maxOrderQuantity
     *
     * @param integer $maxOrderQuantity
     *
     * @return Product
     */
    public function setMaxOrderQuantity($maxOrderQuantity)
    {
        $this->maxOrderQuantity = $maxOrderQuantity;

        return $this;
    }

    /**
     * Get maxOrderQuantity
     *
     * @return integer
     */
    public function getMaxOrderQuantity()
    {
        return $this->maxOrderQuantity;
    }

    /**
     * Set stockValue
     *
     * @param integer $stockValue
     *
     * @return Product
     */
    public function setStockValue($stockValue)
    {
        $this->stockValue = $stockValue;

        return $this;
    }

    /**
     * Get stockValue
     *
     * @return integer
     */
    public function getStockValue()
    {
        return $this->stockValue;
    }
}
