<h1 class="nombre-pagina">loguin</h1>
<p class="descripcion-pagina">Inicia sesion</p>

<?php
    include_once __DIR__ . '/../templates/alertas.php';
?>

<form action="/" class="formulario" method="POST">
    <div class="campo">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Email">
    </div>

    <div class="campo">
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" placeholder="Contraseña">
    </div>

    <input type="submit" value="Iniciar Sesion" class="boton">

</form>

<div class="acciones">
    <a href="/crear-cuenta">Crear Cuenta</a>
    <a href="/olvide">Recuperar Contraseña</a>
</div>