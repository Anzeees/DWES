<?php
// Definimos el namespace
namespace Dwes\ProyectoVideoclub;
// Incluimos todas las clases del Proyecto
include_once "Soporte.php";
include_once "Juego.php";
include_once "CintaVideo.php";
include_once "Dvd.php";
include_once "Cliente.php";

// Clase VideoClub
class VideoClub {
    // Atributos
    private string $nombre;
    private $productos = [];
    private int $numProductos;
    private $socios = [];
    private $numSocios;

    // Constructor
    public function __construct($nombre){
        $this->nombre = $nombre;
    }

    // Getters y Setters
    public function getSocios(int $nsocio):Cliente{
        return $this->socios[$nsocio];
    }

    // Función Privada incluirProducto(Argumento: Objeto Socio)
    private function incluirProducto(Soporte $s){
        array_push($this->productos,$s); // Añadimos Objeto a array
        $this->numProductos = count($this->productos);
    }

    // Función Incluir Cinta Video
    public function incluirCintaVideo($titulo,$precio,$duracion){
        $cintaVideo = new CintaVideo($titulo,count($this->productos),$precio,$duracion);
        $this->incluirProducto($cintaVideo);
    }

    // Función Incluir Dvd
    public function incluirDvd($titulo,$precio,$idiomas,$pantalla){
        $Dvd = new Dvd($titulo,count($this->productos),$precio,$idiomas,$pantalla);
        $this->incluirProducto($Dvd);
    }

    // Función Incluir Juego
    public function incluirJuego($titulo,$precio,$consola,$minJ,$maxJ){
        $Juego = new Juego($titulo,count($this->productos),$precio,$consola,$minJ,$maxJ);
        $this->incluirProducto($Juego);
    }

    // Función Incluir Socio
    public function incluirSocio($nombre,$maxAlquileresConcurrentes=3){
        // Creamos un Cliente
        $Socio = new Cliente($nombre,count($this->socios),$maxAlquileresConcurrentes);
        array_push($this->socios,$Socio); // Añadimos nuevo Cliente al array
        $this->numSocios = count($this->socios);
    }

    // Función Lista Soportes
    public function listarProductos(){
        foreach ($this->productos as $id => $producto){
            echo "<hr><h5>Producto ".$id.":<h5>";
            $producto->muestraResumen();
        }
    }

    // Función Lista Socios
    public function listarSocios(){
        foreach ($this->socios as $id => $socio){
            echo "<hr><h5>Socio ".$id.":<h5>";
            $socio->muestraResumen();
        }
    }

    // Función Cliente alquila un Soporte
    public function alquilarSocioProducto($numeroCliente, $numeroSoporte){
        $existesocio=false;
        $existeproducto=false;
        // Recorremos array con los Socios del VideoClub
        foreach($this->socios as $socio){
            if ($socio->getNumero() == $numeroCliente){
                $existesocio = true;
                // Recorremos array con los productos del socio
                foreach($this->productos as $producto){
                    if ($producto->getNumero() == $numeroSoporte){
                        $existeproducto=true;
                        $socio->alquilar($producto);
                    }
                }
            }
        }
        if (!$existesocio){
            echo "El Socio con el número ".$numeroCliente." no está registrado";
        }
        if (!$existeproducto){
            echo "El Soporte con el número ".$numeroSoporte." no está en tienda";
        }
        return $this;
    }
}
?>