<?php
$filename ='build';

$title = 'Build';

require_once __DIR__ . '/head.php';
require_once __DIR__ . '/nav.html.twig';

?>


<!--<script src="functionsDrag.js"></script>-->

    <!--  Search bar  -->
    <div style="float: right; text-align: right">
        <form action="#">

        <h4>Component Search</h4>
        <input type="text" id="searchField" autocomplete="off" /><button>Search</button>
        <br />
        <div id="popups"> </div>
        </form>
    </div>

<div id="shown">
    <div>
        <a href="#" id="componentThat"><h2>Learn</h2></a>
        <p>Check out our videos on how to build your computer from scratch!</p>

    </div>
    <div>
        <a href="#" id="buildThis"><h2>Build</h2></a>
        <p>Choose your components for your future build!</p>
    </div>
</div>
<!--   Tutorials  -->
<div id="tut" hidden>

    <h1>Tutorials</h1>

    <p>Check out our tutorials how to build your builds from scratch</p>

    <h3>Basic builds</h3>

    <iframe width="420" height="315"
            src="https://www.youtube.com/embed/nZUYymbCH1w">
    </iframe>

    <hr>

    <h3>Mini tower builds</h3>

    <iframe width="420" height="315"
            src="https://www.youtube.com/embed/nZUYymbCH1w">
    </iframe>

    <hr>

    <h3>Midi tower builds</h3>

    <iframe width="420" height="315"
            src="https://www.youtube.com/embed/nZUYymbCH1w">
    </iframe>

    <h3>Full tower builds</h3>

    <iframe width="420" height="315"
            src="https://www.youtube.com/embed/nZUYymbCH1w">
    </iframe>

</div>

    <!--  Build it! -->
    <div id="buildIt" hidden>

        <script>
            $( function() {
                $( "#sortable1, #sortable2, #sortable3, #sortable4, #sortable5, #sortable6, #sortable7, #sortable8, #sortable9, #sortable10, #sortable11, #sortable12").sortable({
                    connectWith: ".connectedSortable",
                    placeholder: "ui-state-highlight",
                    items: "li:not(.ui-state-disabled)",
                    remove: function(event, ui) {
                        ui.item.clone().append( "<button class='cancelBut'>Remove</button>" ).appendTo('#sortable13');
                        $(this).sortable('cancel');
                    }
                }).disableSelection();

                $( "#sortable13").sortable({
                    connectWith: ".connectedSortable",
                    items: "li:not(.ui-state-disabled)"
                }).disableSelection();


                $( "#buttonPro" ).click(function() {
                    $( "#processors" ).toggle().siblings().hide();
                });

                $( "#buttonGpu" ).click(function() {
                    $( "#gpus" ).toggle().siblings().hide();
                });

                $( "#buttonMobo" ).click(function() {
                    $( "#motherboards" ).toggle().siblings().hide();
                });

                $( "#buttonCool" ).click(function() {
                    $( "#cooling" ).toggle().siblings().hide();
                });

                $( "#buttonRam" ).click(function() {
                    $( "#ram" ).toggle().siblings().hide();
                });

                $( "#buttonPsu" ).click(function() {
                    $( "#psu" ).toggle().siblings().hide();
                });

                $( "#buttonSsd" ).click(function() {
                    $( "#ssd" ).toggle().siblings().hide();
                });

                $( "#buttonHdd" ).click(function() {
                    $( "#hdd" ).toggle().siblings().hide();
                });

                $( "#buttonCase" ).click(function() {
                    $( "#cases" ).toggle().siblings().hide();
                });

                $( "#buttonMoni" ).click(function() {
                    $( "#monitors" ).toggle().siblings().hide();
                });

                $( "#buttonKey" ).click(function() {
                    $( "#keyboards" ).toggle().siblings().hide();
                });

                $( "#buttonMice" ).click(function() {
                    $( "#mice" ).toggle().siblings().hide();
                });

                $(document).on('click', '.cancelBut', function() {
                    $(this).parent().remove();
                });

//        $(document).on('click', '#cont', function() {
//            $(this).parent().remove();
//        });

                $( "#cont" ).click(function() {
                    $( "#sortable13" ).contents().clone().appendTo("#display").find(".cancelBut").remove();

                });

            } );
        </script>
        <h1>Build your SPC!</h1>
        <p style="text-align: center; background-color: white">Easy - Fast - Simple</p>
        <div id="allComp">
            <ul id="componentsBut">
                <li><button id="buttonPro">Processors</button></li>
                <li><button id="buttonGpu">Graphics Cards</button></li>
                <li><button id="buttonMobo">Motherboards</button></li>
                <li><button id="buttonCool">Cooling</button></li>
                <li><button id="buttonRam">RAM</button></li>
                <li><button id="buttonPsu">Power Supply</button></li>
                <li><button id="buttonSsd">SSDs</button></li>
                <li><button id="buttonHdd">HDDs</button></li>
                <li><button id="buttonCase">Cases</button></li>
                <li><button id="buttonMoni">Monitor</button></li>
                <li><button id="buttonKey">Keyboards</button></li>
                <li><button id="buttonMice">Mice</button></li>

            </ul>

            <div id="components" >
                <div id="processors" style="display: none">
                    <ul id="sortable1" class="connectedSortable">
                        <li class="ui-state-default ui-state-disabled" style="background-color: black; color: white;">Processors</li>
                        <li class="ui-state-default"><p>Intel Core i7</p></li>
                        <li class="ui-state-default"><p>Intel Core i5</p></li>
                        <li class="ui-state-default"><p>Intel Core i3</p></li>
                        <li class="ui-state-default"><p>AMD FX8350</p></li>
                        <li class="ui-state-default"><p>AMD FX6300</p></li>
                    </ul>
                </div>

                <div id="gpus" style="display: none">
                    <ul id="sortable2" class="connectedSortable">
                        <li class="ui-state-default ui-state-disabled" style="background-color: black; color: white;">Graphic Cards</li>
                        <li class="ui-state-default"><p>Nvidia Titan X</p></li>
                        <li class="ui-state-default"><p>EVGA GeForce GTX 1080</p></li>
                        <li class="ui-state-default"><p>Zotac GeForce GTX 980Ti</p></li>
                        <li class="ui-state-default"><p>Gigabyte Radeon R9 Fury X</p></li>
                        <li class="ui-state-default"><p>Sapphire Radeon R9 Nano</p></li>
                    </ul>
                </div>

                <div id="motherboards" style="display: none">
                    <ul id="sortable3" class="connectedSortable">
                        <li class="ui-state-default ui-state-disabled" style="background-color: black; color: white;">Motherboards</li>
                        <li class="ui-state-default"><p>Asus Strix</p></li>
                        <li class="ui-state-default"><p>Gigabyte ROG</p></li>
                        <li class="ui-state-default"><p>Zotac GeForce GTX 980Ti</p></li>
                        <li class="ui-state-default"><p>Gigabyte Radeon R9 Fury X</p></li>
                        <li class="ui-state-default"><p>Sapphire Radeon R9 Nano</p></li>
                    </ul>
                </div>

                <div id="cooling" style="display: none">
                    <ul id="sortable4" class="connectedSortable">
                        <li class="ui-state-default ui-state-disabled" style="background-color: black; color: white;">Cooling</li>
                        <li class="ui-state-default"><p>Cool Master</p></li>
                        <li class="ui-state-default"><p>Corsair</p></li>
                        <li class="ui-state-default"><p>Zotac GeForce GTX 980Ti</p></li>
                        <li class="ui-state-default"><p>Gigabyte Radeon R9 Fury X</p></li>
                        <li class="ui-state-default"><p>Sapphire Radeon R9 Nano</p></li>
                    </ul>
                </div>

                <div id="ram" style="display: none">
                    <ul id="sortable5" class="connectedSortable">
                        <li class="ui-state-default ui-state-disabled" style="background-color: black; color: white;">RAM</li>
                        <li class="ui-state-default"><p>Kingston</p></li>
                        <li class="ui-state-default"><p>HyperX</p></li>
                        <li class="ui-state-default"><p>Zotac GeForce GTX 980Ti</p></li>
                        <li class="ui-state-default"><p>Gigabyte Radeon R9 Fury X</p></li>
                        <li class="ui-state-default"><p>Sapphire Radeon R9 Nano</p></li>
                    </ul>
                </div>

                <div id="psu" style="display: none">
                    <ul id="sortable6" class="connectedSortable">
                        <li class="ui-state-default ui-state-disabled" style="background-color: black; color: white;">Power Supply</li>
                        <li class="ui-state-default"><p>Corsair</p></li>
                        <li class="ui-state-default"><p>EVGA</p></li>
                        <li class="ui-state-default"><p>Zotac GeForce GTX 980Ti</p></li>
                        <li class="ui-state-default"><p>Gigabyte Radeon R9 Fury X</p></li>
                        <li class="ui-state-default"><p>Sapphire Radeon R9 Nano</p></li>
                    </ul>
                </div>

                <div id="ssd" style="display: none">
                    <ul id="sortable7" class="connectedSortable">
                        <li class="ui-state-default ui-state-disabled" style="background-color: black; color: white;">SSDs</li>
                        <li class="ui-state-default"><p>Samsung</p></li>
                        <li class="ui-state-default"><p>EVGA GeForce GTX 1080</p></li>
                        <li class="ui-state-default"><p>Zotac GeForce GTX 980Ti</p></li>
                        <li class="ui-state-default"><p>Gigabyte Radeon R9 Fury X</p></li>
                        <li class="ui-state-default"><p>Sapphire Radeon R9 Nano</p></li>
                    </ul>
                </div>

                <div id="hdd" style="display: none">
                    <ul id="sortable8" class="connectedSortable">
                        <li class="ui-state-default ui-state-disabled" style="background-color: black; color: white;">HDDs</li>
                        <li class="ui-state-default"><p>Samsung</p></li>
                        <li class="ui-state-default"><p>Kingston</p></li>
                        <li class="ui-state-default"><p>Zotac GeForce GTX 980Ti</p></li>
                        <li class="ui-state-default"><p>Gigabyte Radeon R9 Fury X</p></li>
                        <li class="ui-state-default"><p>Sapphire Radeon R9 Nano</p></li>
                    </ul>
                </div>

                <div id="cases" style="display: none">
                    <ul id="sortable9" class="connectedSortable">
                        <li class="ui-state-default ui-state-disabled" style="background-color: black; color: white;">Cases</li>
                        <li class="ui-state-default"><p>Corsair</p></li>
                        <li class="ui-state-default"><p>Cool Master</p></li>
                        <li class="ui-state-default"><p>Zotac GeForce GTX 980Ti</p></li>
                        <li class="ui-state-default"><p>Gigabyte Radeon R9 Fury X</p></li>
                        <li class="ui-state-default"><p>Sapphire Radeon R9 Nano</p></li>
                    </ul>
                </div>

                <div id="monitors" style="display: none">
                    <ul id="sortable10" class="connectedSortable">
                        <li class="ui-state-default ui-state-disabled" style="background-color: black; color: white;">Monitors</li>
                        <li class="ui-state-default"><p>Samsung</p></li>
                        <li class="ui-state-default"><p>LG</p></li>
                        <li class="ui-state-default"><p>Zotac GeForce GTX 980Ti</p></li>
                        <li class="ui-state-default"><p>Gigabyte Radeon R9 Fury X</p></li>
                        <li class="ui-state-default"><p>Sapphire Radeon R9 Nano</p></li>
                    </ul>
                </div>

                <div id="keyboards" style="display: none">
                    <ul id="sortable11" class="connectedSortable">
                        <li class="ui-state-default ui-state-disabled" style="background-color: black; color: white;">Keyboards</li>
                        <li class="ui-state-default"><p>Corsair</p></li>
                        <li class="ui-state-default"><p>Razor</p></li>
                        <li class="ui-state-default"><p>Zotac GeForce GTX 980Ti</p></li>
                        <li class="ui-state-default"><p>Gigabyte Radeon R9 Fury X</p></li>
                        <li class="ui-state-default"><p>Sapphire Radeon R9 Nano</p></li>
                    </ul>
                </div>

                <div id="mice" style="display: none">
                    <ul id="sortable12" class="connectedSortable">
                        <li class="ui-state-default ui-state-disabled" style="background-color: black; color: white;">Mice</li>
                        <li class="ui-state-default"><p>Razor</p></li>
                        <li class="ui-state-default"><p>EVGA GeForce GTX 1080</p></li>
                        <li class="ui-state-default"><p>Zotac GeForce GTX 980Ti</p></li>
                        <li class="ui-state-default"><p>Gigabyte Radeon R9 Fury X</p></li>
                        <li class="ui-state-default"><p>Sapphire Radeon R9 Nano</p></li>
                    </ul>
                </div>
            </div>

            <div id="selectItems">
                <h1 id="dragText">Drag Here</h1>
                <ul id="sortable13" style="min-height: 50px" class="connectedSortable"></ul>
            </div>

            <div id="display"><ul id="displayUl"><li><button id="cont">Continue</button></li></ul></div>
        </div>
    </div>

    <script>
        $("#componentThat").click(function(){
            $("#buildIt").hide(500);
            $("#tut").show(500);
        });

        $("#buildThis").click(function(){
            $("#tut").hide(500);
            $("#buildIt").show(500);
        });
    </script>
    </script>
<?php require_once __DIR__ . '/footer.php'; ?>