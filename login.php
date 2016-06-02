<?php 
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ABM PHP</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/pisando.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Login</h1>    
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="verificarLogin.php" method="post">
                        <div class="form-group">
                        <label for="exampleInputEmail1">User</label>
                        <input name="usuario" id="usuario" class="form-control" placeholder="Ingrese usuario">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Pass</label>
                        <input type="password" name="password" id="password"class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" name="" class="btn btn-default">Ingresar</button>
                    <a href="registrar.php" class="btn btn-default">Nuevo Usuario</a> 
                </form> 
            </div>
        </div>      
    </div>

    <!------------Scripts------------>
    <script type="text/javascript" src="js/jquery-2.2.3.min"></script>
    <script type="text/javascript" src="js/bootstrap.min"></script>
</body>

</html>