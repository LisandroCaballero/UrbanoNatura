$(document).ready(function() {

    //$(".datepicker").mask("99-99-9999");
    $(".datepicker").datepicker(
        {
            dateFormat: "dd-mm-yy"
        }
    );

    $("#bajar_pi").off("submit");
    $("#bajar_pi").on( "submit", function(e){
        e.preventDefault();
        var buttton =  $("#consultar");
        $.ajax({
            type: 'POST',
            url: Routing.generate("get-piezas-U3"),
            data: {
                shipper:$("#shipper").val(),
                sucursal:$("#sucursal").val(),
                fecha:$("#fecha").val()
            },
            beforeSend: function() {
                buttton.prop("disabled", true);
                buttton.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...');
                $("#resp-mensaje").removeClass('visible');
                $("#resp-mensaje").removeClass('alert-success');
                $("#resp-mensaje").removeClass('alert-info');
                $("#resp-mensaje").removeClass('alert-danger');
                $("#resp-mensaje").addClass('invisible');
            },
            success: function(data) {
                if(data.code == 1){
                    $("#resp-mensaje").html(data.mensaje);
                    $("#resp-mensaje").removeClass('invisible');
                    $("#resp-mensaje").addClass('visible');
                    $("#resp-mensaje").addClass('alert-success');
                }else{
                    $("#resp-mensaje").html(data.mensaje);
                    $("#resp-mensaje").removeClass('invisible');
                    $("#resp-mensaje").addClass('visible');
                    $("#resp-mensaje").addClass('alert-info');
                }
                // Imprimir alerta verde para OK .
            },
            error: function(xhr) { // if error occured
                $("#resp-mensaje").html(xhr.responseJSON.detail);
                $("#resp-mensaje").removeClass('invisible');
                $("#resp-mensaje").addClass('visible');
                $("#resp-mensaje").addClass('alert-danger');
            },
            complete: function() {
                buttton.prop("disabled", false);
                buttton.html('Consultar');
            },
            dataType: 'json'
        });
        return false;
    });

});