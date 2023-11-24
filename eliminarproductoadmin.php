<?php
    //Obtengo el ID del producto a eliminar a través de GET.
    $id=$_GET['id'];

    //Incluyo el archivo de conexión a la base de datos.
    include "conexionbbdd/conexionbbdd.php";

    //Preparo la consulta para eliminar el producto con el ID proporcionado.
    $consulta = "delete from productos where id = '".$id."'";

    //Ejecuto la consulta.
    $resultado = mysqli_query($conn,$consulta);

    //Verifico el resultado de la consulta.
    if($resultado){
        echo "<script language='JavaScript'>alert('Los datos se eiliminaron correctamente de la base de datos'); location.assign('productosadmin.php'); </script>";
    } else {
        echo "<script language='JavaScript'>alert('ERROR: Los datos no se eiliminaron correctamente de la base de datos'); location.assign('productosadmin.php'); </script>";
    }
?>