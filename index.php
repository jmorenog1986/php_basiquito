<!doctype html>
<html>

<head>
    <title>Immortus 2.0</title>
    <meta charset="utf-8">
</head>
<!-- comentario -->
<body>
    <form method="post" action="guardar.php">
        <label for="documento">Documento:</label>
        <input type="number" name="documento" id="documento">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <label for="clave">Contraseña:</label>
        <input type="password" name="clave" id="clave">
        <button type="submit" name="accion" value="Guardar">Guardar</button>
        <button type="submit" name="accion" value="Actualizar">Actualizar</button>
        <button type="submit" name="accion" value="Consultar">Consultar</button>
    </form>


</body>

</html>