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
    private $price;
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
}