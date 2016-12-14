/**
 * Created by Emily on 12/9/2016.
 */

$ (document).ready(function(){
    $("#datepicker").datepicker({
        dateFormat: 'yy/mm/dd', // for REST-like URL redirection

        onSelect: function(dateText,inst) {
            document.location = "/projects/" + dateText;
        }
    });

    $('tr[data-href]').on("click",function() {
        document.location = $(this).data('href');
    });
});