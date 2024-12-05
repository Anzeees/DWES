<?php
// Incluimos el Autoload para cargar todo el contenido
include_once "..\autoload.php";

use app\Dwes\ProyectoVideoclub\VideoClub;

// Creamos El VideoClub
echo "<h4>Creando VideoClub...</h4>";
$videoclub = new VideoClub("VideoClub PHP");

// Incluimos Soportes al VideoClub
echo "<h4>Añadiendo Soportes...</h4>";
$videoclub->incluirCintaVideo("Cinta Clásica", 10.0, 90);
$videoclub->incluirDvd("Pelicula Dvd", 15.0, "es,en", "16:9");
$videoclub->incluirJuego("Red Dead Redemption II", 50.0, "PS4", 1, 4);

// Incluimos Clientes al VideoClub
echo "<h4>Añadiendo Clientes...</h4>";
$videoclub->incluirSocio("Angel Martinez", 2);
$videoclub->incluirSocio("Alejando Guerra", 5);

// Listamos Productos y Socios del VideoClub
echo "<h2>Listado Productos</h2>";
$videoclub->listarProductos();
echo "<h2>Listado Clientes</h2>";
$videoclub->listarSocios();

// Gestionamos alquiler de Productos y Socios
echo "<h4>Aplicamos Alquileres...</h4>";
$videoclub->alquilarSocioProducto(0, 0)->alquilarSocioProducto(0, 1)->alquilarSocioProducto(0, 1)->alquilarSocioProducto(1, 2);
$videoclub->listarSocios();

// Devolvemos Productos
echo "<h4>Aplicamos Devoluciones...</h4>";
$videoclub->getSocios(0)->devolver(1);
$videoclub->getSocios(0)->devolver(5);

echo "<h2>Listado Clientes</h2>";
$videoclub->listarSocios();
?>
