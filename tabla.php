<div class="flex-grow-1">
    <form class="form-inline d-flex my-2 my-lg-2" action="" method="POST">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
        <input class="form-control mr-sm-2" type="search" placeholder="Ingrese el nombre, tipo o numero de pokemon"
               aria-label="Buscar" name="query">
        <button class="btn btn-outline-success w-25 my-2 my-sm-0" type="submit" name="buscarPokemon">Quien es ese
            pokemon
            ?
        </button>
    </form>

    <div class="table-responsive shadow" style="max-height: 600px; overflow-y: auto;">
        <table class="table table-striped table-hover text-center align-middle overflow-hidden table-bordered">
            <thead class="table-secondary">
            <tr>
                <th>Imagen</th>
                <th>Tipo 1</th>
                <th>Tipo 2</th>
                <th>Número</th>
                <th>Nombre</th>
                <?php if (isset($_SESSION["logueado"])) {
                    echo '<th>Acciones</th>';
                } ?>
            </tr>
            </thead>
            <tbody>
            <?php
            $consulta = '';
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buscarPokemon'])) {
                $consulta = $_POST['query'];
            }
            foreach (busca($consulta) as $poke): ?>
                <tr>
                    <td>
                        <form action="" method="POST" style="display:inline;">
                            <input type="hidden" name="numero"
                                   value="<?php echo htmlspecialchars($poke['numero']); ?>">
                            <button type="submit" class="btn btn-link"
                                    title="Ver Detalles: <?php echo htmlspecialchars($poke['nombre']);?>"><img class="sprites"
                                                              src="<?php echo htmlspecialchars($poke['imagen']); ?>"
                                                              alt="<?php echo htmlspecialchars($poke['nombre']); ?>">
                            </button>
                        </form>
                    </td>
                    <td><img class="sprites" src="img/tipo/<?php echo htmlspecialchars($poke['tipo1']); ?>.svg"
                             alt="<?php echo htmlspecialchars($poke['tipo1']); ?>"> <?php echo($poke['tipo1']); ?>
                    </td>
                    <td><?php if (!empty($poke['tipo2'])): ?>
                            <img class="sprites" src="img/tipo/<?php echo htmlspecialchars($poke['tipo2']); ?>.svg"
                                 alt="<?php echo htmlspecialchars($poke['tipo2']); ?>">
                            <?php echo htmlspecialchars($poke['tipo2']); ?>
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($poke['numero']); ?></td>
                    <td>
                        <form action="" method="POST" style="display:inline;">
                            <input type="hidden" name="numero"
                                   value="<?php echo htmlspecialchars($poke['numero']); ?>">
                            <button type="submit" class="btn btn-link"
                                    title="Ver Detalles"><?php echo htmlspecialchars($poke['nombre']); ?></button>
                        </form>
                    </td>

                    <?php if (isset($_SESSION["logueado"])) {
                        echo '<td>
                    <button type="button" class="btn btn-primary" title="Modificar" data-bs-toggle="modal" data-bs-target="#modalModificar"
                        data-id="' . $poke['numero'] . '"
                        data-numero="' . $poke['numero'] . '"
                        data-nombre="' . $poke['nombre'] . '"
                        data-tipo1="' . $poke['tipo1'] . '"
                        data-tipo2="' . $poke['tipo2'] . '"
                        data-descripcion="' . $poke['descripcion'] . '">
                       <i class="bi bi-gear" style="font-size: 1.5rem;"></i>
                    </button>
                    <button type="button" class="btn btn-danger" title="Borrar" data-bs-toggle="modal" data-bs-target="#modalBorrar"
                        data-id="' . $poke['numero'] . '" data-nombre="' . $poke['nombre'] . '">
                       <i class="bi bi-trash" style="font-size: 1.5rem;"></i>
                    </button>
                    </td>';
                    } ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<br>
<?php if (isset($_SESSION["logueado"])) {
    echo '
        <div class="d-flex justify-content-center align-items-center text-center">
        <button class="btn btn-success btn-lg d-flex align-items-center" type="button" data-bs-toggle="modal"
                data-bs-target="#nuevoPokemonModal">
            <img src="img/icon/pokeball.png" alt="pokeball" width="30" style="filter: invert(1); margin-right: 8px;">Nuevo
            Pokémon
        </button>
        </div>';
    $pdo = conectarDB();
    $tipos = obtenerTipos();
    echo '<div class="modal fade" id="nuevoPokemonModal" tabindex="-1" aria-labelledby="nuevoPokemonModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nuevoPokemonModalLabel">Añadir Nuevo Pokémon</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label" for="utilitarios">Suba la imagen de su pokémon:</label>
            <input type="file" class="form-control" name="imagenPokemon" required>
          </div>
          <div class="mb-3">
            <select class="form-select" name="tipo1" required>
              <option value="" selected disabled>Tipo 1</option>';
    foreach ($tipos as $tipo) {
        echo '<option value="' . htmlspecialchars($tipo['tipo']) . '">' . htmlspecialchars($tipo['tipo']) . '</option>';
    }
    echo '  </select>
          </div>
          <div class="mb-3">
            <select class="form-select" name="tipo2" required>
              <option value="" selected disabled>Tipo 2</option>
              <option value="">Ninguno</option>';
    foreach ($tipos as $tipo) {
        echo '<option value="' . htmlspecialchars($tipo['tipo']) . '">' . htmlspecialchars($tipo['tipo']) . '</option>';
    }
    echo ' </select>
          </div>
          <div class="mb-3">
            <input class="form-control me-2" type="number" placeholder="Número" name="numero" min="1" required>
          </div>
          <div class="mb-3">
            <input class="form-control me-2" type="text" placeholder="Nombre" name="nombre" required>
          </div>
          <div class="mb-3">
                <textarea class="form-control" name="descripcion" placeholder="Agregue descripcion aqui" required></textarea>
            </div>
          <button type="submit" class="btn btn-success" name="guardar_pokemon">Enviar</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        </form>
      </div>
    </div>
  </div>
</div>';
}

