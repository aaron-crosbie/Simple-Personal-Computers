<?php
$username = filter_input(INPUT_GET, 'username', FILTER_SANITIZE_STRING);

$title = 'Registered';
$filename ='regster';


require_once __DIR__ . '/head.php';
require_once __DIR__ . '/nav.php.twig';

?>


<!DOCTYPE>
<html>
<head>
    <!--will be refreshed after 5 seconds count down-->
    <meta http-equiv="refresh" content="5; url=index.php" />
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

<h2>Welcome to <b>Cabal Online Fan Page</b></h2>

    <p>
        Thank you for registering <?= $username?> !
    </p>

<hr style="background-color: red;">

<?php require_once __DIR__ . '/footer.php'; ?>

</body>
</html>



