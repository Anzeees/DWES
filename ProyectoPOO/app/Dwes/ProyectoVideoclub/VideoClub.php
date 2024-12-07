<?php
// Definimos Namespace
namespace app\Dwes\ProyectoVideoclub;

// Definición clase VideoClub
class VideoClub {
    // ATRIBUTOS
    private string $nombre;
    private $productos = [];
    private int $numProductos;
    private $socios = [];
    private $numSocios;
    private int $numProductosAlquilados=0;
    private int $numTotalAlquileres=0;

    // CONSTRUCTOR
    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    // GETTERS Y SETTERS
    public function getSocios($num) {
        return $this->socios[$num];
    }

    public function getNumProductosAlquilados(){
        return $this->numProductosAlquilados;
    }

    public function getNumTotalAlquileres(){
        return $this->numTotalAlquileres;
    }

    /**
     * Función incluirProducto
     * Añade el Soporte a un Array de almacenaje
     */
    private function incluirProducto(Soporte $s) {
        array_push($this->productos,$s);
        $this->numProductos = count($this->productos);
    }

    /**
     * Funciones incluirCintaVideo, incluirDvd, incluirJuego
     * Crea el nuevo Objeto y Llama a la Función incluiProducto
     */
    public function incluirCintaVideo($titulo,$precio,$duracion) {
        $cintaVideo = new CintaVideo($titulo,count($this->productos),$precio,$duracion);
        $this->incluirProducto($cintaVideo);
    }

    public function incluirDvd($titulo,$precio,$idiomas,$pantalla) {
        $Dvd = new Dvd($titulo,count($this->productos),$precio,$idiomas,$pantalla);
        $this->incluirProducto($Dvd);
    }

    public function incluirJuego($titulo,$precio,$consola,$minJ,$maxJ) {
        $Juego = new Juego($titulo,count($this->productos),$precio,$consola,$minJ,$maxJ);
        $this->incluirProducto($Juego);
    }

    /**
     * Función incluirSocio
     * Crea un nuevo Objeto:Cliente y lo añade al array de almacenaje de Socios
     */
    public function incluirSocio($nombre,$maxAlquileresConcurrentes=3) {
        $Socio = new Cliente($nombre,count($this->socios),$maxAlquileresConcurrentes);
        array_push($this->socios,$Socio);
        $this->numSocios = count($this->socios);
    }

    // Función Lista de Productos
    public function listarProductos() {
        foreach ($this->productos as $id => $producto) {
            echo "<hr><h5>Producto ".$id.":</h5>";
            $producto->muestraResumen();
        }
    }

    // Función Lista de Socios
    public function listarSocios() {
        foreach ($this->socios as $id => $socio) {
            echo "<hr><h5>Socio ".$id.":</h5>";
            $socio->muestraResumen();
        }
    }

    /**
     * Función alquilarSocioProducto
     *  - Busca el Socio dentro del array socios
     *  - Buesca el Soporte dentro del array productos
     *  - Si encuentra ambas cosas ejecuta la función alquilar
     */
    public function alquilarSocioProducto($numeroCliente, $numeroSoporte) {
        try {
            $existesocio=false;
            $existeproducto=false;
            foreach($this->socios as $socio) {
                if ($socio->getNumero() == $numeroCliente) {
                    $existesocio = true;
                    foreach($this->productos as $producto) {
                        if ($producto->getNumero() == $numeroSoporte) {
                            $existeproducto=true;
                            $socio->alquilar($producto);
                            $this->numProductosAlquilados++;
                            $this->numTotalAlquileres++;
                        }
                    }
                }
            }
            // Indica los posibles errores de la función
            if (!$existesocio) {
                throw new ClienteNoEncontradoException($numeroCliente);
            }
            if (!$existeproducto) {
                throw new SoporteNoEncontradoException($numeroSoporte);
            }
        } catch (VideoclubException $e) {
            echo $e->getError();
        } 
        finally {
            return $this;
        }
    }

    public function alquilarSocioProductos(int $numSocio, array $numerosProductos){
        $disponibles=true;
        foreach ($numerosProductos as $p) {
            if ($this->existeProducto($p,$this->productos)){
                foreach ($this->productos as $soporte) {
                    if(($soporte->getNumero()==$p)&&($soporte->alquilado)){
                        $disponibles=false;
                    }
                }
            } else {
                $disponibles=false;
            }
        }
        if ($disponibles){
            foreach ($numerosProductos as $producto) {
                $this->alquilarSocioProducto($numSocio,$producto);
            }
        } else {
            echo "Alquiler cancelado, alguno de los productos no está disponible";
        }
        return $this;
    }

    public function devolverSocioProducto($numeroCliente, $numeroSoporte) {
        try {
            $existesocio=false;
            $existeproducto=false;
            foreach($this->socios as $socio) {
                if ($socio->getNumero() == $numeroCliente) {
                    $existesocio = true;
                    foreach($this->productos as $producto) {
                        if ($producto->getNumero() == $numeroSoporte) {
                            $existeproducto=true;
                            $this->numProductosAlquilados+=1;
                            $producto->alquilado=false;
                            $socio->devolver($producto->getNumero());
                        }
                    }
                }
            }
            // Indica los posibles errores de la función
            if (!$existesocio) {
                throw new ClienteNoEncontradoException($numeroCliente);
            }
            if (!$existeproducto) {
                throw new SoporteNoEncontradoException($numeroSoporte);
            }
        } catch (VideoclubException $e) {
            echo $e->getError();
        } 
        finally {
            return $this;
        }
    }

    public function devolverSocioProductos(int $numSocio, array $numerosProductos){
        $alquilados=true;
        foreach($this->socios as $socio){
            if ($numSocio == $socio->getNumero()){
                foreach ($numerosProductos as $p) {
                    if(!$this->existeProducto($p,$socio->getSoportesAlquilados())){
                        $alquilados=false;
                    }
                }
            }
        }
        if($alquilados){
            foreach ($numerosProductos as $p) {
                $this->devolverSocioProducto($numSocio,$p);
            }
        } else {
            echo "<br>Devolución cancelada alguno de los producto no lo tiene alquilado";
        }
        return $this;
    }

    public function existeProducto($numeroProducto,$soportes):bool{
        foreach ($soportes as $producto){
            if ($producto->getNumero()==$numeroProducto){
                return true;
            }
        }
        return false;
    }

    public function imprimirProductosAlquilados(){
        foreach ($this->productos as $producto){
            if ($producto->alquilado){
                echo "<p style='color:red;'>".$producto->getNumero();
            }
        }
    }
}
?>