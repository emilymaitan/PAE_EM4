/**
 * Created by Emily on 1/11/2017.
 */

$ (document).ready(function(){
    $("#datepicker").datepicker({
        dateFormat: 'yy/mm/dd',
        showAnim: "slideDown"
    });

    $( "#slider-popularity" ).slider({
        range: true,
        min: 0,
        max: 100,
        values: [ 25, 75 ],
        slide: function( event, ui ) {
            $("#popLowVal").html(ui.values[0]);
            $("#popHiVal").html(ui.values[1]);
        }
    });

    $( "#slider-novelty" ).slider({
        range: true,
        min: 0,
        max: 100,
        values: [ 25, 75 ],
        slide: function( event, ui ) {
            $("#novLowVal").html(ui.values[0]);
            $("#novHiVal").html(ui.values[1]);
        }
    });

    $('tr[data-href]').on("click",function() {
        document.location = $(this).data('href');
    });
});