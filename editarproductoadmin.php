<?php
    //Incluyo el archivo header y el de conexión a la base de datos.
    include "header.php";
    include "conexionbbdd/conexionbbdd.php";

    //Verifico si se ha proporcionado un ID a través de GET.
    if (isset($_GET['id'])) {
        $productoid = $_GET['id'];

        //Verifico si se ha enviado el formulario de edición a través de POST.
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            //Obtengo los datos del formulario.
            $nombre_nuevo = $_POST['nombre'];
            $descripcion_nuevo = $_POST['descripcion'];
            $stock_nuevo = $_POST['stock'];
            $precio_nuevo = $_POST['precio'];
            $fechacreacion_nuevo = $_POST['fecha_creacion'];
            $fechamodificacion_nuevo = $_POST['fecha_modificacion'];

            //Preparo y ejecuto la consulta para actualizar los datos del producto.
            $actulizardatos = "update productos set nombre = '$nombre_nuevo', descripcion = '$descripcion_nuevo', stock = '$stock_nuevo', precio = '$precio_nuevo', fecha_creacion = '$fechacreacion_nuevo', fecha_modificacion = '$fechamodificacion_nuevo' where id = $productoid";
           
            if($resultado = $conn->query($actulizardatos)){
                echo "<script language='JavaScript'>alert('Los datos han sido actualizados correctamente'); location.assign('productosadmin.php'); </script>";
            } else {
                echo "<script language='JavaScript'>alert('ERROR al actualizar los datos'); location.assign('productosadmin.php'); </script>";
            }
        }

        //Consulto la información del producto con el ID proporcionado.
        $consulta = "select * from productos where id = $productoid";
        $resultado = mysqli_query($conn,$consulta);

        //Verifico si se encontro el producto.
        if ($resultado->num_rows == 1) {
            $producto = $resultado->fetch_assoc();
?>
<div class="agregarproducto">
    <form method="post" class="formagregar">
        <div class="row">
            <div class="col-25">
                <label>Nombre:</label>
            </div>
            <div class="col-75">
                <input type="text" name="nombre" value="<?php echo $producto['nombre'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Descripción:</label>
            </div>
            <div class="col-75">
                <textarea name="descripcion" id="" style="height:200px" value="<?php echo $producto['descripcion'];?>"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Stock:</label>
            </div>
            <div class="col-75">
                <input type="text" name="stock" value="<?php echo $producto['stock'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Precio:</label>
            </div>
            <div class="col-75">
                <input type="text" name="precio" value="<?php echo $producto['precio'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Fecha creación:</label>
            </div>
            <div class="col-75">
                <input type="date" name="fecha_creacion" value="<?php echo $fechacreacion_nuevo['fecha_creacion'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Fecha modificación:</label>
            </div>
            <div class="col-75">
                <input type="date" name="fecha_modificacion" value="<?php echo $fechamodificacion_nuevo['fecha_modificacion'];?>">
            </div>
        </div>
        <br>
        <div class="row">
        <input type="submit" value="Guardar cambios" name="editarproducto" name="enviar">
        <a href="productosadmin.php" class="regresar">Regresar</a>
        </div>
    </form>
</div>
<style>
    /*https://www.w3schools.com/css/tryit.asp?filename=trycss_form_responsive*/
    input[type=text], textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=date] {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #19171A;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

.agregarproducto {
  border-radius: 5px;
  background-color: #ccc;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 73%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row::after {
  content: "";
  display: table;
  clear: both;
}
.regresar {
    background-color: #19171A;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: left;
}
</style>
<?php
        } else {
            echo "<script language='JavaScript'>alert('No se encontró el producto'); location.assign('productosadmin.php'); </script>";
        }
    } else {
        echo "<script language='JavaScript'>alert('ID de producto no válido'); location.assign('productosadmin.php'); </script>";
    }

    include "footer.php";
?>