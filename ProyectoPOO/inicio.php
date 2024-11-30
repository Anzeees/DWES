<?php
include_once "Soporte.php";
include_once "CintaVideo.php";
include_once "Dvd.php";
include_once "Juego.php";

// PRUEBA DE CLASE SOPORTE
$soporte1 = new Soporte("Tenet",22,3);
echo "<strong>".$soporte1->titulo."</strong>";
echo "<br>Precio: ".$soporte1->getPrecio()." euros";
echo "<br>Precio IVA incluido: ".$soporte1->getPrecioConIVA()." euros<br>";

$soporte1->muestraResumen();
echo "<br><hr><br>";

// PRUEBA DE CLASE CINTA VIDEO
$miCinta = new CintaVideo("Los cazafantasmas",23,3.5,107);
echo "<strong>".$miCinta->titulo."</strong>";
echo "<br>Precio: ".$miCinta->getPrecio()." euros";
echo "<br>Precio IVA incluido: ".$miCinta->getPrecioConIva()." euros<br>";

$miCinta->muestraResumen();
echo "<br><hr><br>";

// PRUEBA DE CLASE DVD
$miDvd = new Dvd("Origen",24,15,"es,en,fr","16:9");
echo "<strong>".$miDvd->titulo."</strong>";
echo "<br>Precio: ".$miDvd->getPrecio()." euros";
echo "<br>Precio IVA incluido: ".$miDvd->getPrecioConIva()." euros";

$miDvd->muestraResumen();
echo "<br><hr><br>";

// PRUEBA DE CLASE JUEGO
$miJuego = new Juego("The Last of Us Part II",26,49.99,"PS4",1,1);
echo "<strong>".$miJuego->titulo."</strong>";
echo "<br>Precio: ".$miJuego->getPrecio()." euros";
echo "<br>Precio IVA incluido: ".$miJuego->getPrecioConIva()." euros";

$miJuego->muestraResumen();
echo "<br><hr><br>";
?>