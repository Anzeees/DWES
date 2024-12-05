<?php
include_once "Dwes\ProyectoVideoclub\VideoClub.php";

use Dwes\ProyectoVideoclub\VideoClub;

$videoclub = new VideoClub("VideoClub PHP");

$videoclub->incluirCintaVideo("Cinta Clásica", 10.0, 90);
$videoclub->incluirDvd("Pelicula Dvd", 15.0, "es,en", "16:9");
$videoclub->incluirJuego("Red Dead Redemption II", 50.0, "PS4", 1, 4);

$videoclub->incluirSocio("Angel Martinez", 2);
$videoclub->incluirSocio("Alejando Guerra", 5);

$videoclub->listarProductos();
$videoclub->listarSocios();

$videoclub->alquilarSocioProducto(0, 0)->alquilarSocioProducto(0, 1)->alquilarSocioProducto(0, 1)->alquilarSocioProducto(1, 2);
$videoclub->listarSocios();

$videoclub->getSocios(0)->devolver(1);
$videoclub->getSocios(0)->devolver(5);

$videoclub->listarSocios();
?>
