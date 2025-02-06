<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat con OpenAI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body class="bg-light">
<div class="container py-5">
    <h1 class="text-center mb-4">Chat con OpenAI</h1>
    <div class="card shadow">
        <div class="card-body">
            <form id="chat-form">
                <div class="mb-3">
                    <label for="mensaje" class="form-label">Escribe tu mensaje:</label>
                    <textarea id="mensaje" class="form-control" rows="3" placeholder="Escribe tu pregunta aquí..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
            <div id="respuesta" class="mt-4">
                <!-- Aquí aparecerá la respuesta de OpenAI -->
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('chat-form').addEventListener('submit', async function (event) {
        event.preventDefault();
        const mensaje = document.getElementById('mensaje').value;
        const respuestaDiv = document.getElementById('respuesta');

        respuestaDiv.innerHTML = '<div class="text-muted">Enviando...</div>';

        try {
            // Asegúrate de que la URL sea la correcta
            const response = await axios.post('/api/generar-respuesta', { pregunta: mensaje });

            // Verificar si la respuesta es correcta
            console.log(response.data); // Ver respuesta en la consola para depurar

            // Mostrar la respuesta
            respuestaDiv.innerHTML = `
                    <div class="alert alert-success">
                        <strong>Respuesta:</strong> ${response.data.respuesta}
                    </div>
                `;
        } catch (error) {
            console.error(error);
            respuestaDiv.innerHTML = `
                    <div class="alert alert-danger">
                        <strong>Error:</strong> No se pudo obtener una respuesta. Revisa la consola para más detalles.
                    </div>
                `;
        }
    });
</script>
</body>
</html>
