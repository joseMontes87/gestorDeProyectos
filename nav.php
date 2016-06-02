<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ABM PHP</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/pisando.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!------------Scripts------------>
    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>    
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="userConfig.php">Cuenta</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active">
                  <a href="index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <?php 
                    if($_SESSION['rolSession']==1){
                    ?>
                        <li><a href="ticketReview.php">Review tickets</a></li>
                        <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Alta <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                
                                <li><a href="userAlta.php">Usuario</a></li>
                                <li><a href="altaCampania.php">Campaña</a></li>
                                <li><a href="altaProyecto.php">Proyecto</a></li>
                                <li><a href="altaEquipo.php">Equipo</a></li>
                            </ul>
                        </li>
                    <?php
                    }elseif($_SESSION['rolSession']==2) {
                     ?>   
                        <li><a href="altaTicketReview.php">Alta ticket</a></li>
                    <?php 
                    }
                ?>
                 
                <li><a href="cerrarSesion.php">Cerrar sesion</a></li>
            </ul>
        </div>
    </div>
</nav>