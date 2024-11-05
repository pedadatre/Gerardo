
    <form method="POST" action="/store">
        @csrf
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="cuerpo">Texto:</label><br>
        <textarea id="cuerpo" name="cuerpo" rows="4" required></textarea><br><br>

        <label for="enlace">Enlace:</label><br>
        <input type="url" id="enlace" name="enlace" required><br><br>

        <input type="submit" value="Enviar">
    </form>

