<?php
$mostrarPokemon = false;
$pokemonDetalles = null;
require_once("funciones.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="static/css/styles.css">
    <link rel="icon" type="image/svg+xml" href="img/icon/PokeBall_icon.svg">
    <title>Pokedex - Grupo 12</title>
</head>

<body>
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a class="navbar-brand" href="/pokedex/index.php">
            <img src="img/banner.png" alt="Logo" width="300" height="100" class="d-inline-block align-text-top">
        </a>
        <h1 class="mx-auto">Pokedex</h1>
        <div class="d-flex align-items-center">
            <?php
            session_start();
            if (isset($_SESSION["logueado"])) {
                echo "<h2 class='d-flex align-items-center me-3'><i class='bi bi-person-circle' style='font-size: 3rem;'></i><span class='ms-2'>" . $_SESSION['usuario'] . "</span></h2>";
                echo "<a class='btn btn-secondary d-flex align-items-center' href='logout.php'>
                      <i class='bi bi-box-arrow-right align-middle' style='font-size: 1.5rem; margin-right: 8px;'></i>Cerrar Sesión</a>";
            } else {
                echo '
                <form class="d-flex" action="validarUsuario.php" method="POST" enctype="application/x-www-form-urlencoded">
                    <input class="form-control me-2" type="text" placeholder="Usuario" name="usuario" required>
                    <input class="form-control me-2" type="password" placeholder="Clave" name="clave" required>
                    <button class="btn btn-outline-success" type="submit" name="buscarPokemon">Ingresar</button>
                </form>';
            }
            if (isset($_SESSION['error'])) {
                mostrarAlerta('danger', $_SESSION['error']);
                unset($_SESSION['error']);
            }
            ?>
        </div>
    </div>
</nav>

<?php if (!$mostrarPokemon): ?>
    <?php include_once("tabla.php");?>
<?php else: ?>
    <?php include_once("detalle.php");?>
<?php endif; ?>

<?php
$tipos = obtenerTipos();
?>

<div class="modal fade" id="modalModificar" tabindex="-1" aria-labelledby="modalModificarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalModificarLabel">Modificar Pokémon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <input type="hidden" id="pokemonModificarId" name="pokemonModificarId" value="">
                    <div class="mb-3">
                        <label for="numero" class="form-label">Numero</label>
                        <input type="number" class="form-control" id="numeroModificar" name="numero" min="1">
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombreModificar" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="tipo1" class="form-label">Tipo 1</label>
                        <select class="form-select" id="tipo1Modificar" name="tipo1">
                            <?php foreach ($tipos as $tipo): ?>
                                <option value="<?= htmlspecialchars($tipo['tipo']) ?>"><?= htmlspecialchars($tipo['tipo']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tipo2" class="form-label">Tipo 2</label>
                        <select class="form-select" id="tipo2Modificar" name="tipo2">
                            <option value="">Ninguno</option>
                            <?php foreach ($tipos as $tipo): ?>
                                <option value="<?= htmlspecialchars($tipo['tipo']) ?>"><?= htmlspecialchars($tipo['tipo']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" class="form-control" id="imagenModificar" name="imagen">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea class="form-control" id="descripcionModificar" aria-label="With textarea"
                                  name="descripcion"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="modificar_pokemon">Guardar cambios</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalBorrar" tabindex="-1" aria-labelledby="modalBorrarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBorrarLabel">Confirmar eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Está seguro que desea eliminar a <span id="nombrePokemonBorrar"></span>?
            </div>
            <div class="modal-footer">
                <form method="POST" action="">
                    <input type="hidden" id="pokemonBorrarId" name="pokemonBorrarId" value="">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="borrar_pokemon">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="static/js/bootstrap.bundle.min.js"></script>
<script src="static/js/scripts.js"></script>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
</svg>
</body>

</html>