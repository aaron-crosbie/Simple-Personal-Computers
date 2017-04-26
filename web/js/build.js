/**
 * Created by Jakub Badacz B00080699.
 * Date: 18/04/2017
 * Time: 15:37
 */

/* Initializing all the variables */
var counterQuiz1 = 0;
var counterQuiz2 = 0;
var timeCount;

var hasProc = false;
var hasMobo = false;
var hasPsu = false;
var hasCase = false;
var hasGpu = 0;

var allDragComp = $("#draggable, #draggable2, #draggable3, #draggable4, " +
    "#draggable5, #draggable6, #draggable7, #draggable8,"+
    "#draggable9, #draggable10, #draggable11, #draggable12" );

var allDropComp = $("#droppable, #droppable2, #droppable3, #droppable4, " +
    "#droppable5, #droppable6, #droppable7, #droppable8,"+
    "#droppable9, #droppable10, #droppable11, #droppable12" );

var allDragCaseComp = $("#draggableCase1, #draggableCase2, #draggableCase3, #draggableCase4, #draggableCase5," +
    "#draggableCase6, #draggableCase7, #draggableCase8, #draggableCase9, #draggableCase10");

var allDropCaseComp = $("#droppableCase1, #droppableCase2, #droppableCase3, #droppableCase4, #droppableCase5," +
    "#droppableCase6, #droppableCase7, #droppableCase8, #droppableCase9, #droppableCase11");
/******************************************************************************************************************/

/* Enabling draggable and dropable for Quiz 1 and Quiz 2 */
/* Quiz one components*/
allDragComp.draggable({
    revert: "invalid",
    cursor: "move",
    cursorAt: { top: 50, left: 60 }});

allDropComp.droppable({
    accept:  function (draggable) {
        var id_group_drop, id_group_drag;

        //get the "id_group" stored in a data-attribute of the draggable
        id_group_drag = $(draggable).attr("data-id-group");

        //get the "id_group" stored in a data-attribute of the droppable
        id_group_drop = $(this).attr("data-id-group");

        //compare the id_groups, return true if they match or false otherwise
        return id_group_drop == id_group_drag;
    },
    drop: function( event, ui ) {
        $(this).addClass('ui-state-highlight');
        ui.draggable.css('visibility', 'hidden');
        counterQuiz1++;
        if(counterQuiz1 == 12){

            //reset the timer
            clearInterval(timeCount);

            //display the score
            alert("Success!\nScore: "+counterQuiz1+"/12");
            counterQuiz1 = 0;

            //bring back previous interface
            $("#quiz1").hide(500);
            $("#start1, #quizHnD2, #start2").show(500);
            allDragComp.css({"left": "0", "top": "0"});
            allDropComp.removeClass("ui-state-highlight");
        }
    }
});
/********************************************************************************/

/* Quiz 2 components*/
allDragCaseComp.draggable({
    revert: "invalid",
    cursor: "move",
    cursorAt: { top: 30, left: 70 }}).css("position", "relative");

allDropCaseComp.droppable({
    accept:  function (draggable) {
        var id_group_drop, id_group_drag;

        //get the "id_group" stored in a data-attribute of the draggable
        id_group_drag = $(draggable).attr("data-id-group");

        //get the "id_group" stored in a data-attribute of the droppable
        id_group_drop = $(this).attr("data-id-group");

        //compare the id_groups, return true if they match or false otherwise
        return id_group_drop == id_group_drag;
    },
    drop: function( event, ui ) {
        $( this ).css('background-color', 'green');
        ui.draggable.css('visibility', 'hidden');
        counterQuiz2++;

        //if statement to hide the arrow
        if(ui.draggable.is('#draggableCase10')){
            $('#droppableCase10').css('visibility', 'hidden');
        }

        if(counterQuiz2 == 10){
            //stop the timer
            clearInterval(timeCount);

            //show the result
            alert("Success!\nScore: "+counterQuiz2+"/10");
            counterQuiz2 = 0;

            //show previous interface
            $("#quiz2").hide(500);
            $("#start1, #quizHnD1, #start2").show(500);
            allDragCaseComp.css({"left": "0", "top": "0"});
        }
    }
});
/****************************************************************/

/* Start Quiz 1 */
$( "#start1" ).click(function() {
    $("#quiz1").show(500);
    $("#start1, #quizHnD2, #start2").hide(500);
    allDragComp.css('visibility', 'visible');
    var sixtySec = 59,
        display1 = document.querySelector('#timeQuiz1');
    startTimerQuiz1(sixtySec, display1);
});
/************************************************************/

/* Start Quiz 2*/
$( "#start2" ).click(function() {
    $("#quiz2").show(500);
    $("#start2, #quizHnD1, #start1").hide(500);
    allDropCaseComp.css('visibility', 'visible');
    allDragCaseComp.css('visibility', 'visible');
    var thirtySec = 59,
        display2 = document.querySelector('#timeQuiz2');
    startTimerQuiz2(thirtySec, display2);
});
/*************************************************************/

/* Quit Quiz 1 */
$( "#quitQuiz1" ).click(function() {
    alert("You have failed the quiz.");
    clearInterval(timeCount);
    counterQuiz1 = 0;
    allDragComp.css({"left": "0", "top": "0"});
    allDropComp.removeClass("ui-state-highlight");
    $("#quiz1").hide(500);
    $("#start2, #quizHnD2, #start1").show(500);
});
/****************************************************/

/* Quit Quiz 2 */
$( "#quitQuiz2" ).click(function() {
    alert("You have failed the quiz.");
    clearInterval(timeCount);
    allDragCaseComp.css({"left": "0", "top": "0"});
    counterQuiz2 = 0;
    $("#quiz2").hide(500);
    $("#start2, #quizHnD1, #start1").show(500);
});
/***************************************************/

/* Function for Quiz 1 timer */
function startTimerQuiz1(duration, display) {
    var timer = duration, seconds;
    timeCount = setInterval(function () {
        seconds = parseInt(timer % 60, 10);

        display.textContent = seconds;

        if (--timer < 0){
            alert("Quiz Failed.\nScore: "+ counterQuiz1 +"/12\nTry Again.");
            counterQuiz1 = 0;
            $("#quiz1").hide(500);
            $("#start1, #quizHnD2, #start2").show(500);
            clearInterval(timeCount);
            display.textContent = "60";
            allDragComp.css({"left": "0", "top": "0"});
            allDropComp.removeClass("ui-state-highlight");
        }
    }, 1000);
}
/**************************************************************************************/

/* Function for Quiz 1 timer */
function startTimerQuiz2(duration, display) {
    var timer = duration, seconds;
    timeCount = setInterval(function () {
        seconds = parseInt(timer % 60, 10);

        display.textContent = seconds;

        if (--timer < 0){
            alert("Quiz Failed.\nScore: "+ counterQuiz2 +"/10\nTry Again.");
            counterQuiz2 = 0;
            $("#quiz2").hide(500);
            $("#start1, #quizHnD1, #start2").show(500);
            clearInterval(timeCount);
            display.textContent = "60";
            allDragCaseComp.css({"left": "0", "top": "0"});
        }
    }, 1000);
}
/********************************************************************************/

/* Implementing sortable lists with components*/
$( "#sortable1, #sortable2, #sortable3, #sortable4, #sortable5, #sortable6, #sortable7, #sortable8, #sortable9, #sortable10, #sortable11, #sortable12").sortable({
    connectWith: ".connectedSortable",
    placeholder: "ui-state-highlight",
    items: "li:not(.ui-state-disabled)",
    remove: function(event, ui) {

        //If statement to check if the user selected list contains processor
        if($("#sortable13").has("li[data-item-type='procItem']") && ui.item.attr("data-item-type") === "procItem"){
            //adding a remove button to the element
            ui.item.clone().append( "<button class='cancelBut'>Remove</button>" ).appendTo('#sortable13');
            $(this).sortable('cancel');
            hasProc = true;
            //disabling processors
            $("#sortable1").find("li").addClass('ui-state-disabled');
        }

        //If statement to check if the user selected list contains graphics card
        else if($("#sortable13").find("li[data-item-type='gpuItem']") && ui.item.attr("data-item-type") === "gpuItem"){

            //check if the list has 2 = disable, else do not disable
            if($("#sortable13").find("li[data-item-type='gpuItem']").length > 1 && ui.item.attr("data-item-type") === "gpuItem"){
                ui.item.clone().append( "<button class='cancelBut'>Remove</button>" ).appendTo('#sortable13');
                $(this).sortable('cancel');
                $("#sortable2").find("li").addClass('ui-state-disabled');
            }else{
                ui.item.clone().append( "<button class='cancelBut'>Remove</button>" ).appendTo('#sortable13');
                $(this).sortable('cancel');
                hasGpu++;
            }
        }
        //If statement to check if the user selected list contains motherboard
        else if($("#sortable13").has("li[data-item-type='moboItem']") && ui.item.attr("data-item-type") === "moboItem"){
            ui.item.clone().append( "<button class='cancelBut'>Remove</button>" ).appendTo('#sortable13');
            $(this).sortable('cancel');
            hasMobo = true;
            $("#sortable3").find("li").addClass('ui-state-disabled');
        }
        //If statement to check if the user selected list contains power supply
        else if($("#sortable13").has("li[data-item-type='psuItem']") && ui.item.attr("data-item-type") === "psuItem"){
            ui.item.clone().append( "<button class='cancelBut'>Remove</button>" ).appendTo('#sortable13');
            $(this).sortable('cancel');
            hasPsu = true;
            $("#sortable6").find("li").addClass('ui-state-disabled');
        }

        //If statement to check if the user selected list contains a case
        else if($("#sortable13").has("li[data-item-type='caseItem']") && ui.item.attr("data-item-type") === "caseItem"){
            ui.item.clone().append( "<button class='cancelBut'>Remove</button>" ).appendTo('#sortable13');
            $(this).sortable('cancel');
            hasCase = true;
            $("#sortable9").find("li").addClass('ui-state-disabled');
        }
        else{
            ui.item.clone().append( "<button class='cancelBut'>Remove</button>" ).appendTo('#sortable13');
            $(this).sortable('cancel');
        }

    }
}).disableSelection();

/* User selected components list implementation*/
$( "#sortable13").sortable({
    connectWith: ".connectedSortable",
    items: "li:not(.ui-state-disabled)",
    cancel: "li"
}).disableSelection();

/* Click function for all buttons to display components */
$( "#buttonPro, #buttonGpu, #buttonMobo, #buttonCool," +
    "#buttonRam, #buttonPsu, #buttonSsd, #buttonHdd," +
    "#buttonCase, #buttonMoni, #buttonKey, #buttonMice" ).click(function() {

    //find a button with an id which matches the button clicked
    //then show the list
    var id= $(this).attr("data-id-button-group");
    $("#allComp").find("div[data-id-button-group="+ id +"]").toggle().siblings().hide();

});
/*********************************************************************************************/

/* Click function for remove button*/
$(document).on('click', '.cancelBut', function() {

    //removing a processor from a list
    if(hasProc && $(this).parent().attr('data-item-type') === 'procItem'){
        $("#sortable1").find("li[data-item-type='procItem']").removeClass('ui-state-disabled');
        hasProc = false;
        $(this).parent().remove();
    }
    //removing a motheboard from a list
    else if(hasMobo  && $(this).parent().attr('data-item-type') === 'moboItem'){
        $("#sortable3").find("li[data-item-type='moboItem']").removeClass('ui-state-disabled');
        hasMobo = false;
        $(this).parent().remove();
    }
    //removing a power supply from a list
    else if(hasPsu  && $(this).parent().attr('data-item-type') === 'psuItem'){
        $("#sortable6").find("li[data-item-type='psuItem']").removeClass('ui-state-disabled');
        hasPsu = false;
        $(this).parent().remove();
    }
    //removing a case from a list
    else if(hasCase  && $(this).parent().attr('data-item-type') === 'caseItem'){
        $("#sortable9").find("li[data-item-type='caseItem']").removeClass('ui-state-disabled');
        hasCase = false;
        $(this).parent().remove();
    }
    //removing a graphics card from a list
    else if(hasGpu < 2  && $(this).parent().attr('data-item-type') === 'gpuItem'){
        $("#sortable2").find("li[data-item-type='gpuItem']").removeClass('ui-state-disabled');
        hasGpu--;
        $(this).parent().remove();
    }
    else{
        $(this).parent().remove();
    }
});
/************************************************************************************************/

/* Continue button function which gets all chosen components */
$( "#cont" ).click(function() {
    $( "#sortable13" ).contents().clone().appendTo("#display ul").find(".cancelBut").remove();
    $("#buildText").show();
    $("#components, #componentsBut, #selectItems, #cont").hide(500);
    $("#display").show(500);
});
/***************************************************************************************************/

/* Back to build button function */
$(document).on('click', '#backBuild', function(){
    $("#display").hide(500);
    $("#display ul").contents().remove();
    $("#components, #componentsBut, #selectItems, #cont").show(500);
});
/***************************************************************************/

/* jsPDF method to insert the chosen components into a pdf file*/
var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$(document).on('click', '#pdfButton', function () {
    doc.fromHTML($('#toPdf').html(), 15, 15, {
        'width': 170,
        'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
});
/***************************************************************/


/* Show build or learn interface actions*/
$("#componentThat").click(function(){
    $("#buildIt").hide(500);
    $("#tut").show(500);
});

$("#buildThis").click(function(){
    $("#tut").hide(500);
    $("#buildIt").show(500);
});
/*********************************************/