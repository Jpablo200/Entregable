 function validarEmail(val) {
     var texto = document.getElementById(val.id).value;
     var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
     if (!regex.test(texto)) {
         Swal.fire("La dirección de email es incorrecta.");
     } else {
         Swal.fire("La dirección de email es correcta.")
     }
 }

 function validarEmailreg(val) {
     var texto = document.getElementById(val.id).value;
     var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
     if (!regex.test(texto)) {
         Swal.fire("La dirección de email es incorrecta.");
     } else {
         Swal.fire("La dirección de email es correcta.")
     }
 }