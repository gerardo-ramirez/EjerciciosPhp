<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
--><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Iniciar sesion</title>
</head>
<body>
<div class="contenedor">
<h1 class="titulo"> Iniciar sesion</h1>

<hr class="border"></hr>
<!-- Usamos  la variable super global de $_SERVER para volver
 a la misma pagina. y usamos specialchars para que no inyecten codigo-->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='POST' class="formulario" name="login" >
<div class="form-group">
<i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" class="usuario" placeholder="usuario">
</div>

<div class="form-group">
<i class="icono izquierda fa fa-lock"></i><input type="password" name="password" class="password_btn" placeholder="password"><i class="submit_btn fa fa-arrow-right" onclick="login.submit()"></i>
<!-- el login es el que usamos en el name del formulario y la funcion submit es la propia del form
lo que hacemos es activarla cuando se toque el icono  -->
</div>

<?php if(!empty($errores)) : ?>
<div class="errores">
<ul>
<?php echo $errores?>

</ul>
</div>
<?php endif ;?><!--Si usamos el if es necesario el endif-->

</form>
<p class="texto-registrate">
¿ Aún no tienes cuenta?
<a href="registrate.php">Registrate</a>
</p>


</div>
</body>
</html>