<!-- Martínez_Ángel_EjercicioPT2_1 -->
<?php
// Definición array multidimensional
$calificaciones = array(
    'Angel'=> array(5,3,9),
    'Alejandro'=>array(7,5,2),
    'Mario'=>array(7,5,8)
);
//Recorrer primer array
foreach($calificaciones as $estudiante=>$notas){
    echo $estudiante.':';
    $promedio=0;
    //Recorrer segundo array
    foreach($notas as $asignatura){
        $promedio = $promedio+$asignatura;
        echo $asignatura.' ,';
    }
    echo '| Promedio: '.($promedio/3).'<br>';
}
?>