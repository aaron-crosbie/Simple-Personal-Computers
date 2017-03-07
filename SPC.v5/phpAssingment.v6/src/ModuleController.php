<?php
namespace Itb;

class ModuleController
{

    /**
     * showing home page with
     * user details using loggedIn and username
     * and asking for index page to be called
     */
    public function showHome(){
//        $_SESSION['loggedin'] = false;
//        session_unset();
//        session_destroy();
        require_once __DIR__ . 'blog.html.twig';
    }

    /**
     * showing registering page with
     * user details using loggedIn and username
     * and asking for registering page to be called
     */
    public function showRegister(){
        $isLoggedIn = $this->isLoggedInFromSession();
        $username = $this->usernameFromSession();
        require_once __DIR__ . 'registering.php';
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
//        $products = Product::getAll();
//
//        require_once __DIR__ . 'app/shop.php';
//    }

    /**
     * showing classes page with
     * user details using loggedIn and username
     * and asking for classes page to be called
     */
//    public function showClass(){
//        $isLoggedIn = $this->isLoggedInFromSession();
//        $username = $this->usernameFromSession();
//        require_once __DIR__ . '/../templates/classes.php';
//    }
//
//    /**
//     * showing gallery page with
//     * user details using loggedIn and username
//     * and asking for gallery page to be called
//     */
//    public function showGallery(){
//        $isLoggedIn = $this->isLoggedInFromSession();
//        $username = $this->usernameFromSession();
//        require_once __DIR__ . '/../templates/gallery.php';
//    }
//
//    /**
//     * showing contact page with
//     * user details using loggedIn and username
//     * and asking for contact page to be called
//     */
//    public function showContact(){
//        $isLoggedIn = $this->isLoggedInFromSession();
//        $username = $this->usernameFromSession();
//        require_once __DIR__ . '/../templates/contact.php';
//    }

    /**
     * showing Login page with
     * user details using loggedIn and username
     * and asking for Login page to be called
     */
    public function showLogin(){
        $isLoggedIn = $this->isLoggedInFromSession();
        $username = $this->usernameFromSession();

        require_once __DIR__ . '/../templates/Login.php';
    }


    /**
     * showing sitemap
     * and asking for sitemap
     */
    public function showSiteMap(){
        $isLoggedIn = $this->isLoggedInFromSession();
        $username = $this->usernameFromSession();

        require_once __DIR__ . '/../templates/sitemap.php';
    }

    /**
     * showing shopping cart page with
     * user details using loggedIn and username
     * and all the cart details
     * and asking for cart page to be called
     */
    public function showShoppingCart(){
        $isLoggedIn = $this->isLoggedInFromSession();
        $username = $this->usernameFromSession();

        $shoppingCart = $this->getShoppingCart();

        require_once __DIR__ . '/../templates/shoppingCart.php';
    }

    /**
     * showing character page with
     * user details using loggedIn and username
     * and asking for  user character page to be called
     */
    public function showUserChar(){
        $isLoggedIn = $this->isLoggedInFromSession();
        $username = $this->usernameFromSession();

        require_once __DIR__ . '/../templates/UserChar.php';
    }

    /**
     * showing home  page with
     * user details using loggedIn and username
     * and asking for home  page to be called
     */
    public function showIndex(){

        $isLoggedIn = $this->isLoggedInFromSession();
        $username = $this->usernameFromSession();
        // get some data
        //$modules = Module::getAll();

        // get the appropriate template to OUTPUT the data (in a nice way)
        require_once __DIR__ . '/../templates/index.html.twig';
    }

    /**
     *  user is logged in if there is a
     * 'user' entry in the SESSION super global
     */
    public function isLoggedInFromSession() {
        $isLoggedIn = false;
        if(isset($_SESSION['user'])){
            $isLoggedIn = true;
        }
        return $isLoggedIn;
    }

    /**
     * @return string
     * extract username from SESSION superglobal
     */
    public function usernameFromSession() {
        $username = '';

	if (isset($_SESSION['user'])) {
		$username = $_SESSION['user'];
	}
	return $username;
    }


    /**
     * @return array
     */
    public function getShoppingCart()
    {
        if (isset($_SESSION['shoppingCart'])){
            return $_SESSION['shoppingCart'];
        } else {
            return [];
        }
    }

    /**
     * get the ID of product to add to cart
     * get the cart array
     * if quantity found in cart array, then use it as oldTotal
     */
    public function addToCart()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $shoppingCart = $this->getShoppingCart();

        $oldTotal = 0;// default is old total is zero

        if(isset($shoppingCart[$id])){
            $oldTotal = $shoppingCart[$id];
        }

        $shoppingCart[$id] = $oldTotal + 1;// store (old total + 1)
        $_SESSION['shoppingCart'] = $shoppingCart;// store new  array into SESSION

        $this->showShoppingCart();// redirect display page
    }


    /**
     * Removing an item from the cart
     */
    public function removeFromCart() {
        // get the ID of product to add to cart
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        // get the cart array
        $shoppingCart = $this->getShoppingCart();

        // remove entry for this ID
        unset($shoppingCart[$id]);

        // store new  array into SESSION
        $_SESSION['shoppingCart'] = $shoppingCart;

        // redirect display page
        $this->showShoppingCart();
    }


    /**
     * adding a particular product
     * with name
     * price
     * and image thats icluded
     */
    public function addNewProduct()
    {
        $name = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_GET, 'price', FILTER_SANITIZE_NUMBER_INT);
        $image = filter_input(INPUT_GET, 'image', FILTER_SANITIZE_STRING);

        $p = new Product();
        $p->setName($name);
        $p->setPrice($price);
        $p->setImage($image);

        Product::insert($p);

        require_once __DIR__ . '/../templates/UserChar.php';
    }

}