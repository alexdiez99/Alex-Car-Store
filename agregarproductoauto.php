<?php
    //Verifico si se ha enviado el formulario.
    if (isset($_POST['agregar'])){
        //Obtengo los datos del formulario.
        $nombre=$_POST['nombre'];
        $descripcion=$_POST['descripcion'];
        $stock=$_POST['stock'];
        $precio=$_POST['precio'];
        $fechacreacion=$_POST['fecha_creacion'];
        $fechamodificacion=$_POST['fecha_modificacion'];

        //Incluyo el archivo de conexión a la base de datos.
        include "conexionbbdd/conexionbbdd.php";

        //Creo una variable para la consulta de insertar datos en la tabla productos de mi bases de datos.
        $consulta = "insert into productos (nombre, descripcion, stock, precio, fecha_creacion, fecha_modificacion) values ('$nombre', '$descripcion', '$stock', '$precio', '$fechacreacion', '$fechamodificacion')";

        //Ejecuto la consulta antrerior.
        $resultado = mysqli_query($conn, $consulta); 

        //Verifico el resultado de la consulta.
        if($resultado){
            echo "<script language='JavaScript'>alert('Los datos fueron ingresados correctamente a la base de datos'); location.assign('productosadmin.php'); </script>";
        } else {
            echo "<script language='JavaScript'>alert('ERROR: Los datos no fueron ingresados correctamente a la base de datos'); location.assign('agregarproductoadmin.php'); </script>";
        }

        //Cierro la conexión a la base de datos.
        mysqli_close($conn);
    }
?>