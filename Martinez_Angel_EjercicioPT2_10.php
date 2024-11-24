<!-- Martínez_Ángel_EjercicioPT2_10 -->
<?php
$pedido = array();
function agregarProducto($producto){
    global $pedido;
    //Añadir un elemento del array
    array_push($pedido, $producto);
    echo 'Producto agregado:'.$producto;
}

function eliminarProducto($producto){
    global $pedido;
    $bandera = false;
    for ($i=0;$i<count($pedido);$i++){
        if ($pedido[$i]==$producto){
            //Eliminar un elemento array
            unset($pedido[$i]);
            echo 'Producto eliminado: '.$producto;
        } else {
            echo 'Producto no encontrado';
        }
    }
}

function verificarEstado(){
    global $pedido;
    //Esta vacio el array
    if (empty($pedido)){
        echo 'Tu cesta de compra esta vacía';
    } else {
        echo 'Tu cesta tiene '.count($pedido).' productos';
    }
}

function contarProductos(){
    global $pedido;
    echo 'El número de productos del pedido es: '.count($pedido);
}
//Este for solo sirve para que realice todas las acciones
for($accion=1;$accion<=4;$accion++){
switch ($accion) {
    case 1:
        $operacion = 'agregarProducto';
        break;
    case 2:
        $operacion = 'eliminarProducto';
        break;
    case 3:
        $operacion = 'verificarEstado';
        break;
    case 4:
        $operacion = 'contarProductos';
        break;
    
    default:
        echo 'Accion no encontrada';
        break;
}
$producto='Prueba';
if($accion>2){
    echo '<br>La operacion <strong>'.$operacion.'</strong> da como resultado:<br>';
    $operacion();
} else {
    echo '<br>La operacion <strong>'.$operacion.'</strong> da como resultado:<br>';
    $operacion($producto);
}
}
?>