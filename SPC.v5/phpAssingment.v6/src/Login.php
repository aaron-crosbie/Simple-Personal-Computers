<?php
namespace Itb;

$username = filter_input(INPUT_GET, 'username', FILTER_SANITIZE_STRING);

//require_once __DIR__ . '/../src/RegisterController.php';
//use Itb\RegisterController;
//$registerController = new RegisterController();

$filename ='login';

$title = 'Login';

require_once __DIR__ . '/head.php';
require_once __DIR__ . '/nav.php.twig';



?>

<!DOCTYPE>
<html>
<head>
    <meta http-equiv="refresh" content="5; url=index.html" />
    <title><?=$title?></title>

<!--Graphical counter to notify the user of the redirection time-->

            <script type="text/javascript">
            function countdown() {
                var i = document.getElementById('counter');
                if (parseInt(i.innerHTML)<=0) {
                    location.href = 'Login.php';
                }
                i.innerHTML = parseInt(i.innerHTML)-1;
            }
        setInterval(function(){ countdown(); },1000);
    </script>


</head>

<body>
<section id="this">
<h2>Hello <?= $username?>, </h2>

<p>
    Please check your <strong>username</strong> and <strong>password</strong> and try again.
</p>

<p><b>You will be redirected in <span id="counter">5</span> second(s).</b></p>
<link rel="canonical" href="/app/index.php"/>


</section>

<hr style="background-color: red;">

<?php require_once __DIR__ . '/footer.php'; ?>

</body>
</html>


