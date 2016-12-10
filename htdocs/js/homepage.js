/**
 * Created by Emily on 12/9/2016.
 */

$(function() {
    $("#datepicker").datepicker({
        onSelect: function(dateText,inst) {
            document.getElementById("filterDate").value = dateText;
            document.getElementById("dateform").submit();
        }
    });
});