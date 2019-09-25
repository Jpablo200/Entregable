<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM usuarios WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bienvenido a tu aplicación web</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="static/css/index.css" th:href="@{/css/index.css}">
  </head>
  <body background="./img/fondo-negro.jpg">
    <?php require 'partials/header.php' ?>

    <div class="container">
        <div class="row">
           
            <div class="col-sm-4">
              <div class="card" style="width: 70rem;">
                  <div class="card-body">
                  <?php if(!empty($user)): ?>
                  <div class="container">
                        <div class="row">
                          <div class="col-sm-12">
                          <h2 align="center">REGISTRO DEL USUARIOS</h2>
                              <form class="col-12" >
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                  </div>
                                  <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                  </div>
                                  <button type="submit" class="btn btn-primary">Submit</button>
                              </form>
                          </div>
                        </div>
                      </div>
                      <a href="logout.php">
                        Cerrar sesión
                      </a>
                    <?php else: ?>
                      <h1>Por favor ingresa o Regístrate</h1>

                      <a href="login.php">Iniciar sesión</a> o
                      <a href="signup.php">Regístrate</a>
                    <?php endif; ?>
                  </div>
                </div>
            </div>
        </div>
    </div>
    

    
  </body>
</html>
