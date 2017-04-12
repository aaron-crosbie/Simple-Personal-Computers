<?php

/**
 * Created by IntelliJ IDEA.
 * User: Aaron Crosbie: B00082567
 * Date: 06/12/2016
 * Time: 11:47
 */

require_once('Motherboard.php');
require_once('Cpu.php');
require_once('Gpu.php');
require_once('Hdd.php');
require_once('Ram.php');
require_once('Ssd.php');
require_once('Psu.php');

use itb\DbManager;
require_once('DbManager.php');

class ComponentController
{
    //***************DEFAULT VARIABLES FOR EACH CLASS******************
    protected $price;
    protected $motherboard;
    protected $cpu;
    protected $gpu;
    protected $ram;
    protected $psu;
    protected $hdd;
    protected $ssd;
    protected $dbMgr;

    //*****************CHOICES FROM FORM INPUT*******************
    private $motherboardPref;
    private $cpuPref;
    private $gpuPref;
    private $ramPref;
    private $hddSize;
    private $ssdSize;

    /**
     * Controller constructor.
     * @param $price
     * @param $motherboardPref
     * @param $cpuPref
     * @param $gpuPref
     * @param $ramPref
     * @param $hddSize
     * @param $ssdSize
     * Initialises all component classes & takes in form data for later use
     */
    function __construct($price, $motherboardPref, $cpuPref, $gpuPref, $ramPref, $hddSize, $ssdSize)
    {
        //Instantiates all component classes
        $this->motherboard = new Motherboard();
        $this->cpu = new Cpu();
        $this->gpu = new Gpu();
        $this->ram = new Ram();
        $this->psu = new Psu();
        $this->hdd = new Hdd();
        $this->ssd = new Ssd();
        $this->dbMgr = new DbManager();

        //Instantiates all preferences
        $this->price = $price;
        $this->motherboardPref = $motherboardPref;
        $this->cpuPref = $cpuPref;
        $this->gpuPref = $gpuPref;
        $this->ramPref = $ramPref;
        $this->hddSize = $hddSize;
        $this->ssdSize = $ssdSize;
    }

    /**
     * @param $motherboard
     */
    function setMotherboard($motherboard){
        $this->motherboard = $motherboard;
        echo "<b>Motherboard:</b><br>Name: " . $this->motherboard->getName() . "<br>Manufacturer: " . $this->motherboard->getManufacturer()
            . "<br>Form Factor: " . $this->motherboard->getFormat() . "<br>Price: " . $this->motherboard->getPrice() . "<hr>";
    }


    function setCpu($cpu){
        $this->cpu = $cpu;
        echo "<b>CPU:</b><br>Name: " . $this->cpu->getName() . "<br>Manufacturer: " . $this->cpu->getManufacturer()
            . "<br>Cores: " . $this->cpu->getCores() . "<br>Price: " . $this->cpu->getPrice();
    }

    function setGpu($gpu){
        $this->gpu = $gpu;
        echo "<br><b>GPU:</b><br>Name: " . $this->gpu->getName() . "<br>Manufacturer: " . $this->gpu->getManufacturer()
            . "<br>Form Factor: " . $this->gpu->getFormFactor() . "<br>Price: " . $this->gpu->getPrice();
    }

    function setRam($ram){

    }

    function setPsu($psu){

    }

    function setHdd($hdd){

    }

    function setSsd($ssd){

    }

    /**
     * @return Motherboard name
     */
    function getMotherboardName(){
        return $this->motherboard->getName();
    }

    /**
     * @return Motherboard price
     */
    function getMotherboardPrice(){
        return $this->motherboard->getPrice();
    }

    /**
     * @return CPU name
     */
    function getCpuName(){
        return $this->cpu->getName();
    }

    /**
     * @return CPU price
     */
    function getCpuPrice(){
        return $this->cpu->getPrice();
    }

    /**
     * @return GPU name
     */
    function getGpuName(){
        return $this->gpu->getName();
    }

    /**
     * @return GPU price
     */
    function getGpuPrice(){
        return $this->gpu->getPrice();
    }

    /**
     * @return Ram name
     */
    function getRamName(){
        return $this->ram->getName();
    }

    /**
     * @return Ram price
     */
    function getRamPrice(){
        return $this->ram->getPrice();
    }

    /**
     * @return HDD name
     */
    function getHddName(){
        return $this->hdd->getName();
    }

    /**
     * @return HDD price
     */
    function getHddPrice(){
        return $this->hdd->getPrice();
    }

    /**
     * @return SSD name
     */
    function getSsdName(){
        return $this->ssd->getName();
    }

    /**
     * @return SSD price
     */
    function getSsdPrice(){
        return $this->ssd->getPrice();
    }

    /**
     * @return string
     * Calls method to assemble components & returns price
     */
    function surveyAnalysis(){
        $price = (int)$this->price;
        $this->buildComputer($price);
    }

    function buildComputer($price){
        $tempPrice = 0;
        $maxPrice = $price;

        $this->setMotherboard($this->dbMgr->chooseMotherboard($this->motherboardPref, $maxPrice));
        $this->setCpu($this->dbMgr->chooseCpu($this->cpuPref, $maxPrice));
        $this->setGpu($this->dbMgr->chooseGpu($this->gpuPref, $maxPrice));

    }

//    /**
//     * @param $price
//     * @param $msg
//     * @return string
//     * Sets the components for PC build and returns price value
//     */
//    function lowEnd($price){
//        $tempPrice = 0;
//        //Assigns motherboard
//        if($price == 800 && $this->motherboardPref == "asus"){
//            $this->setMotherboard("ASUS Z170 Pro", "200");
//            $tempPrice += 200;
//        }
//        else if($price == 1000 && $this->motherboardPref == "asus"){
//            $this->setMotherboard("ASUS Z170 Pro", "200");
//            $tempPrice += 200;
//        }
//        if($price == 800 && $this->motherboardPref == "msi"){
//            $this->setMotherboard("MSI B150 Gaming M3", "110");
//            $tempPrice += 110;
//        }
//        else if($price == 1000 && $this->motherboardPref == "msi"){
//            $this->setMotherboard("MSI B150 Gaming M3", "110");
//            $tempPrice += 200;
//        }
//        if($price == 800 && $this->motherboardPref == "gigabyte"){
//            $this->setMotherboard("Gigabyte Ga-900X-Gaming SLI", "100");
//            $tempPrice += 110;
//        }
//        else if($price == 1000 && $this->motherboardPref == "gigabyte"){
//            $this->setMotherboard("Gigabyte Z170-Gaming K3", "120");
//            $tempPrice += 200;
//        }
//
//        //Assigns CPU
//        if($price == 800 && $this->cpuPref == "intel"){
//            $this->setCpu("Intel Core i3-6100", "117");
//            $tempPrice += 117;
//        }
//        else if($price == 1000 && $this->cpuPref == "intel"){
//            $this->setCpu("Intel Core 15-6600", "245");
//            $tempPrice += 245;
//        }
//        if($price == 800 && $this->cpuPref == "amd"){
//            $this->setCpu("AMD FX-8370", "180");
//            $tempPrice += 180;
//        }
//        else if($price == 1000 && $this->cpuPref == "amd") {
//            $this->setCpu("AMD FX-8370", "180");
//            $tempPrice += 180;
//        }
//
//        //Assign GPU
//        if($price == 800 || $price == 1000 && $this->gpuPref == "nvidia"){
//            $this->setGpu("Gigabyte GeForce GTX 1060 G1", "300");
//            $tempPrice += 300;
//        }
//        if($price == 800 && $this->gpuPref == "amd"){
//            $this->setGpu("AMD Raedon 280X", "250");
//            $tempPrice += 250;
//        }
//        else if($price == 1000 && $this->gpuPref == "amd"){
//            $this->setGpu("AMD R9 Fury X", "400");
//            $tempPrice += 400;
//        }
//
//        //Assigns Ram
//        if($this->ramSize == "4"){
//            $this->setRam("Kingston 4GB", 20);
//        }
//        else if($this->ramSize == "8"){
//            $this->setRam("Kingston 8GB", 40);
//        }
//        else if($this->ramSize == "16"){
//            $this->setRam("Kingston 16GB", 60);
//        }
//        else if($this->ramSize == "32"){
//            $this->setRam("Kingston 32GB", 80);
//        }
//
//        //Assigns HDD
//        if($this->hddSize == "1"){
//            $this->setHdd("1TB", 30);
//            $tempPrice += 30;
//        }
//        else if($this->hddSize == "2"){
//            $this->setHdd("2TB", 50);
//            $tempPrice += 50;
//        }
//        else if($this->hddSize == "3"){
//            $this->setHdd("3TB", 60);
//            $tempPrice += 60;
//        }
//        else if($this->hddSize == "4"){
//            $this->setHdd("4TB", 70);
//            $tempPrice += 70;
//        }
//
//        //Assigns SSD
//        if($this->ssdSize == "0"){
//            $this->setSsd("No SSD required", 0);
//        }
//        else if($this->ssdSize == "128"){
//            $this->setSsd("128GB", 80);
//            $tempPrice += 80;
//        }
//        else if($this->ssdSize == "256"){
//            $this->setSsd("256GB", 100);
//            $tempPrice += 80;
//        }
//        else if($this->ssdSize == "512"){
//            $this->setSsd("128GB", 110);
//            $tempPrice += 80;
//        }
//        if($tempPrice <= $price) {
//            $msg = "&euro;" . $tempPrice;
//        }
//        else {
//            $msg = "&euro;" . $tempPrice;
//        }
//        return $msg;
//    }
//
//    //Coming soon ;]
//    function highEnd($price){
//        $tempPrice = 0;
//
//        if($price == 1200 && $this->motherboardPref == "asus"){
//            $this->setMotherboard("ASUS Z170 Pro", "200");
//            $tempPrice += 200;
//        }
//        else if($price == 2000 && $this->motherboardPref == "asus"){
//            $this->setMotherboard("ASUS Z170 Pro", "200");
//            $tempPrice += 200;
//        }
//        if($price == 1200 || $price == 2000 && $this->motherboardPref == "msi"){
//            $this->setMotherboard("MSI B150 Gaming M3", "110");
//            $tempPrice += 110;
//        }
//        if($price == 1200 || $price == 2000 && $this->motherboardPref == "gigabyte"){
//            $this->setMotherboard("Gigabyte Ga-900X-Gaming SLI", "100");
//            $tempPrice += 110;
//        }
//
//        //Assigns CPU
//        if($price == 1200 && $this->cpuPref == "intel"){
//            $this->setCpu("Intel Core i5-6600k", "243");
//            $tempPrice += 243;
//        }
//        else if($price == 2000 && $this->cpuPref == "intel"){
//            $this->setCpu("Intel Core 17-5820K", "396");
//            $tempPrice += 396;
//        }
//        if($price == 1200 && $this->cpuPref == "amd"){
//            $this->setCpu("AMD FX-8370", "180");
//            $tempPrice += 180;
//        }
//        else if($price == 2000 && $this->cpuPref == "amd") {
//            $this->setCpu("AMD FX-8370", "180");
//            $tempPrice += 180;
//        }
//
//
//        //Assign GPU
//        if($price == 1200 && $this->gpuPref == "nvidia"){
//            $this->setGpu("NVIDIA 1080i", "550");
//            $tempPrice += 550;
//        }
//        else if($price == 2000 && $this->gpuPref == "nvidia"){
//            $this->setGpu("NVIDIA TITAN X", "1000");
//            $tempPrice += 1000;
//        }
//        if($price >= 1200 && $this->gpuPref == "amd"){
//            $this->setGpu("AMD R9 Fury X", "600");
//            $tempPrice += 600;
//        }
//
//        //Assigns Ram
//        if($this->ramSize == "4"){
//            $this->setRam("Kingston 4GB", 20);
//        }
//        else if($this->ramSize == "8"){
//            $this->setRam("Kingston 8GB", 40);
//        }
//        else if($this->ramSize == "16"){
//            $this->setRam("Kingston 16GB", 60);
//        }
//        else if($this->ramSize == "32"){
//            $this->setRam("Kingston 32GB", 80);
//        }
//
//        //Assigns HDD size
//        if($this->hddSize == "1"){
//            $this->setHdd("1TB", 30);
//            $tempPrice += 30;
//        }
//        else if($this->hddSize == "2"){
//            $this->setHdd("2TB", 50);
//            $tempPrice += 50;
//        }
//        else if($this->hddSize == "3"){
//            $this->setHdd("3TB", 60);
//            $tempPrice += 60;
//        }
//        else if($this->hddSize == "4"){
//            $this->setHdd("4TB", 70);
//            $tempPrice += 70;
//        }
//
//        //Assigns SSD size
//        if($this->ssdSize == "0"){
//            $this->setSsd("No SSD required", 0);
//        }
//        else if($this->ssdSize == "128"){
//            $this->setSsd("128GB", 80);
//            $tempPrice += 80;
//        }
//        else if($this->ssdSize == "256"){
//            $this->setSsd("256GB", 100);
//            $tempPrice += 80;
//        }
//        else if($this->ssdSize == "512"){
//            $this->setSsd("128GB", 110);
//            $tempPrice += 80;
//        }
//
//        if($tempPrice <= $price) {
//            $msg = "&euro;" . $tempPrice;
//        }
//        else {
//            $msg = "&euro;" . $tempPrice;
//        }
//        return $msg;
//    }
}