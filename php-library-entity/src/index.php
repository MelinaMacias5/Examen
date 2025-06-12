<?php
require_once __DIR__ . '/Database/Connection.php';

// Permitir solicitudes desde Postman
header('Content-Type: application/json');

// Obtener el JSON enviado
$request = json_decode(file_get_contents('php://input'), true);

if (!$request) {
    echo json_encode(['error' => 'Solicitud inválida']);
    exit;
}

$method = $request['method'] ?? null;
$params = $request['params'] ?? [];

$conn = Connection::getInstance()->getConnection();

switch ($method) {
    case 'getLibros':
        $stmt = $conn->query("SELECT * FROM libro");
        $result = $stmt->fetchAll();
        echo json_encode(['result' => $result]);
        break;

    case 'crearLibro':
        $titulo = $params['titulo'] ?? '';
        $autor_id = $params['autor_id'] ?? null;
        if ($titulo && $autor_id) {
            $stmt = $conn->prepare("INSERT INTO libro (titulo, autor_id) VALUES (?, ?)");
            $stmt->execute([$titulo, $autor_id]);
            echo json_encode(['result' => 'Libro creado']);
        } else {
            echo json_encode(['error' => 'Faltan parámetros']);
        }
        break;

    <?php
// ...existing code...
switch ($method) {
    case 'getLibros':
        $stmt = $conn->query("SELECT * FROM libro");
        $result = $stmt->fetchAll();
        echo json_encode(['result' => $result]);
        break;

    case 'getLibro':
        $id = $params['id'] ?? null;
        if ($id) {
            $stmt = $conn->prepare("SELECT * FROM libro WHERE id = ?");
            $stmt->execute([$id]);
            $result = $stmt->fetch();
            echo json_encode(['result' => $result]);
        } else {
            echo json_encode(['error' => 'Falta el parámetro id']);
        }
        break;

    case 'crearLibro':
        $titulo = $params['titulo'] ?? '';
        $autor_id = $params['autor_id'] ?? null;
        if ($titulo && $autor_id) {
            $stmt = $conn->prepare("INSERT INTO libro (titulo, autor_id) VALUES (?, ?)");
            $stmt->execute([$titulo, $autor_id]);
            echo json_encode(['result' => 'Libro creado']);
        } else {
            echo json_encode(['error' => 'Faltan parámetros']);
        }
        break;

    case 'actualizarLibro':
        $id = $params['id'] ?? null;
        $titulo = $params['titulo'] ?? null;
        $autor_id = $params['autor_id'] ?? null;
        if ($id && $titulo && $autor_id) {
            $stmt = $conn->prepare("UPDATE libro SET titulo = ?, autor_id = ? WHERE id = ?");
            $stmt->execute([$titulo, $autor_id, $id]);
            echo json_encode(['result' => 'Libro actualizado']);
        } else {
            echo json_encode(['error' => 'Faltan parámetros']);
        }
        break;

    case 'eliminarLibro':
        $id = $params['id'] ?? null;
        if ($id) {
            $stmt = $conn->prepare("DELETE FROM libro WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(['result' => 'Libro eliminado']);
        } else {
            echo json_encode(['error' => 'Falta el parámetro id']);
        }
        break;

    default:
        echo json_encode(['error' => 'Método no soportado']);
}
// ...existing code...

    default:
        echo json_encode(['error' => 'Método no soportado']);
}