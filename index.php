<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Livraria - CRUD de Livros</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>CRUD de Livros</h1>
        <form id="bookForm">
            <input type="text" id="Ltitulo" placeholder="Título do Livro" required>
            <input type="text" id="Lautor" placeholder="Autor do Livro" required>
            <button type="submit">Adicionar Livro</button>
        </form>
        <table id="bookTable">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Livros serão listados aqui -->
            </tbody>
        </table>
    </div>
    <script src="script.js"></script>
</body>
</html> 