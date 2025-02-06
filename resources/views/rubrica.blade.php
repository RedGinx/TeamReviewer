<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Rúbrica</title>
</head>
<body>
<form action="{{ route('rubrica.guardar') }}" method="POST">
    @csrf
    <label for="titulo">Título de la Rúbrica:</label>
    <input type="text" id="titulo" name="titulo" required><br><br>

    <label for="argumento1">Argumento 1:</label>
    <input type="text" id="argumento1" name="argumentos[0][nombre]" required>
    <label for="puntuacion1">Puntuación 1:</label>
    <input type="number" id="puntuacion1" name="argumentos[0][puntuacion]" required><br><br>

    <label for="argumento2">Argumento 2:</label>
    <input type="text" id="argumento2" name="argumentos[1][nombre]" required>
    <label for="puntuacion2">Puntuación 2:</label>
    <input type="number" id="puntuacion2" name="argumentos[1][puntuacion]" required><br><br>

    <!-- Puedes agregar más campos según lo necesites -->

    <button type="submit">Guardar Rúbrica</button>
</form>
</body>
</html>
