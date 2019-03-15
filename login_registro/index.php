<?php
session_start();
//comprobacion de sesion:

if( isset($_SESSION['usuario'])) {
    header('Location: contenido.php');
} else {
    header('Location: registrate.php');

}



?>