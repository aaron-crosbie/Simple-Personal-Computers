<?php

$filename ='contact';

$title = 'Contact Us';


require_once __DIR__ . '/head.php';
require_once __DIR__ . '/nav.php';

?>

<link rel="stylesheet" type="text/css" href="styles/vertical_carousal.min.css">

<style>


    .item {
        text-align: center;
    }

    #a {
        background: #6495ed;
    }

    #b {
        background: #cc66ff;
    }

    #c {
        background: #ff4d4d;
    }

    #d {
        background: #9999ff;
    }

    #e {
        background: #737373;
    }

    #f {
        background: #9999ff;
    }

    #g {
        background: #66ff66;
    }

    p, span {
        display: inline-block;
        vertical-align: middle;
    }

    span {
        height: 100%;
    }

    /*p {*/
        /*color: #fff;*/
        /*font-size: 3em;*/
    /*}*/
</style>
<body>

<div id="myVerticalCarousel" class="vertical-carousel" data-urlLock="false" data-rests-indicators="#navbar-collapse li">

    <ol class="vertical-carousel-indicators hidden-xs">
        <li data-target="#myVerticalCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myVerticalCarousel" data-slide-to="1"></li>
        <li data-target="#myVerticalCarousel" data-slide-to="2"></li>
        <li data-target="#myVerticalCarousel" data-slide-to="3"></li>
    </ol>

    <div class="vertical-carousel-box">

        <div id="a" class="item active">
            <span></span>
            <p>Contact Us</p>
        </div>

        <div id="b" class="item">
            <span></span>
            <p>Just fill in the form</p>
        </div>

        <div id="c" class="item">
            <span></span>
            <p>Name:</p>
            <input type="text" size="20" id="name">
        </div>

        <div id="d" class="item">
            <span></span>
            <p>
                <p>Contact number:</p>
                <input type="tel" size="20" id="tel">
            </p>
        </div>

        <div id="e" class="item">
            <span></span>
            <p>
            <p>Email:</p>
            <input type="email" size="20" id="email">
            </p>
        </div>

        <div id="f" class="item">
            <span></span>
            <p>
            <p>Concern:</p>
            <input type="text" id="text">
            </p>
        </div>

        <div id="g" class="item">
            <span></span>
            <?php require_once __DIR__ . '/footer.php'; ?>

        </div>

    </div>


</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="scripts/vertical_carousal.min.js"></script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>

