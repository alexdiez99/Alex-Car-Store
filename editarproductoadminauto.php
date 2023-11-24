<?php
    include "conexionbbdd/conexionbbdd.php";
?>
<?php
    if(isset($_POST['enviar'])){
        $id=$_GET['id'];

        $consulta = "select * from productos where id = '".$id."'";
        $resultado = mysqli_query($conn,$consulta);

        $fila = mysqli_fetch_assoc($resultado);
        $nombre=$fila['nombre'];
        $descripcion=$fila['descripcion'];
        $stock=$fila['stock'];
        $precio=$fila['precio'];
        $fechacreacion=$fila['fecha_creacion'];
        $fechamodificacion=$fila['fecha_modificacion'];
        } else {
        mysqli_close($conn);
    } 
    
?>