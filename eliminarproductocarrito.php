<?php
    session_start();

    //Verifico si se ha enviado un formulario de eliminación
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar'])){
        //Obtengo el indice del producto a eliminar
        $indice = $_POST['indice'];

        //Elimino el producto del carrito
        if(isset($_SESSION['agregarcarrito'][$indice])){
            unset($_SESSION['agregarcarrito'][$indice]);

            //Reindexo el array para evitar indices vacios
            $_SESSION['agregarcarrito'] = array_values($_SESSION['agregarcarrito']);
        }
    }

    //Redirijo al usuario a la página del carrito
    header('Location: agregarcarrito.php');
    exit();
?>