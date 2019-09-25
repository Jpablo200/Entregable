<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /Entregable');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM usuarios WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /Entregable");
    } else {
      $message = 'Lo sentimos, este usuario no existe';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Iniciar sesión</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="./js/funciones.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  </head>
  

<body>
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
    
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="./img/Logologin.png" style: width="150" height="100">
                </div>
                   <h1 >Login</h1>
                <form class="col-12" action="login.php" method="POST"  >
                    <div class="form-group" id="id-group">
                    <input name="email"  id="id" type="text" placeholder="Ingresa tu correo electrónico"  autocomplete="off" onchange="validarEmail(this)">
                    </div>
                    <div class="form-group" id="password-group">
                    <input name="password" type="password" placeholder="Ingresa tu contraseña" >
                    </div>
                   <div class="row"> 
                    <input type="submit" class="btn btn-warning"  value="Enviar" >
                    </div>
                      <div id="formFooter">
                           <a href="signup.php"><h3>¿ No tienes una cuenta, registrate?</h3></a>
                           <a href="recover.php"><h3>¿Olvidaste la contraseña?</h3></a>
                      </div>
                    
                </form>
            </div>
        </div>
    </div>

  </body>
</html>
