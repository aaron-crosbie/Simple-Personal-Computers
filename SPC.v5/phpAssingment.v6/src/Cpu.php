<?php

/**
 * Created by IntelliJ IDEA.
 * User: Sir Crobie
 * Date: 06/12/2016
 * Time: 11:45
 */
class Cpu
{
    private $name;
    private $price;
    private $manufacturer;

    function __construct(){
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setPrice($price){
        $this->price = $price;
    }
    function getName(){
        return $this->name;
    }
    
    function getPrice(){
        return $this->price;
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