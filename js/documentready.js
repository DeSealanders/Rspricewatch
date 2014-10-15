$(document).ready(function () {
    var options, a;
    jQuery(function(){
        options = {
            serviceUrl:'autocomplete.php',
            minChars:3,
            maxHeight:400,
            width:300
        };
        a = $('#item').autocomplete(options);
    });

    $("#addbutton").click(function() {
        $('.messages').empty();
        // Retrieve the form input
        var item = $("input#item").val();

        // Ajax request for import
        $.ajax({
            dataType: "json",
            type: "GET",
            url: "import.php",
            data: "item=" + item,
            success: function(data) {
                var success = data['success']
                var message = data['message'];
                if(success == true) {
                    reloadTable();
                }
                else {
                    $('.messages').append('<div class="alert alert-danger" role="alert">' + message + '</div>');
                }
            }
        });
        return false;
    });
});

$(document).on('click', '.refresh', function(){
    var href = $(this).attr('href');

    $.ajax({
        url: href,
        success: function(data) {
            var success = data['success']
            if(success == true) {
                reloadTable();
            }
        }
    });
    return false;
});

function reloadTable() {
    $('.tableContainer').empty();
    $('.tableContainer').load('table.php');

}