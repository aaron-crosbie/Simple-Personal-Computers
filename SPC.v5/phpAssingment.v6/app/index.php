<?php
session_start();

$filename ='index';

$title = 'Home';

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

require_once __DIR__ . '/head.php';
require_once __DIR__ . '/nav.php';

switch ($action){
    case 'showHome':
        showHome();
        break;
    case 'login':
        login();
        break;
}
function showHome() {
$_SESSION['loggedin'] = false;

session_unset();
session_destroy();
}

$hostname = "localhost";
$user = "root";
$pass = "";
$db = "test";


$connection = mysqli_connect($hostname, $user, $pass, $db);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

?>

<div id="top">

    <h1>SPC - Simple Personal Computers</h1>

    <p style="text-align: right"><button id="myBtn">Login</button></p>
</div>

<div style="text-align: right">

<?php
function login()
{
    $hostname = "localhost";
    $user = "root";
    $pass = "";
    $db = "test";

    $connection = mysqli_connect($hostname, $user, $pass, $db);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }



    // username and password sent from form
    $username = filter_input(INPUT_GET, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_GET, 'password', FILTER_SANITIZE_STRING);

    // To protect MySQL injection (more detail about MySQL injection)
    $username = stripslashes($username);
    $password = stripslashes($password);

    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);


    $sql = "SELECT * FROM user WHERE Username='$username' and Pass='$password'";
    $result = mysqli_query($connection, $sql);


    // Mysql_num_row is counting table row
    $count = mysqli_num_rows($result);


    // If result matched $username and $password, table row must be 1 row
    if ($count == 1) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
    }

}
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    echo "Welcome <strong>" . $_SESSION['username'] . "</strong>!";

        ?>

        <script>
            $("#myBtn").hide();
            $("#heading").hide();
        </script>

        <form
                id="form3"
                method="POST"
                action="index.php?action=showHome">
            <button type="submit" id="loginBtn">Logout</button>
        </form>
        </div>
        <?php
    }



    ?>



<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">×</span>
            <h2>Please login</h2>
        </div>
        <div class="modal-body"  style="text-align: justify">
            <form
                    id="form1"
                    method="POST"
                    action="index.php?action=login"
            >

                <p >Username:</p>
                <input type="text" name="username" value="" id="username">

                <p >Password:</p>
                <input type="password" name="password" value="" id="password">

                <br>

                <a style="color: #787878; font-size: 12px; text-decoration: underline;">Forgot password</a>

                <br>
                <br>

                <button type="submit" style="margin-left: auto; margin-right: auto;" name="submit" value="submit" >Login</button>
                <!--<button type="button" style="margin-left: auto; margin-right: auto;">Register</button>-->

                <br>
                <br>


            </form>

            <form
                    id="form2"
                    method="GET"
                    action="registering.php"
            >
                <h4>Don't have an account yet?</h4>
                <input type="submit" name="register" value="Register" >

                <br>
                <br>
            </form>
        </div>
        <div class="modal-footer">
            <h3>SPC</h3>

        </div>
    </div>

</div>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>


<div id="mainContent">

        <section>

            <h3>Check out new PC designs</h3>

            <iframe width="725" height="415"
                    src="https://www.youtube.com/embed/35FLXniqeFQ?autoplay=0">
            </iframe>

        </section>


        <h1 style="text-align: center">New builds</h1>

        <p style="text-align: center">Created by users</p>

        <section id="four">

            <section>

                <img src="images/cooler.jpg">

                <p>
                    <i>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit
                    </i>
                </p>

            </section>

            <section>

                <img src="images/cool.jpg">

                <p>
                    <i>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit
                    </i>
                </p>

            </section>

        </section>

        <hr>

        <section id="four">

            <section>

                <img src="images/coolest.jpg">

                <p>
                    <i>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit
                    </i>
                </p>

            </section>

            <section>

                <img src="images/cool.jpg">

                <p>
                    <i>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit
                    </i>
                </p>

            </section>

        </section>


    <section id="news">

        <section>

            <h2>Recent Events</h2>

            <section>

                <h3>News 1</h3>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque ducimus.</p>

            </section>

            <hr>

            <section>

                <h3>News 1</h3>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque ducimus.</p>

            </section>

            <hr>

            <section>

                <h3>News 1</h3>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque ducimus.</p>

            </section>

        </section>

        <section>

            <h2> Recent User Posts</h2>
            <?php

            $sql="SELECT * FROM blog ORDER BY ID DESC";

            $retval = mysqli_query($connection, $sql);

            if(!$retval){
                die("Could not get data");
            }

            $counter = 0;

            while($row = mysqli_fetch_array($retval, 1))
            {
                $counter++;
                if($counter >= 4){ break;}
            ?>

            <h4><?php echo "{$row['Topic']}"?></h4>
            <h5><?php echo "@{$row['Username']}" ?></h5>
            <p><?php echo "@{$row['Content']}" ?></p>

                <hr>

            <?php
            }
            ?>
        </section>


    </section>


</div>



<?php require_once __DIR__ . '/footer.php'; ?>
