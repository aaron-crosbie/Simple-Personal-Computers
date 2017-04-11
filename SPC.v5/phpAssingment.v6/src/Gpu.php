<?php

/**
 * Created by IntelliJ IDEA.
 * User: Sir Crobie
 * Date: 06/12/2016
 * Time: 11:45
 */
class Gpu
{
    private $name;
    private $manufacturer;
    private $memory;
    private $processor;
    private $cardBus;
    private $formFactor;
    private $watts;
    private $price;

    function __construct(){
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
    public function getManufactuer()
    {
        return $this->manufacturer;
    }

    /**
     * @param mixed $manufactuer
     */
    public function setManufactuer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return mixed
     */
    public function getMemory()
    {
        return $this->memory;
    }

    /**
     * @param mixed $memory
     */
    public function setMemory($memory)
    {
        $this->memory = $memory;
    }

    /**
     * @return mixed
     */
    public function getProcessor()
    {
        return $this->processor;
    }

    /**
     * @param mixed $processor
     */
    public function setProcessor($processor)
    {
        $this->processor = $processor;
    }

    /**
     * @return mixed
     */
    public function getCardBus()
    {
        return $this->cardBus;
    }

    /**
     * @param mixed $cardBus
     */
    public function setCardBus($cardBus)
    {
        $this->cardBus = $cardBus;
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