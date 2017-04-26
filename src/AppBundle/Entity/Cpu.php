<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cpu
 *
 * @ORM\Table(name="Cpu")
 * @ORM\Entity
 */
class Cpu
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
     * @var int
     *
     * @ORM\Column(name="cores", type="integer")
     */
    private $cores;

    /**
     * @var string
     *
     * @ORM\Column(name="frequency", type="string", length=255)
     */
    private $frequency;

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

    public function setAllSurveyVariables($name, $manufacturer, $cores, $frequency, $watts, $price){
        $this->name = $name;
        $this->manufacturer = $manufacturer;
        $this->cores = $cores;
        $this->frequency = $frequency;
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
     * @return cpu
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
    public function getCores()
    {
        return $this->cores;
    }

    /**
     * @param string $cores
     */
    public function setCores($cores)
    {
        $this->cores = $cores;
    }

    /**
     * @return string
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * @param string $frequency
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;
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


}
