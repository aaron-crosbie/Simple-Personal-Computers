<?php
namespace Itb;
class UserController
{
    private $app;

    public function __construct(WebApplication $app)
    {
        $this->app = $app;
    }

    // action for route:    /login
    public function loginAction()
    {
        // build args array
        // ------------
        $argsArray = [];
        // render (draw) template
        // ------------
        $templateName = 'login';
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    // action for route:    /logout
    public function logoutAction()
    {
        // logout any existing user
        $this->app['session']->remove('user');
        // redirect to home page
        return $this->app->redirect('/');
    }

    // action for POST route:    /processLogin
    public function processLoginAction()
    {
//        // retrieve 'name' from GET params in Request object
//        $request = $this->app['request_stack']->getCurrentRequest();
//        $username = $request->get('username');
//        $password = $request->get('password');
//        // authenticate!
//        if ('user' === $username && 'user' === $password) {
//            // store username in 'user' in 'session'
//            $this->app['session']->set('user', array('username' => $username) );
//            // success - redirect to the secure admin home page
//            return $this->app->redirect('/admin');
//        }
//        // login page with error message
//        // ------------
//        $templateName = 'login';
//        $argsArray = array(
//            'errorMessage' => 'bad username or password - please re-enter',
//        );
//        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);

        $dbm = new DbManager();
        $dbm->generateDatabase();


        // username and password sent from form
        $username = filter_input(INPUT_GET, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_GET, 'password', FILTER_SANITIZE_STRING);

        // To protect MySQL injection (more detail about MySQL injection)
        $username = stripslashes($username);
        $password = stripslashes($password);

        $username = mysqli_real_escape_string($dbm->con, $_POST['username']);
        $password = mysqli_real_escape_string($dbm->con, $_POST['password']);


        $sql = "SELECT * FROM user WHERE Username='$username' and Pass='$password'";
        $result = mysqli_query($dbm->con, $sql);


        // Mysql_num_row is counting table row
//    $count = mysqli_num_rows($result);

        // If result matched $username and $password, table row must be 1 row
        if ($result != null && $_SESSION['username'] = $username) {
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;
        }




           return "Welcome <strong>" . $_SESSION['username'] . "</strong>!";


    }
}