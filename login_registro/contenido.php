<?php session_start();
//aca tambien trabajamos con sesiones por eso usamos session_start()
if(isset($_SESSION['usuario'])){
    require 'views/contenido.view.php';
} else{
    header ('Location: login.php');
}

?>