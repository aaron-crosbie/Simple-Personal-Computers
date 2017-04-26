<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ssd
 *
 * @ORM\Table(name="Ssd")
 * @ORM\Entity
 */
class Ssd
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="manufacturer", type="string", length=255)
     */
    private $manufacturer;

    /**
     * @var string
     *
     * @ORM\Column(name="storageCap", type="string", length=255)
     */
    private $storageCap;

    /**
     * @var int
     *
     * @ORM\Column(name="watts", type="integer")
     */
    private $watts;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    function __construct(){
    }

    public function setAllSurveyVariables($name, $storageCap, $watts, $price){
        $this->name = $name;
        $this->storageCap = $storageCap;
        $this->watts = $watts;
        $this->price = $price;
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
     * @return ssd
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
     * @return string
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @param string $manufacturer
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return string
     */
    public function getStorage()
    {
        return $this->storageCap;
    }

    /**
     * @param string $storageCap
     */
    public function setStorage($storageCap)
    {
        $this->storageCap = $storageCap;
    }

    /**
     * @return int
     */
    public function getWatts()
    {
        return $this->watts;
    }

    /**
     * @param int $watts
     */
    public function setWatts($watts)
    {
        $this->watts = $watts;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function unsetVariables()
    {
        $this->name = null;
        $this->manufacturer = null;
        $this->storageCap = null;
        $this->watts = 0;
        $this->price = 0;
    }


}
