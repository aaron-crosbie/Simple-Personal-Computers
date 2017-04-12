<?php

/**
 * Created by IntelliJ IDEA.
 * User: Sir Crobie
 * Date: 06/12/2016
 * Time: 10:51
 */
class Motherboard
{
    private $name;
    private $manufacturer;
    private $pcie;
    private $pci;
    private $format;
    private $price;

    function __construct(){
    }

    /**
     * @param $name
     * @param $manufacturer
     * @param $pcie
     * @param $pci
     * @param $formFactor
     * @param $price
     */
    public function setAllVariables($name, $manufacturer, $pcie, $pci, $formFactor, $price){
        $this->name = $name;
        $this->manufacturer = $manufacturer;
        $this->pcie = $pcie;
        $this->pci = $pci;
        $this->format = $formFactor;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @param mixed $manufacturer
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return mixed
     */
    public function getPcie()
    {
        return $this->pcie;
    }

    /**
     * @param mixed $pcie
     */
    public function setPcie($pcie)
    {
        $this->pcie = $pcie;
    }

    /**
     * @return mixed
     */
    public function getPci()
    {
        return $this->pci;
    }

    /**
     * @param mixed $pci
     */
    public function setPci($pci)
    {
        $this->pci = $pci;
    }

    /**
     * @return mixed
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param mixed $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }


}