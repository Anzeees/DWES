<!-- Martínez_Ángel_EjercicioPT2_5 -->
<?php
function mostrarInfoLibro($titulo,$autor="Desconocido"){
    if($autor == 'Desconocido'){
        echo 'El libro '.$titulo.' fue escrito por una autor desconocido.';
    } else {
        echo 'El libro '.$titulo.' fue escrito por '.$autor.'.';
    }
}

$autor = 'Angel';
$libro = 'Libro1';
mostrarInfoLibro($libro,$autor);
echo '<br>';
mostrarInfoLibro($libro);
?>