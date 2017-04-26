<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Motherboard
 *
 * @ORM\Table(name="Motherboard")
 * @ORM\Entity
 */
class Motherboard
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
     * @ORM\Column(name="pcie", type="integer")
     */
    private $pcie;

    /**
     * @var int
     *
     * @ORM\Column(name="pci", type="integer")
     */
    private $pci;

    /**
     * @var string
     *
     * @ORM\Column(name="ramType", type="string", length=255)
     */
    private $ramType;

    /**
     * @var string
     *
     * @ORM\Column(name="format", type="string", length=255)
     */
    private $format;

    /**
     * @var int
     *
     * @ORM\Column(name="price, type="integer")
     */
    private $price;

    function __construct(){
    }

    public function setAllSurveyVariables($name, $manufacturer, $pcie, $pci, $ramType, $formFactor, $price){
        $this->name = $name;
        $this->manufacturer = $manufacturer;
        $this->pcie = $pcie;
        $this->pci = $pci;
        $this->ramType = $ramType;
        $this->format = $formFactor;
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
     * @return motherboard
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
     * @return int
     */
    public function getPcie()
    {
        return $this->pcie;
    }

    /**
     * @param int $pcie
     */
    public function setPcie($pcie)
    {
        $this->pcie = $pcie;
    }

    /**
     * @return int
     */
    public function getPci()
    {
        return $this->pci;
    }

    /**
     * @param int $pci
     */
    public function setPci($pci)
    {
        $this->pci = $pci;
    }

    /**
     * @return string
     */
    public function getRamType()
    {
        return $this->ramType;
    }

    /**
     * @param string $ramType
     */
    public function setRamType($ramType)
    {
        $this->ramType = $ramType;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }


}
