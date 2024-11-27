<?php
declare(strict_types=1);
// Declaramos función indicando tipado de argumentos y return
function calcularAreaTriangulo(float $base,float $altura):float {
    $area = ($base*$altura)/2;
    return $area;
}
echo calcularAreaTriangulo(3,4).'<br>';
echo calcularAreaTriangulo(5.2,4.99).'<br>';
?>