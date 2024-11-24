<?php
echo '<h1>Hola '.$_GET["nombre"].'</h1>';
if (($_GET["cp"]>=10001)&&($_GET["cp"]<=10005)){
    echo 'Resides en Cáceres';
} else {
    echo 'No resides en Cáceres';
}
?>