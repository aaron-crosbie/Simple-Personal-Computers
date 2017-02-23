<?php

//require_once __DIR__ . '/index.php';

$title = 'Register';
$filename ='register';

require_once __DIR__ . '/head.php';
require_once __DIR__ . '/nav.php';


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
else{
    echo "CONNECTED!!!!";
}

//Executes code when register button is selected
if(isset($_POST['submit'])){
    $displayForm = False;//Form no longer displayed
    $formMsg="Thanks for registering!";//text to be displayed on screen.
    $sql="INSERT INTO user (Username,FirstName,Tel,Email,dob,Address1,Address2,Address3,Pass)
 VALUES ('$_POST[username]','$_POST[name1]','$_POST[tel]','$_POST[email]','$_POST[date]','$_POST[addresslineone]','$_POST[addresslinetwo]','$_POST[addresslinethree]','$_POST[password]')";//SQL statement to insert data in user database

//    mysql_query($sql,$connection);//executes statement.

    mysqli_query($connection, $sql);

}




?>



<div class="column">
<h1>Please register</h1>

    <section>
        <div >
            <form class="member"
                  action="registering.php"
                  method="POST"
                  id="myform"
            >
                <fieldset>
                    <table cellpadding="5" cellspacing="3">
                        <legend>User information</legend>

                        <tr>
                            <td><label for = "name1">Name: </label>	</td>
                            <td><input type="text" name = "name1" maxlength="20" size="20"  placeholder="Enter your name" autofocus required ></td>
                            <td><label for = "name">Username: </label>	</td>
                            <td><input type="text" name = "username" maxlength="20" size="20"  placeholder="Enter your username" autofocus required ></td>
                        </tr>

                        <tr>
                            <td><label for = "tel" >Phone Number: </label></td>
                            <td><input type="tel" name = "tel"></td>
                            <td><label for = "email" >Email Address: </label></td>
                            <td><input type="email" name="email"></td>
                        </tr>


                        <tr>
                            <td>D.O.B</td>
                            <td><label><input type="date" name="date"></label></td>
                            <td>Male<label><input type="radio" name="shade" value="dark" checked value="Mr."></label></td>
                            <td>Female<label><input type="radio" name="shade" value="dark" checked value="Ms."></label></td>
                        </tr>

                        <tr>
                            <td><label for = "address" >Address Line 1: </label></td>
                            <td><input type="text" name="addresslineone" ></td>

                            <td>Password:* </td>
                            <td><input type="password" id = "password" maxlength="20" size="20"  name="password" required></td>
                        </tr>

                        <tr>
                            <td><label for = "address" >Address Line 2: </label></td>
                            <td><input type="text" name="addresslinetwo" ></td>

                            <td>Reenter password:* </td>
                            <td><input type="password" id = "secondPassword" maxlength="20" size="20" name="secondPassword" required></td>
                        </tr>

                        <tr>
                            <td><label for = "address" >Address Line 3: </label></td>
                            <td><input type="text" name="addresslinethree" ></td>
                        </tr>



                    </table>

                </fieldset>




                <div class= "center" >
                    <?php

                    ?>
                    <input type="submit" value="Submit" name="submit">
                   <input type="hidden" name="action" value="addUser">
                    <input type="reset" id="reset" value="Reset" >
                </div>

            </form>
        </div>

    </section>

</div>










<hr style="background-color: red;">

<?= require_once __DIR__ . '/footer.php';?>
</body>
</html>
