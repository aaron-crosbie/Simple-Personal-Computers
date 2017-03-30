( function() {
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