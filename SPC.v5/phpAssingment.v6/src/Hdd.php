<?php

/**
 * Created by IntelliJ IDEA.
 * User: Sir Crobie
 * Date: 06/12/2016
 * Time: 11:45
 */
class Hdd
{
    private $name;
    private $price;
    private $storage;
    private $manufactuerer;

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

    public function getStorage()
    {
        return $this->storage;
    }

    public function setStorage($storage)
    {
        $this->storage = $storage;
    }

    public function getManufactuerer()
    {
        return $this->manufactuerer;
    }

    public function setManufactuerer($manufactuerer)
    {
        $this->manufactuerer = $manufactuerer;
    }

}