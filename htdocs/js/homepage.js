/**
 * Created by Emily on 12/9/2016.
 */

$ (document).ready(function(){
    $("#datepicker").datepicker({
        onSelect: function(dateText,inst) {
            document.getElementById("filterDate").value = dateText;
            document.getElementById("dateform").submit();
        }
    });

    $('tr[data-href]').on("click",function() {
        document.location = $(this).data('href');
    });
});