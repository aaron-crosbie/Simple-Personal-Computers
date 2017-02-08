<?php
/**
 * starting the session as soon as the page is turned on
 */
//session_start();
//session_set_cookie_params(3600,"/");

/**
 * getting the required pages once
 */
//require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '\..\RegisterController.php';

/**
 * using controllers
 */
use Itb\ModuleController;
use Itb\RegisterController;


/**
 * getting connection with the database
 */
define('DB_HOST', 'localhost');
define('DB_USER', 'joe');
define('DB_PASS', 'smith');
define('DB_NAME', 'itb');

/**
 * setting the title for the page
 */
$title = 'Cabal Online Fan Page';

/**
 * initialising the controllers
 */
$moduleController = new ModuleController();
$registerController = new RegisterController();

/**
 * getting action as a variable to see when its being used
 */
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

/**
 * switch for all the actions,
 * easier to handle than ifs and
 * less messy
 * this is initialized with actin variable to call the action
 */
switch ($action){

    /**
     * calling module controller to show home page
     * which is being called by showHome action
     */
    case 'showHome':
        $moduleController->showHome();
        break;

    /**
     * calling module controller to show register page
     * which is being called by showRegister action
     */
    case 'showRegister':
        $moduleController->showRegister();
        break;

    /**
     * calling module controller to show shop page
     * which is being called by showShop action
     */
    case 'showShop':
        $moduleController->showShop();
        break;

    /**
     * calling module controller to show gallery page
     * which is being called by showGallery action
     */
    case 'showGallery':
        $moduleController->showGallery();
        break;

    /**
     * calling module controller to show class page
     * which is being called by showClass action
     */
    case 'showClass':
        $moduleController->showClass();
        break;

    /**
     * calling module controller to show contact page
     * which is being called by showContact action
     */
    case 'showContact':
        $moduleController->showContact();
        break;

    /**
     * calling register controller to check if the username is correct
     * which is being called by processLoginAction action
     */
    case 'usernameCheck':
        $registerController->processLoginAction();
        break;

    /**
     * calling module controller to show site map
     * which is being called by showSiteMap action
     */
    case 'showSiteMap':
        $moduleController->showSiteMap();
        break;

    /**
     * calling module controller for adding a new product to the cart
     * which is being called by addToCart action
     */
    case 'addToCart':
        $moduleController->addToCart();
        break;

    /**
     * calling module controller to show the shopping cart for the user
     * which is being called by showShoppingCart action
     */
    case 'showShoppingCart':
        $moduleController->showShoppingCart();
        break;

    /**
     * calling register controller to show add the user to the database
     * which is being called by addUser action
     */
    case 'addUser':
        $registerController->addUser();
        break;

    /**
     * calling module controller to remove the added object
     * from the database structure, the action is
     * being called by removeFromCart action
     */
    case 'removeFromCart':
        $moduleController->removeFromCart();
        break;

    /**
     * calling module controller to add a new product to
     * the database structure, the action is
     * being called by addNewProduct action
     */
    case 'addNewProduct':
        $moduleController->addNewProduct();
        break;

    /**
     * if no function is found for
     * the default will show up and show index page
     * to the user
     */
    default:
        $moduleController->showIndex();
}


?>