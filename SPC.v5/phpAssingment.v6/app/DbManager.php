<?php
/**
 * Created by IntelliJ IDEA.
 * User: Sir Crobie
 * Date: 16/02/2017
 * Time: 15:27
 */

namespace itb;


class DbManager {
    private $hostname;
    private $user;
    private $pass;
    private $db;
    private $con;

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
        $sql = "INSERT INTO user (username, firstname, tel, email, dob, address1, address2, address3, pass)
        VALUES ('$_POST[username]','$_POST[name1]','$_POST[tel]','$_POST[email]','$_POST[date]','$_POST[addresslineone]','$_POST[addresslinetwo]','$_POST[addresslinethree]','$_POST[password]')";
        mysqli_query($this->con, $sql);
    }

}