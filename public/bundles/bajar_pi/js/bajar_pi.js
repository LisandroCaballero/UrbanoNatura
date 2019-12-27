$(document).ready(function() {

    //$(".datepicker").mask("99-99-9999");
    $(".datepicker").datepicker(
        {
            dateFormat: "dd-mm-yy"
        }
    );

    $("#consultar").off("click");
    $("#consultar").on( "click", function(){
        var buttton = $(this);
        $.ajax({
            type: 'POST',
            url: Routing.generate("get-piezas-U3"),
            data: {
                prueba:"valor"
            },
            beforeSend: function() {
                buttton.prop("disabled", true);
                buttton.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...');
            },
            success: function(data) {
                console.log(data);
            },
            error: function(xhr) { // if error occured
                console.log(xhr);
            },
            complete: function() {
                buttton.prop("disabled", false);
                buttton.html('Consultar');
            },
            dataType: 'html'
        });
    });
});