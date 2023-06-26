<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="descripcion-pagina">Completa el formulario</p>

<?php 

    include_once __DIR__ . '/../templates/alertas.php';

?>

<form action="/crear-cuenta" class="formulario" method="POST">
    <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" placeholder="Nombre" id="nombre" name="nombre" value="<?php echo $usuario->nombre; ?>">
    </div>

    <div class="campo">
        <label for="apellido">Apellido</label>
        <input type="text" placeholder="apellido" id="apellido" name="apellido" value="<?php echo $usuario->apellido; ?>">

    </div>

    <div class="campo">
        <label for="telefono">Telefono</label>
        <input type="tel" placeholder="telefono" id="telefono" name="telefono" value="<?php echo $usuario->telefono; ?>">
    </div>

    <div class="campo">
        <label for="email">Email</label>
        <input type="email" placeholder="email" id="email" name="email" value="<?php echo $usuario->email; ?>">
    </div>

    <div class="campo">
        <label for="password">Contraseña</label>
        <input type="password" placeholder="Contraseña" id="password" name="password">
    </div>

    <div class="campo">
        <label for="password1">Repetir Contraseña</label>
        <input type="password1" placeholder="Contraseña" id="password1" name="password1">
    </div>

    <input type="submit" value="crear-cuenta" class="boton">

</form>

<div class="acciones">
    <a href="/">Inicia Sesion</a>
    <a href="/olvide">Recuperar Contraseña</a>
</div>