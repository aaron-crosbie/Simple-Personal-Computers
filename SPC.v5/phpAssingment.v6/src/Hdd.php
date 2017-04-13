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
    private $storage;
    private $watts;
    private $price;

    function __construct(){
    }

    public function setAllVariables($name, $storage, $watts, $price){
        $this->name = $name;
        $this->storage = $storage;
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
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * @param mixed $storage
     */
    public function setStorage($storage)
    {
        $this->storage = $storage;
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