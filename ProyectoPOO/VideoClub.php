<?php
include_once "Soporte.php";
include_once "Juego.php";
include_once "CintaVideo.php";
include_once "Dvd.php";
include_once "Cliente.php";
class VideoClub{
    private string $nombre;
    private $productos = [];
    private int $numProductos;
    private $socios = [];
    private $numSocios;

    public function __construct($nombre){
        $this->nombre = $nombre;
    }

    private function incluirProducto(Soporte $s){
        array_push($this->productos,$s);
        $this->numProductos = count($this->productos);
    }

    public function incluirCintaVideo($titulo,$precio,$duracion){
        $cintaVideo = new CintaVideo($titulo,count($this->productos),$precio,$duracion);
        $this->incluirProducto($cintaVideo);
    }

    public function incluirDvd($titulo,$precio,$idiomas,$pantalla){
        $Dvd = new Dvd($titulo,count($this->productos),$precio,$idiomas,$pantalla);
        $this->incluirProducto($Dvd);
    }

    public function incluirJuego($titulo,$precio,$consola,$minJ,$maxJ){
        $Juego = new Juego($titulo,count($this->productos),$precio,$consola,$minJ,$maxJ);
        $this->incluirProducto($Juego);
    }

    public function incluirSocio($nombre,$maxAlquileresConcurrentes=3){
        $Socio = new Cliente($nombre,count($this->socios),$maxAlquileresConcurrentes);
        array_push($this->socios,$Socio);
        $this->numSocios = count($this->socios);
    }

    public function listarProductos(){
        foreach ($this->productos as $id => $producto){
            echo "<hr><h5>Producto ".$id.":<h5>";
            $producto->muestraResumen();
        }
    }

    public function listarSocios(){
        foreach ($this->socios as $id => $socio){
            echo "<hr><h5>Socio ".$id.":<h5>";
            $socio->muestraResumen();
        }
    }

    public function alquilarSocioProducto($numeroCliente, $numeroSoporte){
        $existesocio=false;
        $existeproducto=false;
        foreach($this->socios as $socio){
            if ($socio->getNumero() == $numeroCliente){
                $existesocio = true;
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
    }
}
?>