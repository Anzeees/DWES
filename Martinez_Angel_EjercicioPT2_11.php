<!-- Martínez_Ángel_EjercicioPT2_11 -->
<?php
// Variables globales: puntuación y vidas
$puntuacion = 0;
$vidas = 3;
function agregarPuntos($puntos){
    global $puntuacion; 
    $puntuacion += $puntos;
    echo '<br>Puntos actuales del jugador: ' . $puntuacion; 
}
function restarPuntos($puntos){
    global $puntuacion;
    $puntuacion = ($puntuacion >= $puntos) ? $puntuacion - $puntos : 0; 
    echo '<br>Puntos actuales del jugador: ' . $puntuacion; 
}
function perderVida(){
    global $vidas;
    $vidas--;
    if ($vidas > 0){
        echo '<br>Vidas actuales del jugador: ' . $vidas;
    } else {
        echo '<br>GAME OVER';
    }
}

agregarPuntos(14);
restarPuntos(10);
restarPuntos(6);
perderVida();
perderVida();
perderVida();
?>