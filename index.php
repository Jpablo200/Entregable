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
  <body background="./img/fondo-negro.jpg" 
>
<br>
<br>
<br>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
              <div class="card" style="width: 70rem;">
                  <div class="card-body">
                  <?php if(!empty($user)): ?>
                  <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <?php require 'partials/header.php' ?>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                      <ul class="navbar-nav">
                        <li class="nav-item dropdown" >
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="logout.php">Cerrar sesión</a>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </nav>
                  <div class="container">
                        <div class="row">
                          <div class="col-sm-12">
                                <div class="jumbotron">
                                  <div class="container text-center">
                                    <h1>Sesión iniciada</h1>
                                    <p>MAMAGUEVOOO.</p>
                                  </div>
                                </div>

                              </div>
                          </div>
                        </div>
                      </div>
                    <?php else: ?>
                    <?php require 'partials/header.php' ?>
                      <h1>Por favor ingresa o Regístrate</h1>
                      <a href="login.php" class="btn btn-warning">Iniciar sesión</a> 
                      <a href="signup.php" class="btn btn-warning">Regístrate</a>
                    <?php endif; ?>
                  </div>
                </div>
            </div>
        </div>
    </div>
    

    
  </body>
</html>
