/**
 * Created by Jakub Badacz B00080699.
 * Date: 29/03/2017
 * Time: 12:16
 */
//        $( function() {
//            $( "#draggable" ).draggable({ revert: "valid" });
//            $( "#draggable2" ).draggable({ revert: "invalid" });
//
//            $( "#droppable" ).droppable({
//                classes: {
//                    "ui-droppable-active": "ui-state-active",
//                    "ui-droppable-hover": "ui-state-hover"
//                },
//                drop: function( event, ui ) {
//                    $( this )
//                        .addClass( "ui-state-highlight" )
//                        .find( "p" )
//                        .html( "Dropped!" );
//                }
//            });
//        } );

$( function() {

    var counter = 0;

    $( "#draggable, #draggable2, #draggable3, #draggable4" ).draggable({ revert: "invalid" });

//            $( "#droppable" ).droppable({
//                accept: "#draggable",
////                classes: {
////                    "ui-droppable-active": "ui-state-active",
////                    "ui-droppable-hover": "ui-state-hover"
////                },
//                drop: function( event, ui ) {
//                    $(this)
//                        .addClass("ui-state-highlight")
//                        .find("p")
//                        .html("Dropped!");
//
//                }
//            });
//
//            $( "#droppable2" ).droppable({
//                accept: "#draggable2",
////                classes: {
////                    "ui-droppable-active": "ui-state-active",
////                    "ui-droppable-hover": "ui-state-hover"
////                },
//                drop: function( event, ui ) {
//                    $(this)
//                        .addClass("ui-state-highlight")
//                        .find("p")
//                        .html("Dropped!");
//
//                }
//            });

    var timeCount;

    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        timeCount = setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;

            display.textContent = seconds;

            if (--timer < 0){
                //timer = 0;
                alert("Quiz Failed.\nScore: "+ counter +"/4\nTry Again.");
                $("#quiz1").hide();
                $("#start1").show();
                clearInterval(timeCount);
                display.textContent = "5 seconds!";
            }
        }, 1000);
    }

    $( "#droppable, #droppable2, #droppable3, #droppable4" ).droppable({
        accept:  function (draggable) {
            var id_group_drop, id_group_drag;

            //get the "id_group" stored in a data-attribute of the draggable
            id_group_drag = $(draggable).attr("data-id-group");

            //get the "id_group" stored in a data-attribute of the droppable
            id_group_drop = $(this).attr("data-id-group");

            //compare the id_groups, return true if they match or false otherwise
            return id_group_drop == id_group_drag;
        },
//                classes: {
//                    "ui-droppable-active": "ui-state-active",
//                    "ui-droppable-hover": "ui-state-hover"
//                },
        drop: function( event, ui ) {
            $(this)
                .addClass("ui-state-highlight")
                .find("p")
                .html("Correct!");

            counter++;
            if(counter == 4){
                clearInterval(timeCount);
                alert("Success!\nScore: "+counter+"/4");
                $("#droppable").draggable({revert:true});
                counter = 0;
                $("#quiz1").hide();
                $("#start1").show();
            }
        }
    });


//            window.onload = function () {
//                var fiveMinutes = 5,
//                    display = document.querySelector('#time');
//                startTimer(fiveMinutes, display);
//            };

    $( "#start1" ).click(function() {
        $("#quiz1").show();
        $("#start1").hide();
        var fiveMinutes = 15,
            display = document.querySelector('#time');
        startTimer(fiveMinutes, display);
    });

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
        items: "li:not(.ui-state-disabled)",
        cancel: "li"
    }).disableSelection();

    //$("#sortable13").find("li").css("color","blue");

    $( "#buttonPro, #buttonGpu, #buttonMobo, #buttonCool," +
        "#buttonRam, #buttonPsu, #buttonSsd, #buttonHdd," +
        "#buttonCase, #buttonMoni, #buttonKey, #buttonMice" ).click(function() {

        var id= $(this).attr("data-id-button-group");
        $("#allComp").find("div[data-id-button-group="+ id +"]").toggle().siblings().hide();

    });

    $(document).on('click', '.cancelBut', function() {
        $(this).parent().remove();
    });


//        $(document).on('click', '#cont', function() {
//            $(this).parent().remove();
//        });

    $( "#cont" ).click(function() {
        $( "#sortable13" ).contents().clone().appendTo("#display ul").find(".cancelBut").remove();
        $( "<button id='pdfD'>Save To PDF</button>" ).appendTo('#display');

    });

    var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    $(document).on('click', '#pdfD', function () {
        doc.fromHTML($('#toPdf').html(), 15, 15, {
            'width': 170,
            'elementHandlers': specialElementHandlers
        });
        doc.save('sample-file.pdf');
        //$("#sortable1").css("background-color", "red");
    });

    $("#componentThat").click(function(){
        $("#buildIt").hide(500);
        $("#tut").show(500);
    });

    $("#buildThis").click(function(){
        $("#tut").hide(500);
        $("#buildIt").show(500);
    });

} );