<?php session_start();
//si la sesion esta seteada la enviamos al index
if(isset($_SESSION['usuario'])){ //['usuario'] es el name en el formulario.
    
    header('Location: index.php');

}
$errores ='';
//si se envio el dato
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //guardamos en otra  variable usuario
    //filtramos que no hayan caracteres extraños.
    $usuario =filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    //sobreescribimos password para hasharlo :

    $password = hash('sha512', $password);

    //conectamos a la base con try catch:

    try{

        $conexion = new PDO('mysql:host=127.0.0.1;dbname=registro_usuarios','root','');

    } catch (PDOException $e){
        echo "Error:" . $e->getMessage();
    }
    $statement = $conexion->prepare('
    SELECT * FROM registrados WHERE nombre = :usuario AND pass = :password'
    
);
    $statement->execute(array(
        ':usuario'=> $usuario,
        ':password' => $password
    ));
    $resultado = $statement->fetch();
    if($resultado !== false) {
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
    } else { 
        $errores .='<li> Los datos son incorrectos</li>';

    }


}


require 'views/login.view.php';
?>