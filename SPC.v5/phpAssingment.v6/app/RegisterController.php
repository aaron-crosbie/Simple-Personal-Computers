<?php

namespace Itb;

use Mattsmithdev\PdoCrud\DatabaseManager;
use Mattsmithdev\PdoCrud\DatabaseTable;
use Itb\User;

class RegisterController
{

    /**
     * adding the user to the database table 'user'
     * getting all the variables
     * the setting them as new user
     * finally inserting the values into the database
     * and calling registered page, to notify the user that
     * it was registered on the system
     */
    public function addUser()
    {
        $name = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_GET, 'username', FILTER_SANITIZE_STRING);
        $address = filter_input(INPUT_GET, 'address', FILTER_SANITIZE_STRING);
        $tel = filter_input(INPUT_GET, 'tel', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_STRING);
        $date = filter_input(INPUT_GET, 'date', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_GET, 'password', FILTER_SANITIZE_STRING);
        $secondPassword = filter_input(INPUT_GET, 'secondPassword', FILTER_SANITIZE_STRING);

        $r = new User();
        $r->setName($name);
        $r->setUsername($username);
        $r->setAddress($address);
        $r->setTel($tel);
        $r->setEmail($email);
        $r->setDate($date);
        $r->setPassword($password);
        $r->setSecondPassword($secondPassword);


        User::insert($r);
       // $r->setRole(User::ROLE_USER);
        require_once __DIR__ . '/../templates/Registered.php';

        $r->getName();
        $r->getUsername();

    }


    /**
     * processing login to see if the
     * password and usernames match in the database
     * that means getting the username and hashed password and setting
     * calling the database to compare it
     *
     * getting the variables
     * toggle the bool value to a method that is placed in user
     * initialising the module controller
     *
     * then giving the admin logon
     * and setting the value to true to say the admin has logged in
     *
     * then seeing if its not the admin who is logging on
     * getting the username tht was used in the session
     * and calling show index to otifythe user
     * that it has been loged in
     * otherwise, calling logon error page
     * to let the user repeat the process
     */
    public function processLoginAction()
    {
        // default is bad login
        $isLoggedIn = false;

        $username = filter_input(INPUT_GET, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_GET, 'password', FILTER_SANITIZE_STRING);

        // search for user with username in repository
        $isLoggedIn = User::canFindMatchingUsernameAndPassword($username, $password);

        $moduleController = new ModuleController();

        //for admin login
        if(('admin' == $username) & ('admin' == $password)){
            $isLoggedIn = true;
        }// action depending on login success

        if ($isLoggedIn) {
            $_SESSION['user'] = $username;
            $moduleController->showHome();
        }
        else {
            $moduleController->showLogin();
        }
    }
}

