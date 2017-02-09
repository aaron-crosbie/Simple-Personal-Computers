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

class Controller
{
    //***************DEFAULT VARIABLES FOR EACH CLASS******************
    protected $price;
    protected $motherboard;
    protected $cpu;
    protected $gpu;
    protected $ram;
    protected $hdd;
    protected $ssd;

    //*****************CHOICES FROM FORM INPUT*******************
    private $motherboardPref;
    private $cpuPref;
    private $gpuPref;
    private $hddSize;
    private $ssdSize;

    /**
     * Controller constructor.
     * @param $price
     * @param $motherboardPref
     * @param $cpuPref
     * @param $gpuPref
     * @param $ramSize
     * @param $hddSize
     * @param $ssdSize
     * Initialises all component classes & takes in form data for later use
     */
    function __construct($price, $motherboardPref, $cpuPref, $gpuPref, $ramSize, $hddSize, $ssdSize)
    {
        //Instantiates all component classes
        $this->motherboard = new Motherboard();
        $this->cpu = new Cpu();
        $this->gpu = new Gpu();
        $this->ram = new Ram();
        $this->hdd = new Hdd();
        $this->ssd = new Ssd();

        //Instantiates all preferences
        $this->price = $price;
        $this->motherboardPref = $motherboardPref;
        $this->cpuPref = $cpuPref;
        $this->gpuPref = $gpuPref;
        $this->ramSize = $ramSize;
        $this->hddSize = $hddSize;
        $this->ssdSize = $ssdSize;
    }

    /**
     * @param $mbName
     * @param $mbPrice
     * Sets name & price of Motherboard
     */
    function setMotherboard($mbName, $mbPrice){
        $this->motherboard->setName($mbName);
        $this->motherboard->setPrice($mbPrice);
    }

    /**
     * @param $cpuName
     * @param $cpuPrice
     * Sets name & price of CPU
     */
    function setCpu($cpuName, $cpuPrice){
        $this->cpu->setName($cpuName);
        $this->cpu->setPrice($cpuPrice);
    }

    /**
     * @param $gpuName
     * @param $gpuPrice
     * Sets name & price of GPU
     */
    function setGpu($gpuName, $gpuPrice){
        $this->gpu->setName($gpuName);
        $this->gpu->setPrice($gpuPrice);
    }

    /**
     * @param $ramName
     * @param $ramPrice
     * Sets name & price of Ram
     */
    function setRam($ramName, $ramPrice){
        $this->ram->setName($ramName);
        $this->ram->setPrice($ramPrice);
    }

    /**
     * @param $hddName
     * @param $hddPrice
     * Sets name & price of HDD
     */
    function setHdd($hddName, $hddPrice){
        $this->hdd->setName($hddName);
        $this->hdd->setPrice($hddPrice);
    }

    /**
     * @param $ssdName
     * @param $ssdPrice
     * Sets name & price of SSD
     */
    function setSsd($ssdName, $ssdPrice){
        $this->ssd->setName($ssdName);
        $this->ssd->setPrice($ssdPrice);
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
        $msg = "hello";
        if($this->price == "800"){
            $price = 800;
            $msg = $this->lowEnd($price);
        }
        else if($this->price == "1000"){
            $price = 1000;
            $msg = $this->lowEnd($price);
        }
        else if($this->price == "1200"){
            $price = 1200;
            $msg = $this->highEnd($price);
        }
        else if($this->price == "1200" || $this->price == "2000"){
            $price = 2000;
            $msg = $this->highEnd($price);
        }
        return $msg;
    }

    /**
     * @param $price
     * @param $msg
     * @return string
     * Sets the components for PC build and returns price value
     */
    function lowEnd($price){
        $tempPrice = 0;
        //Assigns motherboard
        if($price == 800 && $this->motherboardPref == "asus"){
            $this->setMotherboard("ASUS Z170 Pro", "200");
            $tempPrice += 200;
        }
        else if($price == 1000 && $this->motherboardPref == "asus"){
            $this->setMotherboard("ASUS Z170 Pro", "200");
            $tempPrice += 200;
        }
        if($price == 800 && $this->motherboardPref == "msi"){
            $this->setMotherboard("MSI B150 Gaming M3", "110");
            $tempPrice += 110;
        }
        else if($price == 1000 && $this->motherboardPref == "msi"){
            $this->setMotherboard("MSI B150 Gaming M3", "110");
            $tempPrice += 200;
        }
        if($price == 800 && $this->motherboardPref == "gigabyte"){
            $this->setMotherboard("Gigabyte Ga-900X-Gaming SLI", "100");
            $tempPrice += 110;
        }
        else if($price == 1000 && $this->motherboardPref == "gigabyte"){
            $this->setMotherboard("Gigabyte Z170-Gaming K3", "120");
            $tempPrice += 200;
        }

        //Assigns CPU
        if($price == 800 && $this->cpuPref == "intel"){
            $this->setCpu("Intel Core i3-6100", "117");
            $tempPrice += 117;
        }
        else if($price == 1000 && $this->cpuPref == "intel"){
            $this->setCpu("Intel Core 15-6600", "245");
            $tempPrice += 245;
        }
        if($price == 800 && $this->cpuPref == "amd"){
            $this->setCpu("AMD FX-8370", "180");
            $tempPrice += 180;
        }
        else if($price == 1000 && $this->cpuPref == "amd") {
            $this->setCpu("AMD FX-8370", "180");
            $tempPrice += 180;
        }

        //Assign GPU
        if($price == 800 || $price == 1000 && $this->gpuPref == "nvidia"){
            $this->setGpu("Gigabyte GeForce GTX 1060 G1", "300");
            $tempPrice += 300;
        }
        if($price == 800 && $this->gpuPref == "amd"){
            $this->setGpu("AMD Raedon 280X", "250");
            $tempPrice += 250;
        }
        else if($price == 1000 && $this->gpuPref == "amd"){
            $this->setGpu("AMD R9 Fury X", "400");
            $tempPrice += 400;
        }

        //Assigns Ram
        if($this->ramSize == "4"){
            $this->setRam("Kingston 4GB", 20);
        }
        else if($this->ramSize == "8"){
            $this->setRam("Kingston 8GB", 40);
        }
        else if($this->ramSize == "16"){
            $this->setRam("Kingston 16GB", 60);
        }
        else if($this->ramSize == "32"){
            $this->setRam("Kingston 32GB", 80);
        }

        //Assigns HDD
        if($this->hddSize == "1"){
            $this->setHdd("1TB", 30);
            $tempPrice += 30;
        }
        else if($this->hddSize == "2"){
            $this->setHdd("2TB", 50);
            $tempPrice += 50;
        }
        else if($this->hddSize == "3"){
            $this->setHdd("3TB", 60);
            $tempPrice += 60;
        }
        else if($this->hddSize == "4"){
            $this->setHdd("4TB", 70);
            $tempPrice += 70;
        }

        //Assigns SSD
        if($this->ssdSize == "0"){
            $this->setSsd("No SSD required", 0);
        }
        else if($this->ssdSize == "128"){
            $this->setSsd("128GB", 80);
            $tempPrice += 80;
        }
        else if($this->ssdSize == "256"){
            $this->setSsd("256GB", 100);
            $tempPrice += 80;
        }
        else if($this->ssdSize == "512"){
            $this->setSsd("128GB", 110);
            $tempPrice += 80;
        }
        if($tempPrice <= $price) {
            $msg = "&euro;" . $tempPrice;
        }
        else {
            $msg = "&euro;" . $tempPrice;
        }
        return $msg;
    }

    //Coming soon ;]
    function highEnd($price){
        $tempPrice = 0;

        if($price == 1200 && $this->motherboardPref == "asus"){
            $this->setMotherboard("ASUS Z170 Pro", "200");
            $tempPrice += 200;
        }
        else if($price == 2000 && $this->motherboardPref == "asus"){
            $this->setMotherboard("ASUS Z170 Pro", "200");
            $tempPrice += 200;
        }
        if($price == 1200 || $price == 2000 && $this->motherboardPref == "msi"){
            $this->setMotherboard("MSI B150 Gaming M3", "110");
            $tempPrice += 110;
        }
        if($price == 1200 || $price == 2000 && $this->motherboardPref == "gigabyte"){
            $this->setMotherboard("Gigabyte Ga-900X-Gaming SLI", "100");
            $tempPrice += 110;
        }

        //Assigns CPU
        if($price == 1200 && $this->cpuPref == "intel"){
            $this->setCpu("Intel Core i5-6600k", "243");
            $tempPrice += 243;
        }
        else if($price == 2000 && $this->cpuPref == "intel"){
            $this->setCpu("Intel Core 17-5820K", "396");
            $tempPrice += 396;
        }
        if($price == 1200 && $this->cpuPref == "amd"){
            $this->setCpu("AMD FX-8370", "180");
            $tempPrice += 180;
        }
        else if($price == 2000 && $this->cpuPref == "amd") {
            $this->setCpu("AMD FX-8370", "180");
            $tempPrice += 180;
        }


        //Assign GPU
        if($price == 1200 && $this->gpuPref == "nvidia"){
            $this->setGpu("NVIDIA 1080i", "550");
            $tempPrice += 550;
        }
        else if($price == 2000 && $this->gpuPref == "nvidia"){
            $this->setGpu("NVIDIA TITAN X", "1000");
            $tempPrice += 1000;
        }
        if($price >= 1200 && $this->gpuPref == "amd"){
            $this->setGpu("AMD R9 Fury X", "600");
            $tempPrice += 600;
        }

        //Assigns Ram
        if($this->ramSize == "4"){
            $this->setRam("Kingston 4GB", 20);
        }
        else if($this->ramSize == "8"){
            $this->setRam("Kingston 8GB", 40);
        }
        else if($this->ramSize == "16"){
            $this->setRam("Kingston 16GB", 60);
        }
        else if($this->ramSize == "32"){
            $this->setRam("Kingston 32GB", 80);
        }

        //Assigns HDD size
        if($this->hddSize == "1"){
            $this->setHdd("1TB", 30);
            $tempPrice += 30;
        }
        else if($this->hddSize == "2"){
            $this->setHdd("2TB", 50);
            $tempPrice += 50;
        }
        else if($this->hddSize == "3"){
            $this->setHdd("3TB", 60);
            $tempPrice += 60;
        }
        else if($this->hddSize == "4"){
            $this->setHdd("4TB", 70);
            $tempPrice += 70;
        }

        //Assigns SSD size
        if($this->ssdSize == "0"){
            $this->setSsd("No SSD required", 0);
        }
        else if($this->ssdSize == "128"){
            $this->setSsd("128GB", 80);
            $tempPrice += 80;
        }
        else if($this->ssdSize == "256"){
            $this->setSsd("256GB", 100);
            $tempPrice += 80;
        }
        else if($this->ssdSize == "512"){
            $this->setSsd("128GB", 110);
            $tempPrice += 80;
        }
        
        if($tempPrice <= $price) {
            $msg = "&euro;" . $tempPrice;
        }
        else {
            $msg = "&euro;" . $tempPrice;
        }
        return $msg;
    }
}