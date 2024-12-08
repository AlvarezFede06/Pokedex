<?php
$pdo = null;
function conectarDB()
{
    global $pdo;
    if ($pdo === null) {
        $host = 'localhost';
        $dbname = 'pokedex';
        $user = 'root';
        $pass = '';
        $port = 3307;

        try {
            $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
            exit;
        }
    }
    return $pdo;
}
function busca($consulta)
{
    $pdo = conectarDB();
    $sql = 'SELECT numero, nombre, tipo1, tipo2, imagen, descripcion
        FROM pokedex 
        WHERE numero LIKE :query 
        OR nombre LIKE :query 
        OR tipo1 LIKE :query 
        OR tipo2 LIKE :query
        ORDER BY numero ASC';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':query', '%' . $consulta . '%');
    $stmt->execute();
    $pokemon = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($pokemon == null) {
        mostrarAlerta('danger', 'Pokémon no encontrado!');
        $sql = 'SELECT numero, nombre, tipo1, tipo2, imagen, descripcion FROM pokedex';
        $stmt = $pdo->query($sql);
        $pokemon = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    $pdo = null;
    return $pokemon;
}
function verificar($consulta)
{
    $pdo = conectarDB();
    $sql = 'SELECT numero, nombre, tipo1, tipo2, imagen, descripcion
            FROM pokedex 
            WHERE numero LIKE :query 
            OR nombre LIKE :query 
            OR tipo1 LIKE :query 
            OR tipo2 LIKE :query
            OR descripcion LIKE :query';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':query', '%' . $consulta . '%');
    $stmt->execute();
    $pokemon = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $pdo = null;
    return $pokemon;
}
function obtenerTipos()
{
    $pdo = conectarDB();
    $sql = 'SELECT tipo FROM tipos_pokemon ORDER BY tipo ASC ';
    $stmt = $pdo->query($sql);
    $pdo = null;
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function mostrarAlerta($tipo, $mensaje) {
    $alertClass = '';
    switch ($tipo) {
        case 'success':
            $alertClass = 'alert-success';
            $icon = 'check-circle-fill';
            break;
        case 'danger':
            $alertClass = 'alert-danger';
            $icon = 'exclamation-triangle-fill';
            break;
        case 'warning':
            $alertClass = 'alert-warning';
            $icon = 'exclamation-triangle-fill';
            break;
        default:
            return;
    }
    echo '<div class="alert ' . $alertClass . ' alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x m-3 small d-flex align-items-center" role="alert" style="z-index: 1050;">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="' . ucfirst($tipo) . ':"><use xlink:href="#' . $icon . '"/></svg>
            <div class="flex-grow-1">' . htmlspecialchars($mensaje) . '</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
function validarImagen($file) {
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (in_array($extension, $allowed_extensions) && $file['size'] <= 2 * 1024 * 1024) {
        return ['valid' => true, 'extension' => $extension];
    }
    $errorMessage = (in_array($extension, $allowed_extensions)) 
        ? 'El tamaño de la imagen debe ser de 2MB o menos.' 
        : 'Formato de imagen no permitido. Solo se permiten: jpg, jpeg, png, gif, svg.';
    
    return ['valid' => false, 'message' => $errorMessage];
}

if (isset($_POST['guardar_pokemon'])) {
    $pdo = conectarDB();
    if (empty(verificar($_POST['numero']))) {
        $tipo1 = $_POST['tipo1'];
        $tipo2 = $_POST['tipo2'];
        $numero = $_POST['numero'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];

        if (isset($_FILES["imagenPokemon"]) && $_FILES["imagenPokemon"]["error"] == 0 && $_FILES["imagenPokemon"]["size"] > 0) {
            $resultado = validarImagen($_FILES["imagenPokemon"]);

            if ($resultado['valid']) {
                $rutaImagen = "img/svg/$numero." . $resultado['extension'];
                move_uploaded_file($_FILES["imagenPokemon"]["tmp_name"], $rutaImagen);
                $sql = "INSERT INTO pokedex (numero, nombre, tipo1, tipo2, imagen, descripcion)
                        VALUES (:numero, :nombre, :tipo1, :tipo2, :imagen, :descripcion)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':numero' => $numero,
                    ':nombre' => $nombre,
                    ':tipo1' => $tipo1,
                    ':tipo2' => $tipo2,
                    ':imagen' => $rutaImagen,
                    ':descripcion' => $descripcion
                ]);
                $pdo = null;

                mostrarAlerta('success', "Pokémon agregado exitosamente: $nombre ($numero) - Tipo1: $tipo1, Tipo2: $tipo2");
            } else {
                mostrarAlerta('danger', $resultado['message']);
            }
        } else {
            mostrarAlerta('danger', 'Error en la carga de la imagen.');
        }
    } else {
        mostrarAlerta('danger', 'Ya existe un pokemon con el número: ' . htmlspecialchars($_POST['numero']));
    }
}

if (isset($_POST['borrar_pokemon'])) {
    $pdo = conectarDB();
    $id = $_POST['pokemonBorrarId'];
    $sql = 'DELETE FROM pokedex WHERE numero = :numero';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':numero' => $id]);
    $pdo = null;
    mostrarAlerta('warning', 'Pokémon eliminado exitosamente.');
}

if (isset($_POST['modificar_pokemon'])) {
    $pdo = conectarDB();
    if (empty(verificar($_POST['numero'])) || ($_POST['pokemonModificarId']) == ($_POST['numero'])) {
        $id = $_POST['pokemonModificarId'];
        $numero = $_POST['numero'];
        $nombre = $_POST['nombre'];
        $tipo1 = $_POST['tipo1'];
        $tipo2 = $_POST['tipo2'];
        $descripcion = $_POST['descripcion'];

        if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0 && $_FILES["imagen"]["size"] > 0) {
            $resultado = validarImagen($_FILES["imagen"]);

            if ($resultado['valid']) {
                $rutaImagen = "img/svg/$numero." . $resultado['extension'];
                move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaImagen);

                $sql = 'UPDATE pokedex SET numero = :numero, nombre = :nombre, tipo1 = :tipo1, tipo2 = :tipo2, imagen = :imagen, descripcion = :descripcion WHERE numero = :id';
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':numero' => $numero,
                    ':nombre' => $nombre,
                    ':tipo1' => $tipo1,
                    ':tipo2' => $tipo2,
                    ':imagen' => $rutaImagen,
                    ':descripcion' => $descripcion,
                    ':id' => $id
                ]);
                $pdo = null;
            } else {
                mostrarAlerta('danger', $resultado['message']);
                return;
            }
        } else {
            $sql = 'UPDATE pokedex SET numero = :numero, nombre = :nombre, tipo1 = :tipo1, tipo2 = :tipo2, descripcion = :descripcion WHERE numero = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':numero' => $numero,
                ':nombre' => $nombre,
                ':tipo1' => $tipo1,
                ':tipo2' => $tipo2,
                ':descripcion' => $descripcion,
                ':id' => $id
            ]);
            $pdo = null;
        }

        mostrarAlerta('success', 'Pokémon modificado exitosamente: ' . htmlspecialchars($nombre) . ' (' . htmlspecialchars($numero) . ') - Tipo1: ' . htmlspecialchars($tipo1) . ', Tipo2: ' . htmlspecialchars($tipo2));
    } else {
        mostrarAlerta('danger', 'Ya existe un pokemon con el número: ' . htmlspecialchars($_POST['numero']));
    }
}

if (isset($_POST['numero'])) {
    $pdo = conectarDB();
    $numero = $_POST['numero'];
    $sql = "SELECT * FROM pokedex WHERE numero = :numero";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':numero' => $numero]);
    $pokemonDetalles = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($pokemonDetalles) {
        $mostrarPokemon = true;
    }
    $pdo = null;
}
