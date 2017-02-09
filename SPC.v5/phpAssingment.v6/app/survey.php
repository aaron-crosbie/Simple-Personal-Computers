<?php
require_once("Controller.php");

session_start();
$submission = false;
//$highEnd = new TestSurveyComponents("asusHighEnd", 400);
if(isset($_POST['gamesubmit'])) {
    $_SESSION["price"] = $_POST['price'];
    $_SESSION["motherboard"] = $_POST['motherboard'];
    $_SESSION["cpuPref"] = $_POST['cpuPref'];
    $_SESSION["gpuPref"] = $_POST['gpuPref'];
    $_SESSION["ram"] = $_POST['ram'];
    $_SESSION["hdd"] = $_POST['hdd'];
    $_SESSION["ssd"] = $_POST['ssd'];
    $_SESSION["periph"] = $_POST['periph'];
    $submission = true;

//************JSON FILE CREATION******************
//    $data[] = array('price'=> $_SESSION["price"], 'motherboard'=> $_SESSION["motherboard"]);
//    $response['data'] = $data;
//
//    $fp = fopen('result.json', 'w');
//    fwrite($fp, json_encode($response));
//    fclose($fp);
}
if(isset($_POST['officeSubmit'])) {
    echo "for choosing an office build...";
}
if(isset($_POST['videoEditSubmit'])) {
    echo "f for choosing a video editing build...";
}
//*************ECHOS FORM RESULTS TO SCREEN ON SUBMIT*********************
//    print_r($_SESSION["price"]);
//    echo "<br>";
//    print_r($_SESSION["motherboard"]);
//    echo "<br>";
//    print_r($_SESSION["cpuPref"]);
//    echo "<br>";
//    print_r($_SESSION["gpuPref"]);
//    echo "<br>";
//    print_r($_SESSION["ram"]);
//    echo "<br>";
//    print_r($_SESSION["hdd"]);
//    echo "<br>";
//    print_r($_SESSION["ssd"]);
//    echo "<br>";
//    print_r($_SESSION["periph"]);
//    echo "<br>";
    //*****************DISPLAYING COMPONENTS TO SCREEN*************************
if($submission) {
    $cont = new Controller($_SESSION['price'], $_SESSION['motherboard'], $_SESSION['cpuPref'], $_SESSION['gpuPref'], $_SESSION['ram'], $_SESSION['hdd'], $_SESSION['ssd']);
    $test = $cont->surveyAnalysis();
    $testMotherboard = $cont->getMotherboardName();
    $testCpu = $cont->getCpuName();
    $testGpu = $cont->getGpuName();
    $testRam = $cont->getRamName();
    $testHdd = $cont->getHddName();
    $testSsd = $cont->getSsdName();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="myscripts.js"></script>
    <meta charset="UTF-8">
    <title>Survey</title>
    <link rel="stylesheet" type="text/css" href="styles/reviews.css">

</head>
<body>
<?php
if(!$submission) {
    ?>
    <div class="survey">
        <form class="survey">
            What is the intent of this build?<br>
            <input type="radio" name="use" value="office" onclick="selectedBuild(this.value)"> Office use<br>
            <input type="radio" name="use" value="video" onclick="selectedBuild(this.value)"> Video
            editing/Photoshop<br>
            <input type="radio" name="use" value="gaming" onclick="selectedBuild(this.value)"> Gaming<br>
        </form>
        <br>
        <section id="office" style="display:none">
            <form class="survey" action="survey.php" method="post">
                <caption>Office Build</caption>
                <br>
                What is your price range?<br>
                <input type="radio" name="price" value="600"> &euro;400-600<br>
                <input type="radio" name="price" value="800"> &euro;600-800<br>
                <input type="radio" name="price" value="1000"> &euro;800-1000<br>
                <br>
                Would you like peripherals included in the price?<br>
                <input type="radio" name="periph" value="yes"> Yes<br>
                <input type="radio" name="periph" value="no"> No<br>
                <br>
                <span class="surveyButtons"><input type="submit" value="Submit" name="officeSubmit"> <input type="reset"
                                                                                                            value="Reset"
                                                                                                            name="reset"></span>
            </form>
        </section>
        <section id="video" style="display:none">
            <form class="survey" action="survey.php" method="post">
                <caption>Video Editing Build</caption>
                <br>
                What is your price range?<br>
                <input type="radio" name="price" value="1"> &euro;500-700<br>
                <input type="radio" name="price" value="2"> &euro;700-900<br>
                <input type="radio" name="price" value="3"> &euro;900-1100<br>
                <br>
                Would you like peripherals included in the price?<br>
                <input type="radio" name="periph" value="yes"> Yes<br>
                <input type="radio" name="periph" value="no"> No<br>
                <br>
                <span class="surveyButtons"><input type="submit" value="Submit" name="videoEditSubmit"> <input
                        type="reset" value="Reset" name="reset"></span>
            </form>
        </section>
        <section id="gaming" style="display:none">
            <form class="survey" method="post">
                <caption>Gaming Build</caption>
                <br>
                What is your price range?<br>
                <input type="radio" name="price" value="800" required> &euro;600-800<br>
                <input type="radio" name="price" value="1000"> &euro;800-1000<br>
                <input type="radio" name="price" value="1200"> &euro;1000-1200<br>
                <input type="radio" name="price" value="2000"> &euro;1200-2000<br>
                <br>
                Motherboard preference><br>
                <input type="radio" name="motherboard" value="asus" required> Asus<br>
                <input type="radio" name="motherboard" value="msi"> MSI<br>
                <input type="radio" name="motherboard" value="gigabyte"> Gigabyte<br>
                CPU preference?<br>
                <input type="radio" name="cpuPref" value="intel" required> Intel<br>
                <input type="radio" name="cpuPref" value="amd"> AMD<br>
                <br>
                GPU preference?<br>
                <input type="radio" name="gpuPref" value="nvidia" required> Nvidia<br>
                <input type="radio" name="gpuPref" value="amd"> AMD<br>
                <br>
                Ram requriements?<br>
                <select name="ram" required>
                    <option value="4">4GB</option>
                    <option value="8">8GB</option>
                    <option value="16">16GB</option>
                    <option value="32">32GB</option>
                </select>
                <br><br>
                Storage space requried?<br>
                <select name="hdd" required>
                    <option value="1">1TB</option>
                    <option value="2">2TB</option>
                    <option value="3">3TB</option>
                    <option value="4">4TB</option>
                </select>
                <br><br>
                SSD storage?<br>
                <select name="ssd" required>
                    <option value="0">No SSD needed</option>
                    <option value="128">128GB</option>
                    <option value="256">256GB</option>
                    <option value="512">512GB</option>
                </select>
                <br><br>
                <br>
                Would you like peripherals included in the price? (Monitor, keyboard, mouse ect.)<br>
                <input type="radio" name="periph" value="yes" required> Yes<br>
                <input type="radio" name="periph" value="no"> No<br>
                <br>
                <span class="surveyButtons"><input type="submit" value="Submit" name="gamesubmit"> <input type="reset"
                                                                                                          value="Reset"
                                                                                                          name="reset"></span>
            </form>
        </section>
        <!--***************TESTING DATABASE SUBMISSIONS*****************-->
        <!--    <form action="survey.php" method="post">-->
        <!--        fname:-->
        <!--        <input type="text" width="50" name="fname"><br>-->
        <!--        lname:-->
        <!--        <input type="text" width="50" name="lname"><br>-->
        <!--        num:-->
        <!--        <input type="number" width="50" name="num1"><br>-->
        <!--        <input type="submit" name="submit" value="Submit">-->
        <!--    </form>-->
    </div>
    <?php
}
if($submission) {
    ?>
    <div id="buildDisplay">
        <div>
            <table style="margin-bottom: 20px;">
                <caption>Your Build</caption>
                <tr>
                    <th>Motherboard: </th>
                    <td></td>
                </tr>
                <tr>
                    <th>CPU: </th>
                    <td><?php echo "$testMotherboard"; ?></td>
                </tr>
                <tr>
                    <th>GPU: </th>
                    <td><?php echo "$testCpu"; ?></td>
                </tr>
                <tr>
                    <th>RAM: </th>
                    <td><?php echo "$testRam"; ?></td>
                </tr>
                <tr>
                    <th>HDD: </th>
                    <td><?php echo "$testGpu"; ?></td>
                </tr>
                <tr>
                    <th>SSD: </th>
                    <td><?php echo "$testSsd"; ?></td>
                </tr>
                <tr>
                    <th>Price: </th>
                    <td><?php echo "$test"; ?></td>
                </tr>
            </table>
        </div>
        <div>
            <img src="/images/case1.jpg" style="width: 80%; border-radius: 4px;">
        </div>
    </div>
    <?php
}
?>
</body>
</html>
