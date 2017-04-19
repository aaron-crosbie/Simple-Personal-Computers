<?php
/**
 * Created by IntelliJ IDEA.
 * User: Sir Crobie
 * Date: 16/02/2017
 * Time: 15:27
 */

namespace AppBundle\Controller;


use Symfony\Component\HttpFoundation\Session\Session;

class DbManager {
    public $hostname;
    public $user;
    public $pass;
    public $db;
    public $con;

    function __construct(){
        $this->hostname = "localhost";
        $this->user = "root";
        $this->pass = "";//May not need this if password is not set up for localhost
        $this->db = "test";//Change to what ever your test db's name is :)
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

    function getUser($username, $pass){
        $sql = "SELECT FROM users (username, pass) VALUES ('$username','$pass')";
        echo "$sql";
        mysqli_query($this->con, $sql);
    }
/*
    /**
     * @param $username
     * @param $password
     * @return string|Session
     */

    function authenticateUser($username, $password){

        // username and password sent from form
        $session = new Session();

        $username = filter_input(INPUT_GET, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_GET, 'password', FILTER_SANITIZE_STRING);

        // To protect MySQL injection (more detail about MySQL injection)
        $username = stripslashes($username);
        $password = stripslashes($password);


        $username = mysqli_real_escape_string( $this->con, $_POST['username']);
        $password = mysqli_real_escape_string( $this->con, $_POST['password']);

        $sql = "SELECT * FROM user WHERE username='$username' and password='$password'";
        $result = mysqli_query($this->con, $sql);

        echo $result;
        // Mysql_num_row is counting table row
        $count = mysqli_num_rows($result);

        // If result matched $username and $password, table row must be 1 row
        if ($count == 1) {
           $session -> set('username', $username);
            return $session;
        }

        else{
            return 'Session login was NOT successful!' ;
        }
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

    function generateComponents(){
        $sql = "INSERT INTO components (motherboard,cpu,gpu,hdd,ssd) VALUE ('ASUS Z170 Pro','Intel Core i3-6100','Gigabyte GeForce GTX 1060 G1','1TB Samsung','256GB Evo Samsung')";
        mysqli_query($this->con, $sql);
    }

    /**
     * Checks type of component then adds item name and price to table associated with components of the same type
     * @param $name
     * @param $price
     * @param $type
     */
    function addComponent($name, $price, $type){
        if($type == "motherboard"){
            $sql = "INSERT INTO motherboards (item,price) VALUES ('$name', '$price')";
        }
        else if($type == "cpu"){
            $sql = "INSERT INTO cpu (item,price) VALUES ('$name', '$price')";
        }
        else if($type == "gpu"){
            $sql = "INSERT INTO gpu (item,price) VALUES ('$name', '$price')";
        }
        else if($type == "hdd"){
            $sql = "INSERT INTO hdd (item,price) VALUES ('$name', '$price')";
        }
        else if($type == "ssd"){
            $sql = "INSERT INTO ssd (item,price) VALUES ('$name', '$price')";
        }
        else{
            $sql = "INSERT INTO ram (item,price) VALUES ('$name', '$price')";
        }

        mysqli_query($this->con, $sql);
    }

    /**
     * Function to return desired component from database
     * @param $name
     * @param $type
     * @return bool|\mysqli_result
     */
    function getComponent($name, $type){
        if($type == "motherboard"){
            $sql = "SELECT itemName FROM motherboards WHERE itemName = $name";
        }
        else if($type == "cpu"){
            $sql = "SELECT itemName FROM cpus WHERE itemName = $name";
        }
        else if($type == "gpu"){
            $sql = "SELECT itemName FROM gpus WHERE itemName = $name";
        }
        else if($type == "hdd"){
            $sql = "SELECT itemName FROM hdd WHERE itemName = $name";
        }
        else if($type == "ssd"){
            $sql = "SELECT itemName FROM ssd WHERE itemName = $name";
        }
        else{
            $sql = "SELECT itemName FROM ram WHERE itemName = $name";
        }

        $comp = mysqli_query($this->con, $sql);
        return $comp;
    }

    function generateDatabase(){
        $sql = "CREATE TABLE components(motherboard varchar(45), cpu varchar(45), gpu varchar(45), hdd varchar(45), ssd varchar(45));";
        mysqli_query($this->con, $sql);
//        $sql = "CREATE TABLE motherboards(itemName varchar(45), price varchar(45), manufacturer varchar(45));";
//        mysqli_query($this->con, $sql);
        $sql = "CREATE TABLE cpus(itemName varchar(45), price varchar(45), manufacturer varchar(45));";
        mysqli_query($this->con, $sql);
//        $sql = "CREATE TABLE gpus(itemName varchar(45), price varchar(45), manufacturer varchar(45));";
//        mysqli_query($this->con, $sql);
//        $sql = "CREATE TABLE hdd(itemName varchar(45), price varchar(45), storage varchar(45), manufacturer varchar(45));";
//        mysqli_query($this->con, $sql);
//        $sql = "CREATE TABLE ssd(itemName varchar(45), price varchar(45), storage varchar(45), manufacturer varchar(45));";
//        mysqli_query($this->con, $sql);
//        $sql = "CREATE TABLE ram(itemName varchar(45), price varchar(45), size varchar(45) manufacturer varchar(45));";
//        mysqli_query($this->con, $sql);
//        $sql = "CREATE TABLE users(username varchar(45), firstname varchar(45), tel varchar(45), email varchar(45), dob varchar(45), address1 varchar(45),address2 varchar(45), address3 varchar(45), pass varchar(45));";
//        mysqli_query($this->con, $sql);
    }

}

//Code to put unto registering.php which will register a user with the DB
//  $dbm = new \itb\DbManager();
//  $dbm->addUs6er($_POST['username'],$_POST['name1'],$_POST['tel'],$_POST['email'],$_POST['date'],$_POST['addresslineone'],$_POST['addresslinetwo'],$_POST['addresslinethree'],$_POST['password']);