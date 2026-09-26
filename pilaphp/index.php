<?php


session_start();

require_once __DIR__ . '/Estudiante.php';
require_once __DIR__ . '/Pila.php';


$pila = new Pila();
if (isset($_SESSION['pila_estudiantes'])) {
    $pila->fromArray($_SESSION['pila_estudiantes']);
}

$mensaje = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';

    if ($accion === 'agregar') {
        $codigo          = trim($_POST['codigo'] ?? '');
        $nombres         = trim($_POST['nombres'] ?? '');
        $apellidos       = trim($_POST['apellidos'] ?? '');
        $email           = trim($_POST['email'] ?? '');
        $fechaNacimiento = trim($_POST['fechaNacimiento'] ?? '');
        $genero          = trim($_POST['genero'] ?? '');

        if ($codigo === '' || $nombres === '' || $apellidos === '' || $email === '' || $fechaNacimiento === '' || $genero === '') {
            $error = 'Todos los campos son obligatorios.';
        } else {
            $estudiante = new Estudiante($codigo, $nombres, $apellidos, $email, $fechaNacimiento, $genero);
            $pila->agregar($estudiante);
            $mensaje = "Estudiante \"{$nombres} {$apellidos}\" agregado correctamente. Tamaño actual: " . $pila->tamanyo();
        }
    }

    if ($accion === 'quitar') {
        $quitado = $pila->quitar();
        if ($quitado === null) {
            $error = 'La pila está vacía. No se puede quitar.';
        } else {
            $mensaje = "Se quitó a: {$quitado->getNombres()} {$quitado->getApellidos()} (código: {$quitado->getCodigo()}). Tamaño actual: " . $pila->tamanyo();
        }
    }

    $_SESSION['pila_estudiantes'] = $pila->toArray();
}

$estudiantes = $pila->mostrar();
$tamanyo     = $pila->tamanyo();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pila de Estudiantes — PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Pila de Estudiantes</h1>
            <p class="subtitle">Estructura de datos LIFO (Last In, First Out) — PHP puro</p>
        </header>

        <?php if ($mensaje !== ''): ?>
            <div class="alert success"><?= htmlspecialchars($mensaje) ?></div>
        <?php endif; ?>

        <?php if ($error !== ''): ?>
            <div class="alert error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <section class="card">
            <h2>Agregar estudiante</h2>
            <form method="POST" action="index.php" class="form-grid">
                <input type="hidden" name="accion" value="agregar">

                <label>
                    Código
                    <input type="text" name="codigo" required placeholder="E001">
                </label>

                <label>
                    Nombres
                    <input type="text" name="nombres" required placeholder="Ana María">
                </label>

                <label>
                    Apellidos
                    <input type="text" name="apellidos" required placeholder="López García">
                </label>

                <label>
                    Email
                    <input type="email" name="email" required placeholder="ana@correo.com">
                </label>

                <label>
                    Fecha de nacimiento
                    <input type="date" name="fechaNacimiento" required>
                </label>

                <label>
                    Género
                    <select name="genero" required>
                        <option value="">— Seleccione —</option>
                        <option value="M">Masculino (M)</option>
                        <option value="F">Femenino (F)</option>
                        <option value="O">Otro (O)</option>
                    </select>
                </label>

                <button type="submit" class="btn btn-primary">Agregar a la pila</button>
            </form>
        </section>

        <section class="card actions">
            <h2>Operaciones de la pila</h2>
            <p><strong>Tamaño actual (tamanyo):</strong> <?= $tamanyo ?></p>

            <form method="POST" action="index.php" style="display:inline;">
                <input type="hidden" name="accion" value="quitar">
                <button type="submit" class="btn btn-danger" <?= $tamanyo === 0 ? 'disabled' : '' ?>>
                    Quitar (cima)
                </button>
            </form>
        </section>

        <section class="card">
            <h2>Contenido de la pila (cima → base)</h2>

            <?php if ($tamanyo === 0): ?>
                <p class="empty">La pila está vacía.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>Posición</th>
                            <th>Código</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th>Fecha nac.</th>
                            <th>Género</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($estudiantes as $i => $est): ?>
                            <tr class="<?= $i === 0 ? 'cima' : '' ?>">
                                <td><?= $i === 0 ? 'CIMA' : ($i + 1) ?></td>
                                <td><?= htmlspecialchars($est->getCodigo()) ?></td>
                                <td><?= htmlspecialchars($est->getNombres()) ?></td>
                                <td><?= htmlspecialchars($est->getApellidos()) ?></td>
                                <td><?= htmlspecialchars($est->getEmail()) ?></td>
                                <td><?= htmlspecialchars($est->getFechaNacimiento()) ?></td>
                                <td><?= htmlspecialchars($est->getGenero()) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </section>

        <footer>
            <p>Proyecto académico — Pila implementada con arreglos de PHP · Sin frameworks</p>
        </footer>
    </div>
</body>
</html>
