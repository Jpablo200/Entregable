<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body background="./img/bg2.jpg">

<br>
<br>
<br>
<br>

<div class="container my-7">
    <h2 align="center">RECUPERAR CONTRASEÑA</h2>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form  action="./php/RegistroProyecto.php" id="frmLogin" method="POST" autocomplete="off">
                    <input name="email" type="text" placeholder="Ingresa tu correo electrónico" required>
                    <input type="submit" value="Enviar" style="background: #00cb1e;"> 
                    <a href="login.php"><h3>Volver a Iniciar sesión</h3></a>                 
                </form>
            </div>
        </div>
    </div>
</body>
</html>