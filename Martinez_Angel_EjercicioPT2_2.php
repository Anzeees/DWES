<!-- Martínez_Ángel_EjercicioPT2_2 -->
<?php
// Definimos la Función con los parámetros de entrada
function calcularPotencia($numero1,$numero2){
    // Almacenamos el cuadrado de cada parámetro de entrada
    $cuadrado1=$numero1*$numero1;
    $cuadrado2=$numero2*$numero2;
    // Devolvemos los resultados
    return array($cuadrado1,$cuadrado2);
}

// Definimos los números
$numero1=3;
$numero2=4;
// Mostramos por pantalla antes de hacer la función
echo 'El primer número es: '.$numero1;
echo '<br>El segundo número es: '.$numero2;

// Almacenamos lo devuelto por la función en una variable
$resultados = calcularPotencia($numero1,$numero2);

// Mostramos por pantalla tanto el número como su cuadrado trás la función
echo '<br>El primer número es: '.$numero1.' y su cuadradro es: '.$resultados[0];
echo '<br>El primer número es: '.$numero2.' y su cuadradro es: '.$resultados[1];
?>