<h1 class="nombre-pagina">Recuperar cuenta</h1>
<p class="descripcion-pagina">Ten enviaremos un email con las instrucciones</p>

<?php
    include_once __DIR__ . '/../templates/alertas.php';
?>

<form action="/olvide" class="formulario" method="POST">
    <div class="campo">
        <label for="email">Email:</label>
        <input type="email" placeholder="Email" id="email" name="email">
    </div>

    <input type="submit" class="boton" value="Enviar Instrucciones">
</form>

<div class="acciones">
    <a href="/">Inicia Sesion</a>
    <a href="/crear-cuenta">Crear Cuenta</a>
</div>