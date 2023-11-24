<?php
    include "header.php";
    include "conexionbbdd/conexionbbdd.php";
?>
<?php
    echo "<h2>Mi carrito de la compra</h2>";
    /*session_start();

    if(isset($_SESSION['carrito'])){
        $carritomio = $_SESSION['carrito'];
        if(isset($_POST['imagen'])){
            $nombre = $_POST{'imagen'};
            $nombre = $_POST{'nombre'};
            $nombre = $_POST{'descripcion'};
            $nombre = $_POST{'precio'};
        }
    } else {
        $nombre = $_POST{'imagen'};
        $nombre = $_POST{'nombre'};
        $nombre = $_POST{'descripcion'};
        $nombre = $_POST{'precio'};
        $carritomio[] = array("imagen"=>$imagen, "nombre"=>$nombre, "descripcion"=>$descripcion, "precio"=>$precio);
    }

    $_SESSION['carrito'] = $carritomio;

    header("Location: ".$_SERVER['HTTP_REFERER']."");*/
?>
<?php
    include "footer.php";
?>