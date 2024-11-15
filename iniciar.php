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
//si fue enviadao
if (isset($_POST['nombre']) && isset($_POST['contra'])) {
    $nombre = $_POST['nombre'];
    $contra = $_POST['contra'];
}
    // Cambia el nombre de la variable en bindParam a $contra
    $sql = "SELECT * FROM alumnos WHERE nombre = :nombre AND contra = :contra";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':contra', $contra); // Corrige aquí

    $stmt->execute();

    // Verifica si hay alguna fila que coincida
    if ($stmt->rowCount() > 0) {
        header("Location: inicio.html");
        exit;
    } else {
        echo "No existe ese usuario";
    }


?>
