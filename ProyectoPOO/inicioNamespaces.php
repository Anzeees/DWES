<?php
// Incluir las clases necesarias
require_once "VideoClub.php";
use \Dwes\ProyectoVideoclub\VideoClub;

// Crear una instancia del VideoClub
$videoClub = new VideoClub("Mi Videoclub");

// Agregar productos al videoclub
$videoClub->incluirCintaVideo("The Lion King", 12.99, 90);
$videoClub->incluirDvd("Avatar", 19.99, "Inglés, Español", "16:9");
$videoClub->incluirJuego("FIFA 2024", 49.99, "PlayStation 5", 1, 4);

// Registrar socios en el videoclub
$videoClub->incluirSocio("Juan Pérez", 3); // Máximo 3 alquileres
$videoClub->incluirSocio("Ana Gómez", 2);  // Máximo 2 alquileres

// Listar los productos disponibles en el videoclub
$videoClub->listarProductos();

// Listar los socios registrados en el videoclub
$videoClub->listarSocios();

// Realizar algunos alquileres
$videoClub->alquilarSocioProducto(0, 0); // Juan Pérez alquila "The Lion King"
$videoClub->alquilarSocioProducto(1, 1); // Ana Gómez alquila "Avatar"
$videoClub->alquilarSocioProducto(0, 1); // Juan Pérez alquila "Avatar" (Debería ser aceptado)

// Mostrar productos y socios después de los alquileres
$videoClub->listarProductos();
$videoClub->listarSocios();

// Realizar una devolución
$videoClub->socios[0]->devolver(1); // Juan Pérez devuelve "Avatar"

// Mostrar productos y socios después de la devolución
$videoClub->listarProductos();
$videoClub->listarSocios();

// Realizar un intento de alquiler de un producto no disponible
$videoClub->alquilarSocioProducto(1, 0); // Ana Gómez intenta alquilar "The Lion King" que ya está alquilado
?>

