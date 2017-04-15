<?php

class Psu
{
    private $name;
    private $manufacturer;
    private $formFactor;
    private $watts;
    private $price;

    function __construct()
    {
    }

    public function setAllVariables($name, $manufacturer, $formFactor, $watts, $price){
        $this->name = $name;
        $this->manufacturer = $manufacturer;
        $this->formFactor = $formFactor;
        $this->watts = $watts;
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
    public function getFormFactor()
    {
        return $this->formFactor;
    }

    /**
     * @param mixed $formFactor
     */
    public function setFormFactor($formFactor)
    {
        $this->formFactor = $formFactor;
    }

    /**
     * @return mixed
     */
    public function getWatts()
    {
        return $this->watts;
    }

    /**
     * @param mixed $watts
     */
    public function setWatts($watts)
    {
        $this->watts = $watts;
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