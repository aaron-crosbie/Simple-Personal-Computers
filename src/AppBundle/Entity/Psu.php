<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * psu
 *
 * @ORM\Table(name="Psu")
 * @ORM\Entity
 */
class Psu
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
     * @ORM\Column(name="formFactor", type="string", length=255)
     */
    private $formFactor;

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

    function __construct()
    {
    }

    public function setAllSurveyVariables($name, $manufacturer, $formFactor, $watts, $price){
        $this->name = $name;
        $this->manufacturer = $manufacturer;
        $this->formFactor = $formFactor;
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
     * @return psu
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
    public function getFormFactor()
    {
        return $this->formFactor;
    }

    /**
     * @param string $formFactor
     */
    public function setFormFactor($formFactor)
    {
        $this->formFactor = $formFactor;
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
