<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Paginacion</title>
</head>
<body>
    <div class="container">
    <h1>Articulos</h1>
    <section class="articulos">
    <ul>

        <!-- En foreach tomo cada articulo del array
        y traigo id y su producto-->
        <?php foreach ($articulos as $articulo) : ?>
         <li> <?php echo $articulo['id'] . '-' . $articulo['producto'] ?></li>

       <?php endforeach  ?>

    </ul>
    </section >
    <section class="paginacion">
    <ul>
    <!-- Boton retroceso -->
    <?php if ($pagina == $numeroPagina) : ?>
    <li class="disabled">  &raquo;</li>
<?php else: ?>
    <li><a href="?pagina=<?php echo $pagina - 1 ?>">&raquo;</a></li>
<?php endif; ?>

<?php
/* numero de pagina actual colocamos active*/ 
for ($i=1; $i <= $numeroPagina ; $i++) {
    if($pagina == $i){
        echo "<li class='active'> <a href='?pagina=$i'>$i</a></li>";
    }else{
     echo "<li> <a href='?pagina=$i'>$i</a></li>";

    }

} 
?>
<!-- Boton avance.
si l apagina, colocamos disabled.
-->
  <?php if ($pagina == 1) : ?>
    <li class="disabled">  &laquo;</li>
<?php else: ?>
    <li><a href="?pagina=<?php echo $pagina - 1 ?>">&laquo;</a></li>
<?php endif; ?>
<!--
    <li class="active"> <a href="#"> 1</a></li>
    <li> <a href="#"> 2</a></li>
    <li> <a href="#"> 3</a></li>
    <li> <a href="#"> 4</a></li>
    <li> <a href="#">&raquo;</a></li>-->



    </ul>
    
    </section>
    </div>
    
</body>
</html>