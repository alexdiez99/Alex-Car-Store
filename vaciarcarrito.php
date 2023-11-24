<?php
    session_start();

    //Verificar si la sesión del carrito existe
    if(isset($_SESSION['agregarcarrito'])){
        //Verificar el array del carrito
        $_SESSION['agregarcarrito'] = array();

        //Redirigir al usuario de vuelta a la página del carrito
        header("Location: agregarcarrito.php");
        exit();
    }
?>