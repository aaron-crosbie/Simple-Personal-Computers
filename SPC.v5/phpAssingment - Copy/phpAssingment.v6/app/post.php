<?php
session_start();

$filename ='post';

$title = 'Post';

require_once __DIR__ . '/head.php';
require_once __DIR__ . '/nav.php';


//Database connection information
$hostname = "localhost";
$user = "root";
$pass = "";
$db = "test";

$connection = mysqli_connect($hostname, $user, $pass, $db);

$sql="SELECT ID FROM blog ORDER BY ID DESC ;";


mysqli_query($connection, $sql);
echo $_POST['ID'];


?>


<body>

<div class="container">


    <div class="jumbotron">
        <header style="text-align: right">
            <h2>Post heading</h2>

            <div>
                <p>User that created the post</p>
            </div>
        </header>
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
            <?php

            $ID = $_POST['ID'];
            $sql = "SELECT * FROM blog WHERE ID='$ID'";
            $retval = mysqli_query($connection, $sql);
            $id = filter_input(INPUT_GET, 'ID', FILTER_SANITIZE_STRING);

            if(!$retval )
            {
                die('Could not get data: ' );
            }

            $row = mysqli_fetch_array($retval, 1);
            ?>

                <form
                        action=""
                        method="POST">
                    <table>
                        <tr>
                            <td><h3><?php echo "{$row['Topic']}" ?></h3></td>
                            <td style="text-align: right"><h5><?php echo "@{$row['Username']}" ?></h5></td>
                        </tr>

                        <tr>
                            <td>
                                <p><?php echo "{$row['Content']}" ?></p>
                                <br>
                                <p style="font-size: 12px; text-align: right"><?php echo "{$row['TimeSubmited']}" ?></p>
                            </td>
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

            <div id="comments">
                <div id="userInfo">
                    <h4>Username</h4>
                    <h4>Time</h4>
                </div>

                <div id="commentContents">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At consectetur molestias non praesentium quod. Cum debitis ea esse eum incidunt nostrum obcaecati perferendis quam, quibusdam saepe sequi velit voluptatibus. Quod?</p>
                </div>

            </div>
        </div>

        </div>
    </div>

</body>
<?php require_once __DIR__ . '/footer.php'; ?>


