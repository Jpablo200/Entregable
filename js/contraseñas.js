$(document).ready(function() {

    $('#con1').keyup(function() {
        var pass1 = $('#con').val();
        var pass2 = $('#con1').val();

        if (pass1 == pass2) {
            $('#error2').text('Las Contraseñas Coinsiden');

        } else {
            $('#error2').text('Las Contraseñas no Coinsiden');
        }
        if (pass2 == "") {
            $('#error2').text('No dejar en blanco el campo con las contraseñas');
        }
    });

});