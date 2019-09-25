<?php
  require 'database.php';
  
  $message = '';
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO usuarios (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    if ($stmt->execute()) {
      $message  = '<font color="yellow">Nuevo usuario creado con éxito </font> ';
    } else {
      $message = '<font color="yellow">Lo sentimos, debe haber habido un problema al crear su cuenta</font> ';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registrar</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="./js/funciones.js"></script>
    <script src="./js/contraseña.js"></script>
  </head>
  <body background="./img/fondo-negro.jpg">
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="./img/Logologin.png" style: width="150" height="100">
                </div>
                     <h1>Regístrate</h1>
                <form class="col-12"  method="POST" action="" id="frmRegistrar" name="frmRegistrar" >
                    <div class="form-group" id="id-group">
                    <input name="email" id="id" type="text" placeholder="Ingresa tu correo electrónico" autocomplete="off" onchange="validarEmailreg(this)" > 
                    </div>
                    <div class="form-group" id="password-group">
                    <input name="password" id="con" type="password" placeholder="Ingresa tu contraseña" >
                    </div>
                    <div class="form-group" id="password-group">
                    <input name="confirm_password" id="con1" type="password" placeholder="Confirmar contraseña" >
                      <span id="error2"></span>
                    </div>
                   <div class="row"> 
                    <input type="submit" id="btnRegistrar" name="btnRegistrar" mr-2 col value="Enviar" onclick="MostrarMensaje()" >
                    </div>
                      <div id="formFooter">
                             <a href="login.php"><h3>Iniciar sesión</h3></a> 
                      </div>
                    
                </form>
            </div>
        </div>
    </div>
  </body>
</html>
