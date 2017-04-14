<?php
/**
 * Created by IntelliJ IDEA.
 * User: Sir Crobie
 * Date: 16/02/2017
 * Time: 15:27
 */

namespace itb;
require_once('Motherboard.php');
require_once('Cpu.php');
require_once('Gpu.php');
require_once('Ram.php');
require_once('Hdd.php');
require_once('Ssd.php');
require_once('Psu.php');


class DbManager {
    public $hostname;
    public $user;
    public $pass;
    public $db;
    public $con;

    function __construct(){
        $this->hostname = "localhost";
        $this->user = "root";
        $this->pass = "root";//May not need this if password is not set up for localhost
        $this->db = "spcdb";//Change to what ever your test db's name is :)
        $this->con = mysqli_connect($this->hostname, $this->user, $this->pass, $this->db);

        if(mysqli_connect_errno()){
            echo "Failed to connect to database";
        }
        else{
            echo "Connection Successful!";
        }
    }

    function addUser($username, $fname, $mobile, $email, $dob, $addL1, $addL2, $addL3, $pass){
        $sql = "INSERT INTO users (username, firstname, tel, email, dob, address1, address2, address3, pass) VALUES ('$username','$fname','$mobile','$email','$dob','$addL1','$addL2','$addL3','$pass')";
        echo "$sql";
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
        $motherboard = new \Motherboard();
        $spendable = $price/5;
        echo "<br><b>" . $spendable . "</b><br>";
        $sql = "SELECT itemName, manufacturer, pcie, pci, ramType, formFactor, price FROM motherboards WHERE price <= '$spendable' && manufacturer = '$manufacturer'";
        $result = mysqli_query($this->con, $sql);
        $row = $result->fetch_array(MYSQLI_BOTH);
        //echo "Name: " . $row[0] . "<br>Manufacturer: " . $row[1] . "<br>Price: " . $spendable;
        $motherboard->setAllVariables($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
        return $motherboard;
    }

    function chooseCpu($manufacturer, $price){
        $cpu = new \Cpu();
        $spendable = $price/5;
        echo "<br><b>" . $spendable . "</b><br>";
        $sql = "SELECT itemName, manufacturer, cores, frequency, watts, price FROM cpus WHERE price <= '$spendable' && manufacturer = '$manufacturer'";
        $result = mysqli_query($this->con, $sql);
        $row = $result->fetch_array(MYSQLI_BOTH);
        $cpu->setAllVariables($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
        //echo $row[0] . $row[1] . $row[2] . $row[3] . $row[4] . $row[5] . "<br>Hallo<br>" . $spendable;
        return $cpu;
    }

    function chooseGpu($manufacturer, $price){
        $gpu = new \Gpu();
        $spendable = $price/4;
        echo "<br><b>" . $spendable . "</b><br>";
        $sql = "SELECT itemName, manufacturer, memoryCap, processorClock, cardBus, formFactor, watts, price FROM gpus WHERE price <='$spendable' && manufacturer = '$manufacturer'";
        $result = mysqli_query($this->con, $sql);
        $row = $result->fetch_array(MYSQLI_BOTH);
        $gpu->setAllVariables($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]);
        return $gpu;
    }

    function chooseRam($type, $size){
        $ram = new \Ram();
        $ramSize = $size . "GB";
        $sql = "SELECT itemName, manufacturer, memoryCap, itemType, watts, price FROM ram WHERE itemType = '$type' && memoryCap = '$ramSize'";
        $result = mysqli_query($this->con, $sql);
        $row = $result->fetch_array(MYSQLI_BOTH);
        $ram->setAllVariables($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
        return $ram;
    }

    function chooseHdd($size){
        $hdd = new \Hdd();
        $hddSize = $size . "TB";
        echo "<b><br>" . $hddSize . "</b>";
        $sql = "SELECT itemName, storageCap, watts, price FROM hdds WHERE storageCap = '$hddSize'";
        $result = mysqli_query($this->con, $sql);
        $row = $result->fetch_array(MYSQLI_BOTH);
        $hdd->setAllVariables($row[0], $row[1], $row[2], $row[3]);
        return $hdd;
    }

    function chooseSsd($size){
        $ssd = new \Ssd();
        $ssdSize = $size . "GB";
        echo "<b><br>" . $ssdSize . "</b>";
        $sql = "SELECT itemName, storageCap, watts, price FROM ssds WHERE storageCap = '$ssdSize'";
        $result = mysqli_query($this->con, $sql);
        $row = $result->fetch_array(MYSQLI_BOTH);
        $ssd->setAllVariables($row[0], $row[1], $row[2], $row[3]);
        return $ssd;
    }

    function choosePsu($watts, $price){
        $psu = new \Psu();
        $overhead = round($watts*1.5);
        echo "<hr>WATTAGE: " . $watts . "<br>OVERHEAD: " . $overhead;

        return $psu;
    }

    function getComponentNames($component){
        $sql = "SELECT itemName FROM $component";
        $result = mysqli_query($this->con, $sql);
        $columns = array();
        while($rows = mysqli_fetch_assoc($result)){
           array_push($columns, $rows['itemName']);
        }
//        foreach($columns as $val){
//            echo $val . "<hr>";
//        }
        //for each statement which prints off all results

        return $columns;
    }

}