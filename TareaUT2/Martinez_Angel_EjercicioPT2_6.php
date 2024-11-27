<!-- Martínez_Ángel_EjercicioPT2_6 -->
<?php
function restar($numero1,$numero2){
    $resta = $numero1-$numero2;
    return $resta;
}

function dividir($numero1,$numero2){
    if ($numero2!=0){
        $division = $numero1/$numero2;
        return $division;
    } else {
        echo 'No se pueden hacer divisiones entre 0';
    }
}

echo restar(10,3);
echo '<br>';
echo dividir(20,4);
echo '<br>';
echo dividir(restar(10,3),2);
?>