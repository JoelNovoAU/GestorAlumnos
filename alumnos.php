<?php
$servername = 'localhost';
$dbname = 'practicarober'; 
$user = 'novo';         
$password = 'Dexter16.';
$database='practicarober';

try {
 
    $conn = new PDO("mysql:host=$servername;dbname=$dbbame;charset=utf8", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = "SELECT nombre, descripcion, foto FROM alumnos2";
    $stmt = $conn->query($sql);

   
    $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estiloimg.css">
    <title>Listado de Alumnos</title>
</head>
<body>
    <header>
        <h1>LISTADO DE ALUMNOS</h1>
    </header>
    <div id="listado">
       
    </div>
    <a href="inicio.html"><button type="button">Volver al menu</button></a>
   
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {
            // Convertir $lista de PHP a JSON y cargarlo en JavaScript
            var lista = <?php echo json_encode($lista); ?>;
            lista.forEach(mostrarCarta);

            function mostrarCarta(carta) {
                var html = `
                <div class="contenedor">
                <div class="carta">
                    <img src="${carta.foto}" alt="" class="fotoperfil">
                    <h2 class="nombre">${carta.nombre}</h2>
                    <h4 class="descripcion">${carta.descripcion}</h4>
                </div>
                <div>`;
                $('#listado').append(html);
            }
        });
    </script>
</body>
</html>
