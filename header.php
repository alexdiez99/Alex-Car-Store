<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alex Car Store</title>
    <link rel="icon" type="image/x-icon" href="./imagenes/logo2.png">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="./css/zonausuario.css">
    <link rel="stylesheet" href="./css/zonaadministracion.css">
</head>
<body style="margin: 0; padding: 0;">
    <header>
        <div class="header-content">
            <a href="principal.php"><img src="./imagenes/logo2.png" class="img_header"></a>
            <form class="search-bar" method="GET" action="busqueda.php">
                <input type="text" placeholder="Buscar en la página" name="busqueda">
                <input type="submit" value="Buscar" class="button" name="enviar">
            </form>
            <div class="cart-icon">
                <a href="agregarcarrito.php"><img src="./imagenes/carrito2.png"></a>
            </div>
        </div>
    </header>