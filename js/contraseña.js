$(document).click(function() {
 
    
    $('#con1').keyup(function() {
        var pass1 = $('#con').val();
        var pass2 = $('#con1').val();

        if (pass1 == pass2) {
            $('#error2').text('Las Contraseñas Coinsiden');
            document.getElementById('btnEnviar').disabled=false;

        } else {
            $('#error2').text('Las Contraseñas no Coinsiden');
            document.getElementById('btnEnviar').disabled=true;
        }
        if (pass2 == "") {
            $('#error2').text('No dejar en blanco el campo con las contraseñas');
        }
    });
});

function desactivar(){
    document.frmRegistrar.btnEnviar.disabled=true;

}