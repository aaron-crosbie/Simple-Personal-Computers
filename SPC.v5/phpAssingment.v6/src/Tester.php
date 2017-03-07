<?php
namespace Itb;

class Tester
{

    /**
     * showing home page with
     * user details using loggedIn and username
     * and asking for index page to be called
     */
    public function showHome(){
        $isLoggedIn = $this->isLoggedInFromSession();
        $username = $this->usernameFromSession();

        require_once __DIR__ . '../app/index.html.twig';
    }

    /**
     * showing registering page with
     * user details using loggedIn and username
     * and asking for registering page to be called
     */
    public function showRegister(){
        $isLoggedIn = $this->isLoggedInFromSession();
        $username = $this->usernameFromSession();
        require_once __DIR__ . '../app/registering.php';
    }

    /**
     * showing shopping page with
     * user details using loggedIn and username
     * addaed shopping cart details
     * and asking for shopping page to be called
     */
//    public function showShop(){
//        $isLoggedIn = $this->isLoggedInFromSession();
//        $username = $this->usernameFromSession();
//
//        $shoppingCart = $this->getShoppingCart();
//