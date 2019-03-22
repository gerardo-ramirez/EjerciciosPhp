<?php session_start(); //siempre desde el inicion y las paginas que trabajamos con sesiones. 

//sesion con el valor de usuario iniciada.
if(isset($_SESSION['usuario'])){ //['usuario'] es el name en el formulario.
    
    header('Location: index.php');

}

//recibir los datos del form_
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario= filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
    $password= $_POST['password'] ;
    $password2=$_POST['password2'];



 //VALIDAMOS CONTRASEÑAS Y CREAMOS ERRORES:
   
    /*Aqui guardaremos los posibles errores que tengamos
    y si no los hay entonces estara todo corecto.*/ 
    $errores = "";
    if( empty($usuario) or empty($password) or empty($password2)){
        $errores .= "<li> Por favor rellena todos los datos correctamente </li>";
    }else{

        try {
            $conexion = new PDO('mysql:host=127.0.0.1;dbname=registro_usuarios','root','');
        
        } catch (PDOExeption $e) {
            echo "ERROR: " . $e->getMessage();
            //si hay un error matamos la ejecucion de la pagina
            //die();
        
        };
        $statement= $conexion->prepare('SELECT * FROM registrados WHERE nombre = :usuario LIMIT 1');
        $statement->execute(array(':usuario'=> $usuario));
        $resultado = $statement->fetch();
        if($resultado != false){
            $errores .= "<li>El nombre ingresado ya existe.</li>";
        }
        //Hasheamos nuestra contraseña para protegerla :
        $password = hash('sha512', $password);
        // hash es un metodo  hay otros ademas de 512 luego colocamos su password,
        $password2 = hash('sha512', $password2);

        //echo "$usuario .pass: $password . pass2: $password2";
        if($password != $password2){
            $errores .="<li> Las contraseñas no coinciden</li>";
        }



    
}
//SI NO HAY ERRORES AGREGAMOS USUARIO:

if(empty($errores)){
    $statement= $conexion->prepare("INSERT INTO registrados (id,nombre,pass) values(NULL,:usuario,:password)");
        $statement->execute(array(':usuario'=> $usuario, ':password'=> $password));
//Y ENVIAMOS A LOGIN:
    header('Location: login.php');
    }
} // =>Todo encerrado dentro de del condicional if($_SERVER['REQUEST_METHOD'] == 'POST')



//CASO CONTRARIO REGISTRESE:
require 'views/registrate.view.php';


?>