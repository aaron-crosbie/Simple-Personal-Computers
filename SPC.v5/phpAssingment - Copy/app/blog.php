<?php
$filename ='blog';

$title = 'Blog';
$isLoggedIn = false;

require_once __DIR__ . '/head.php';
require_once __DIR__ . '/nav.php';


$clicked = filter_input(INPUT_GET, 'clickedForView');

//Database connection information
$hostname = "localhost";
$user = "root";
$pass = "";
$db = "test";

$connection = mysqli_connect($hostname, $user, $pass, $db);
//Check connection
if(mysqli_connect_errno()){
    echo "Failed to connect to database";
}




//Executes code when register button is selected
// This is to add user's posts

if(isset($_POST['commentData'])) {
    echo "hello";
    $newTime = date("Y/m/d");
    $sql="INSERT INTO blog (Username,Email,Topic,Content,TimeSubmited) VALUES ('$_POST[username]','$_POST[email]','$_POST[topic]','$_POST[content]','$newTime')";//SQL statement to insert data in user database

    mysqli_query($connection, $sql);
}

//SELECT NOW() AS CurrentDateTime
// This is to retrive given information


$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

switch ($action){
    case 'showH':
        showH();
        break;
    case 'login':
        login();
        break;
}



function showH()
{

    $sql="SELECT ID FROM blog ORDER BY ID DESC ;";


    mysqli_query($connection, $sql);
    echo $_POST['ID'];

}



?>


<body>

<div class="container">


    <div class="jumbotron">
        <header>
            <h1>Welcome to SPC Blog </h1>

            <div>
                <p>Advise | Help | Solve </p>
            </div>
            <div id="login">
                <a >Create Post</a>
            </div>
        </header>
    </div>


    <div id="post" hidden>

        <form
                id="form1"
                method="POST"
                action="">
            <h3>InsertUsernameHere, this is your first post! Good luck!</h3>
            <label>Please enter your details below</label>

            <br>
            <br>
            <label>Username:</label>
            <br>
            <input type="text" name="username" id="username">

            <br>
            <br>

            <label>E-mail:</label>
            <br>
            <input type="text" name="email" id="email">

            <br>
            <br>

            <label>Please select your topic</label>
            <br>

            <input type="text" name="topic" id="topic">

            <br>
            <br>
            <label>Content</label>
            <br>
            <p style="color: gray; margin-bottom: 0; padding-bottom: 0; font-size: 12px;">Max. 2000 characters</p>
            <textarea cols="60" rows="10" id="content" name="content">
            </textarea>
            <br>
            <br>

            <input type="hidden" id="id" name="id">
            <br>
            <button type="submit" style="margin-left: auto; margin-right: auto;" name="commentData" value="submit" >Submit</button>
            <br>
            <br>
        </form>


    </div>

    <div class="row">
        <aside>

            <h3>User123</h3>
            <p>This is on the side panel</p>
            <p>25/12/2016</p>
            <hr>

            <h3>User123</h3>
            <p>This is on the side panel</p>
            <p>25/12/2016</p>

            <hr>

            <h3>User123</h3>
            <p>This is on the side panel</p>
            <p>25/12/2016</p>

            <hr>

            <h3>User123</h3>
            <p>This is on the side panel</p>
            <p>25/12/2016</p>

        </aside>
            <div id="cntrol">
<!--            <div style="width: 95%; height: 9%; overflow-y: hidden;">-->

            <?php


            $sql="SELECT * FROM blog ORDER BY ID DESC ;";

            $retval = mysqli_query($connection, $sql);
            $id = filter_input(INPUT_GET, 'ID', FILTER_SANITIZE_STRING);

            echo $id;
            if(!$retval )
            {
                die('Could not get data: ' );
            }

            while($row = mysqli_fetch_array($retval, 1))
            {


                ?>

                <form
                        action="blog.php?action=showH"
                        method="POST">
                    <table>
                        <tr>
                            <td><h3><?php echo "{$row['Topic']}"?></h3></td>
                            <td style="text-align: right"><h5><?php echo "@{$row['Username']}" ?></h5></td>
                        </tr>

                        <tr>
                            <td>
                                <p><?php echo "{$row['Content']}" ?></p>
                                    <br>
                                <p style="font-size: 12px; text-align: right"><?php echo "{$row['TimeSubmited']}" ?></p>
                            </td>
                        </tr>

                        <tr>
                            <td><input type="submit" id="clickedForView" value="View"></td>
                        </tr>
                    </table>
                </form>
            <hr>
                <script>
                    $("#login").click(function(){
                        $("#post").show(500);
                    });

                    $("#clickedForView").click(function(){
                        $("#cntrol").hide(500);
                        $("#thisPost").show(500);
                    });
                </script>
            <?php

            }

            ?>
            </div>

        <div id="thisPost" hidden>
            <?php






            if (!$retval)
            {
                die('Could not get data: ');
            }

            if ($row = mysqli_fetch_array($retval, 1))
            {
                echo "{$row['ID']}";
                $temp = $row['ID'];
                echo "Hello $temp";

                $sql = "SELECT * FROM blog WHERE ID = $temp";
                mysqli_query($connection, $sql);
                echo "{$row['Content']}";
            }
            ?>
        </div>
    </div>

</div>
<?php require_once __DIR__ . '/footer.php'; ?>
