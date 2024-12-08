<div class="container">
    <br>
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="sprites-detail-container">
                        <img class="sprites-detail img-fluid"
                             src="<?php echo htmlspecialchars($pokemonDetalles['imagen']); ?>"
                             alt="<?php echo htmlspecialchars($pokemonDetalles['nombre']); ?>">

                        <img class="sprites-detail-reflection img-fluid d-none d-lg-block"
                             src="<?php echo htmlspecialchars($pokemonDetalles['imagen']); ?>"
                             alt="Reflejo de <?php echo htmlspecialchars($pokemonDetalles['nombre']); ?>">
                    </div>
                </div>

                <div class="col-md-8">
                    <h2 class="card-title d-flex align-items-center flex-lg-nowrap flex-wrap">
                        <span class="d-flex align-items-center text-nowrap me-2">
                                    <img class="sprites align-middle me-2"
                                         src="img/tipo/<?php echo htmlspecialchars($pokemonDetalles['tipo1']); ?>.svg"
                                         alt="<?php echo htmlspecialchars($pokemonDetalles['tipo1']); ?>">
                                    <?php echo htmlspecialchars($pokemonDetalles['tipo1']); ?>
                                </span>
                        <?php if (!empty($pokemonDetalles['tipo2'])): ?>
                            <span class="d-flex align-items-center text-nowrap me-2">
                                <img class="sprites align-middle me-2"
                                     src="img/tipo/<?php echo htmlspecialchars($pokemonDetalles['tipo2']); ?>.svg"
                                     alt="<?php echo htmlspecialchars($pokemonDetalles['tipo2']); ?>">
                                <?php echo htmlspecialchars($pokemonDetalles['tipo2']); ?>
                            </span>
                        <?php endif; ?>

                        <span class="d-flex align-items-center text-nowrap ms-lg-2 ms-0 mt-lg-0 mt-2">
                            <?php echo htmlspecialchars($pokemonDetalles['nombre']); ?> (#<?php echo htmlspecialchars($pokemonDetalles['numero']); ?>)
                        </span>
                    </h2>

                    <p class="mt-4 fs-4">
                        <strong>Descripción:</strong> <?php echo htmlspecialchars($pokemonDetalles['descripcion']); ?>
                    </p>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-4 mb-4">
                <?php if (isset($_SESSION["logueado"])): ?>
                    <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal"
                            data-bs-target="#modalModificar"
                            data-id="<?php echo htmlspecialchars($pokemonDetalles['numero']); ?>"
                            data-numero="<?php echo htmlspecialchars($pokemonDetalles['numero']); ?>"
                            data-nombre="<?php echo htmlspecialchars($pokemonDetalles['nombre']); ?>"
                            data-tipo1="<?php echo htmlspecialchars($pokemonDetalles['tipo1']); ?>"
                            data-tipo2="<?php echo htmlspecialchars($pokemonDetalles['tipo2']); ?>"
                            data-descripcion="<?php echo htmlspecialchars($pokemonDetalles['descripcion']); ?>">
                        Modificar
                    </button>
                <?php endif; ?>
                <a href="index.php" class="btn btn-secondary">Volver a la tabla</a>
            </div>
        </div>
    </div>
</div>