<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BlogPost;
use DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use AppBundle\Entity\Motherboard;
use AppBundle\Entity\Cpu;
use AppBundle\Entity\Gpu;
use AppBundle\Entity\Hdd;
use AppBundle\Entity\Ram;
use AppBundle\Entity\Ssd;
use AppBundle\Entity\Psu;

class DbManager extends Controller
{
    public $hostname;
    public $user;
    public $pass;
    public $db;
    public $con;

    function __construct(){
        $this->hostname = "localhost";
        $this->user = "root";
        $this->pass = "";//May not need this if password is not set up for localhost
        $this->db = "testidk";//Change to what ever your test db's name is :)
        $this->con = mysqli_connect($this->hostname, $this->user, $this->pass, $this->db);
    }

    function addUser($username, $fname, $mobile, $email, $dob, $addL1, $addL2, $addL3, $pass){
        $sql = "INSERT INTO users (username, firstname, tel, email, dob, address1, address2, address3, pass) VALUES ('$username','$fname','$mobile','$email','$dob','$addL1','$addL2','$addL3','$pass')";
        mysqli_query($this->con, $sql);
    }

    //Getters and Setters for the Users DB

    function setFirstName($fname, $email){
        $sql = "UPDATE users SET firstname= $fname WHERE email = $email";
        mysqli_query($this->con, $sql);
    }

    function setUsername($username, $email){
        $sql = "UPDATE users SET username= $username WHERE email = $email";
        mysqli_query($this->con, $sql);
    }

    function setPassword($password, $email){
        $sql = "UPDATE users SET pass = $password WHERE  email = $email";
        mysqli_query($this->con, $sql);
    }

    function getUsername($email){
        $sql = "SELECT username FROM users WHERE email = $email";
        $username = mysqli_query($this->con, $sql);
        return $username;
    }

    function getFirstName($email){
        $sql = "SELECT firstname FROM users WHERE email = $email";
        $fname= mysqli_query($this->con, $sql);
        return $fname;
    }

    //End of Getters and Setters for Users DB

    //Functions to add components to database
    /**
     * @param $name
     * @param $manufacturer
     * @param $pcie
     * @param $pci
     * @param $format
     * @param $price
     */
    function addMotherboard($name, $manufacturer, $pcie, $pci, $format, $price){
        $sql = "INSERT INTO motherboards (itemName, manufacturer, pcie, pci, format, price) VALUES ('$name','$manufacturer','$pcie','$pci','$format','$price')";
        mysqli_query($this->con, $sql);
    }

    /**
     * @param $name
     * @param $manufacturer
     * @param $cores
     * @param $frequency
     * @param $watts
     * @param $price
     */
    function addCpu($name, $manufacturer, $cores, $frequency, $watts, $price){
        $sql = "INSERT INTO cpus (itemName, manufacturer, cores, frequency, watts, price) VALUES ('$name','$manufacturer','$cores','$frequency','$watts','$price')";
        mysqli_query($this->con, $sql);
    }

    /**
     * @param $name
     * @param $manufacturer
     * @param $memory
     * @param $processorClock
     * @param $cardBus
     * @param $formFactor
     * @param $watts
     * @param $price
     */
    function addGpu($name, $manufacturer, $memory, $processorClock, $cardBus, $formFactor, $watts, $price){
        $sql = "INSERT INTO gpus (itemName, manufacturer, memoryCap, processorClock, cardBus, formFactor, watts, price) VALUES ('$name','$manufacturer','$memory','$processorClock','$cardBus','$formFactor','$watts','$price')";
        mysqli_query($this->con, $sql);
    }

    /**
     * @param $name
     * @param $manufacturer
     * @param $memory
     * @param $type
     * @param $price
     */
    function addRam($name, $manufacturer, $memory, $type, $price){
        $sql = "INSERT INTO ram (itemName, manufacturer, memoryCap, itemType, price) VALUES ('$name','$manufacturer','$memory','$type','$price')";
        mysqli_query($this->con, $sql);
    }

    /**
     * @param $name
     * @param $manufacturer
     * @param $formFactor
     * @param $watts
     * @param $price
     */
    function addPsu($name, $manufacturer, $formFactor, $watts, $price){
        $sql = "INSERT INTO psus (itemName, manufacturer, formFactor, watts, price) VALUES ($name, $manufacturer, $formFactor, $watts, $price)";
        mysqli_query($this->con, $sql);
    }

    /**
     * @param $name
     * @param $storage
     * @param $watts
     * @param $price
     */
    function addHdd($name, $storage, $watts, $price){
        $sql = "INSERT INTO hdds (itemName, storageCap, watts, price) VALUES ($name, $storage, $watts, $price)";
        mysqli_query($this->con, $sql);
    }

    /**
     * @param $name
     * @param $storage
     * @param $watts
     * @param $price
     */
    function addSsd($name, $storage, $watts, $price){
        $sql = "INSERT INTO ssds (itemName, storageCap, watts, price) VALUES ($name, $storage, $watts, $price)";
        mysqli_query($this->con, $sql);
    }

    function chooseMotherboard($manufacturer, $price){
        $motherboard = new Motherboard();
        $spendable = $price/5;
        $sql = "SELECT name, manufacturer, pcie, pci, ramType, format, price FROM motherboard WHERE price <= '$spendable' && manufacturer = '$manufacturer'";
        $result = mysqli_query($this->con, $sql);
        $row = $result->fetch_array(MYSQLI_BOTH);
        $motherboard->setAllSurveyVariables($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
        return $motherboard;
    }

    function chooseCpu($manufacturer, $price){
        $cpu = new Cpu();
        $spendable = $price/5;
        $sql = "SELECT name, manufacturer, cores, frequency, watts, price FROM cpu WHERE price <= '$spendable' && manufacturer = '$manufacturer'";
        $result = mysqli_query($this->con, $sql);
        $row = $result->fetch_array(MYSQLI_BOTH);
        $cpu->setAllSurveyVariables($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
        return $cpu;
    }

    function chooseGpu($manufacturer, $price){
        $gpu = new Gpu();
        if($price < 1200) {
            $spendable = $price / 4;
        }
        else{
            $spendable = $price / 2;
        }
        $sql = "SELECT name, manufacturer, memoryCap, processor, cardBus, formFactor, watts, price FROM gpu WHERE price <= '$spendable' && manufacturer = '$manufacturer'";
        $result = mysqli_query($this->con, $sql);
        $row = $result->fetch_array(MYSQLI_BOTH);
        $gpu->setAllSurveyVariables($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]);
        return $gpu;
    }

    function chooseRam($type, $size){
        $ram = new Ram();
        $ramSize = $size . "GB";
        $sql = "SELECT name, manufacturer, memory, type, watts, price FROM ram WHERE type = '$type' && memory = '$ramSize'";
        $result = mysqli_query($this->con, $sql);
        $row = $result->fetch_array(MYSQLI_BOTH);
        $ram->setAllSurveyVariables($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
        return $ram;
    }

    function chooseHdd($size){
        $hdd = new Hdd();
        $hddSize = $size . "TB";
        $sql = "SELECT name, storageCap, watts, price FROM hdd WHERE storageCap = '$hddSize'";
        $result = mysqli_query($this->con, $sql);
        $row = $result->fetch_array(MYSQLI_BOTH);
        $hdd->setAllSurveyVariables($row[0], $row[1], $row[2], $row[3]);
        return $hdd;
    }

    function chooseSsd($size){
        $ssd = new Ssd();
        $ssdSize = $size . "GB";
        $sql = "SELECT name, storageCap, watts, price FROM ssd WHERE storageCap = '$ssdSize'";
        $result = mysqli_query($this->con, $sql);
        $row = $result->fetch_array(MYSQLI_BOTH);
        $ssd->setAllSurveyVariables($row[0], $row[1], $row[2], $row[3]);
        return $ssd;
    }

    function choosePsu($watts, $motherboardPrice){
        $psu = new Psu();
        define("REGULAR_MOTHERBOARD", 40);
        define("HIGH_END_MOTHERBOARD", 80);

        if($motherboardPrice <= 150){
            $watts += constant("REGULAR_MOTHERBOARD");
        }
        else if($motherboardPrice >= 151){
            $watts += constant("HIGH_END_MOTHERBOARD");
        }
        $overhead = round($watts*1.5);

        $sql = "SELECT name, manufacturer, formFactor, watts, price FROM psu WHERE watts >= '$overhead'";
        $result = mysqli_query($this->con, $sql);
        $row = $result->fetch_array(MYSQLI_BOTH);
        $psu->setAllSurveyVariables($row[0], $row[1], $row[2], $row[3], $row[4]);

        return $psu;
    }

    function getComponentNames($component){
        $sql = "SELECT name FROM $component";
        $result = mysqli_query($this->con, $sql);
        $columns = array();
        while($rows = mysqli_fetch_assoc($result)){
            array_push($columns, $rows['itemName']);
        }

        return $columns;
    }

    function getSsdSizes(){
        $sql = "SELECT storageCap FROM ssd ORDER BY storageCap DESC";
        $result = mysqli_query($this->con, $sql);
        $columns = array();
        while($rows = mysqli_fetch_assoc($result)){
            array_push($columns, $rows['storageCap']);
        }
        return $columns;
    }

}