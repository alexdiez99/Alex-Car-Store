<?php
    include "header.php";
    include "conexionbbdd/conexionbbdd.php";
?>
<div class="agregarproducto">
    <form action="agregarproductoauto.php" method="post" class="formagregar">
        <div class="row">
            <div class="col-25">
                <label>Nombre:</label>
            </div>
            <div class="col-75">
                <input type="text" name="nombre">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Descripción:</label>
            </div>
            <div class="col-75">
                <textarea name="descripcion" id="" style="height:200px"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Stock:</label>
            </div>
            <div class="col-75">
                <input type="text" name="stock">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Precio:</label>
            </div>
            <div class="col-75">
                <input type="text" name="precio">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Fecha creación:</label>
            </div>
            <div class="col-75">
                <input type="date" name="fecha_creacion">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Fecha modificación:</label>
            </div>
            <div class="col-75">
                <input type="date" name="fecha_modificacion">
            </div>
        </div>
        <br>
        <div class="row">
        <input type="submit" value="Agregar" name="agregar" name="enviar">
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
    include "footer.php";
?>