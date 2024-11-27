<?php
declare(strict_types=1);
class Empleado {
    private string $nombre;
    private string $apellidos;
    private float $sueldo;
    private array $telefonos = [];

    public function __construct(string $nombre, string $apellidos, float $sueldo=1000){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->sueldo = $sueldo;
    }

    public function getSueldo(){
        return $this->sueldo;
    }

    public function setSueldo(float $sueldo){
        $this->sueldo = $sueldo;
    }

    public function obtenerNombreCompleto():string{
        $nombreCompleto = $this->nombre.' '.$this->apellidos;
        return $nombreCompleto;
    }

    public function debePagarImpuestos():bool{
        if($this->sueldo > 3000){
            return true;
        } else {
            return false;
        }
    }

    public function agregarTelefono(int $telefono):void {
        array_push($this->telefonos,$telefono);
    }

    public function obtenerTelefonos():string{
        $cadenaTelefonos='';
        for ($i=0;$i< count($this->telefonos);$i++){
            $cadenaTelefonos .= ' '.$this->telefonos[$i];
        }
        return $cadenaTelefonos;
    }

    public function eliminarTelefonos():void{
        $this->telefonos = [];
    }
}

//Creamos empleado e imprimimos Nombre Completo
$empleado1 = new Empleado("Juan", "Pérez", 3500);
echo 'Nombre completo: ' . $empleado1->obtenerNombreCompleto() .'<br>';

//Creamos empleado y comprobamos si tiene que pagar impuestos
$empleado2 = new Empleado("Ana", "Gómez", 3500);
if ($empleado2->debePagarImpuestos()) {
    echo $empleado2->obtenerNombreCompleto() . ' debe pagar impuestos.<br>';
} else {
    echo $empleado2->obtenerNombreCompleto() . ' no debe pagar impuestos.<br>';
}

//Creamos empleado y comprobamos agragar telefonos y obtener telefonos
$empleado3 = new Empleado("Carlos", "Martínez", 2000);
$empleado3->agregarTelefono(123456789);
echo 'Telefonos de ' . $empleado3->obtenerNombreCompleto() . ': ' . $empleado3->obtenerTelefonos() . '<br>';
$empleado3->agregarTelefono(987654321);
echo 'Telefonos de ' . $empleado3->obtenerNombreCompleto() . ': ' . $empleado3->obtenerTelefonos() . '<br>';

// Eliminamos los telefonos del empleado
$empleado3->eliminarTelefonos();
echo 'Telefonos de ' . $empleado3->obtenerNombreCompleto() . ': ' . $empleado3->obtenerTelefonos() . '<br>';
?>