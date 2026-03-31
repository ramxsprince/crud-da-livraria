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
        <form id="bookForm" method="POST" action="index.php">
            <input type="hidden" name="id" id="bookId">
            <input type="text" name="titulo" id="Ltitulo" placeholder="Título do Livro" required>
            <input type="text" name="autor" id="Lautor" placeholder="Autor do Livro" required>
            <button type="submit" name="action" value="add">Adicionar Livro</button>
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
                <?php
                // Conexão com o banco de dados
                $conn = new mysqli("localhost", "root", "", "bancoteste");

                // Verificar conexão
                if ($conn->connect_error) {
                    die("Falha na conexão: " . $conn->connect_error);
                }

                // Adicionar livro
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'add') {
                    $titulo = $_POST['titulo'];
                    $autor = $_POST['autor'];

                    $sql = "INSERT INTO livro (titulo, AutorID) VALUES ('$titulo', '$autor')";
                    if (!$conn->query($sql)) {
                        echo "Erro ao adicionar livro: " . $conn->error;
                    }
                }

                // Excluir livro
                if (isset($_GET['delete'])) {
                    $id = $_GET['delete'];
                    $sql = "DELETE FROM livro WHERE LivroID=$id";
                    if (!$conn->query($sql)) {
                        echo "Erro ao excluir livro: " . $conn->error;
                    }
                }

                // Listar livros
                $result = $conn->query("SELECT * FROM livro");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['titulo']}</td>
                            <td>{$row['AutorID']}</td>
                            <td>
                                <a href='?delete={$row['LivroID']}' onclick='return confirm(\"Tem certeza que deseja excluir este livro?\")'>Excluir</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Nenhum livro encontrado</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>