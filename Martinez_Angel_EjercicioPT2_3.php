<!-- Martínez_Ángel_EjercicioPT2_3 -->
<?php
// Definir función usando "&" para paso por referencia
function incrementarNumero(&$numero){
    $numero = $numero+1;
    return $numero;
}

$num=14;
// Antes de la función
echo 'Valor inicial: '.$num;
incrementarNumero($num);
// Después de la función
echo '<br>Valor tras incremento: '.$num;
?>