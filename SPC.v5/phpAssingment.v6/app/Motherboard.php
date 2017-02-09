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
//    function __construct(){
//        $this->name = "NULL";
//        $this->price = "NULL";
//    }
    function __construct()
    {
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



}