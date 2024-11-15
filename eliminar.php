<?php
$servername = 'localhost';
$dbname = 'practicarober'; 
$user = 'novo';         
$password = 'Dexter16.';
$database='practicarober';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbbame;charset=utf8", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit;
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM alumnos2 WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: inicio.html");
        exit;
    } else {
        echo "Error al eliminar el usuario";
    }
} else {
    echo "No se recibió el id del usuario";
}
?>