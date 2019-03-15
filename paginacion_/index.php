<?php
//conectamos a base de datos con try and cath PDO.
try {
    $conexion = new PDO('mysql:host=127.0.0.1;dbname=prueba_consola','root','');

} catch (PDOExeption $e) {
    echo "ERROR: " . $e->getMessage();
    //si hay un error matamos la ejecucion de la pagina
    die();

};
//trabajamos por fuera de la base:
//si la variable está seteada entonces tomo su valor entero. 

$pagina = isset($_GET['pagina'])? (int)$_GET['pagina'] : 1;

//establecemos post por pagina:
$postPorPagina= 3;

$inicio = ($pagina > 1) ? ($pagina * $postPorPagina - $postPorPagina) : 0;
                                        //traemos la cantidad de filas sql_calc_found_rows.
$articulos = $conexion->prepare("
SELECT SQL_CALC_FOUND_ROWS * FROM articulos
 LIMIT $inicio, $postPorPagina");
$articulos->execute();
//traemos todos
$articulos = $articulos->fetchAll();


//condicional para redirigir la pagina
if (!$articulos){
    header('Location:http://localhost/cursoPHP/paginacion/');
}
//Calculamos la cantidad de paginas a mostrar.
$totalArticulos = $conexion->query('SELECT FOUND_ROWS() as total');
$totalArticulos = $totalArticulos->fetch()['total'];
//ceiles una funcion que redondea hacia arriba;
$numeroPagina = ceil($totalArticulos/$postPorPagina);
echo($numeroPagina);

require 'index.view.php';// indexamos al index.
?>