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
    private $price;
    private $manufacturer;

    function __construct(){
    }

    function getName(){
        return $this->name;
    }

    function getPrice(){
        return $this->price;
    }
    
    function setName($name){
        $this->name = $name;
    }
    
    function setPrice($price){
        $this-> price = $price;
    }

    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

}