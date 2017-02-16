<?php

// Starting session for certain saved information
session_start();

// File name for nav bar
$filename ='post';

// File title
$title = 'Post';

// Requiring certain components
require_once __DIR__ . '/head.php';
require_once __DIR__ . '/nav.php';

//Database connection information
$hostname = "localhost";
$user = "root";
$pass = "";
$db = "test";

//Connecting to the database
$connection = mysqli_connect($hostname, $user, $pass, $db);

//Selecting infromation from the blog database
$sql="SELECT ID FROM blog ORDER BY ID DESC ;";

//Connecting using query
mysqli_query($connection, $sql);

?>

<body>

<div class="container">

    <?php



        echo $_SESSION['ID'];



    $sql = "SELECT * FROM blog WHERE ID = '$_SESSION[ID]'";

    $retval = mysqli_query($connection, $sql);

    if(!$retval)
    {
        die('Could not get data: dthfygvjuhbnkml' );
    }

    $row = mysqli_fetch_array($retval, 1);
    ?>
    <div class="jumbotron">
        <header style="text-align: right">
            <div>
                <p><?php echo "@{$row['Username']}" ?></p>
            </div>

            <h2><?php echo "{$row['Topic']}" ?></h2>

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
            <form
                    action=""
                    method="POST">
                <table>
                    <tr>

                    </tr>

                    <tr>
                        <td>
                            <p><?php echo "{$row['Content']}" ?></p>
                            <br>
                            <p style="font-size: 12px; text-align: right"><?php echo "{$row['TimeSubmited']}" ?></p>
                        </td>
                    </tr>
                </table>
                <input type="hidden" name="BLOGID" value="<?php echo "{$row['ID']}"  ?>">

                <button type="button" id="writeComment">Comment</button>
            </form>

            <hr>

            <!-- JS for neat l&f -->
            <script>
                $("#writeComment").click(function(){
                    $("#comments").show(500);
                });

                $("#commentContents").click(function(){
                    $("#comments").hide(500);
//                        $("#thisPost").show(500);
                });
            </script>

            <!-- Commenting section begins -->
            <h2>Recent comments</h2>

            <?php

            if(isset($_POST['commentContents'])) {

                $newTime = date("Y-m-d H:i:s");

                $sql="INSERT INTO comments (Username,Content,TimeSubbed, bloIDg) VALUES ('$_SESSION[username]','$_POST[content]','$newTime','$_SESSION[ID]')";

                mysqli_query($connection, $sql);
            }
            ?>

            <!-- Hidden until clicked-->
            <div id="comments" hidden>

                <h3>Write comment</h3>

                <form
                        id="formComments"
                        action="<?php echo $_SERVER['PHP_SELF']; ?>"
                        method="post">

                    <label style="color: gray; margin-bottom: 0; padding-bottom: 0; font-size: 12px;">Max. 200 characters</label>

                    <textarea cols="70" rows="10" id="content" name="content"></textarea>

                    <input type="submit" value="Post" name="commentContents">

                </form>

            </div>

            <div id="showComments">
<form>
                <?php

                $sql="SELECT * FROM comments WHERE bloIDg = $_SESSION[ID]";

                $retval = mysqli_query($connection, $sql);


                if(!$retval )
                {
                    die('Could not get data: ' );
                }

                while($row = mysqli_fetch_array($retval, 1))
                {
                    ?>

                    <table>
                        <tr>
                            <th><?php echo "{$row['Username']}" ?></th>

                            <th></th>
                        </tr>

                        <tr>
                            <td>
                                <p><?php echo "{$row['Content']}" ?></p>
                                <br>
                                <p style="font-size: 12px; text-align: right"><?php echo "{$row['TimeSubbed']}" ?></p>
                            </td>
                        </tr>

                    </table>
                    <hr>

                    <?php
                }
                ?>
</form>
            </div>

        </div>

    </div>

</div>

</body>
<?php require_once __DIR__ . '/footer.php'; ?>


