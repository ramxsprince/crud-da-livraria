<?php
$conn = new mysqli("localhost", "root", "", "bancoteste");

if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}

$editData = null;

// EDITAR
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM livro WHERE LivroID=$id");
    $editData = $result->fetch_assoc();
}

// INSERIR
if (isset($_POST['action']) && $_POST['action'] == 'add') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $categoria = $_POST['categoria'];
    $preco = $_POST['preco'];

    $conn->query("INSERT INTO livro (titulo, preco, AutorID, CategoriaID)
                  VALUES ('$titulo','$preco','$autor','$categoria')");
    header("Location: index.php");
}

// ATUALIZAR
if (isset($_POST['action']) && $_POST['action'] == 'update') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $categoria = $_POST['categoria'];
    $preco = $_POST['preco'];

    $conn->query("UPDATE livro 
                  SET titulo='$titulo', preco='$preco', AutorID='$autor', CategoriaID='$categoria'
                  WHERE LivroID=$id");
    header("Location: index.php");
}

// EXCLUIR
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM livro WHERE LivroID=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Sistema de Biblioteca</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Sistema de Biblioteca</h1>
</header>

<main>

<div class="form-card">
    <h2><?= $editData ? 'Editar Livro' : 'Cadastrar Livro' ?></h2>

    <form method="POST">
        <input type="hidden" name="id" value="<?= $editData['LivroID'] ?? '' ?>">

        <input type="text" name="titulo" placeholder="Nome do Livro"
            value="<?= $editData['titulo'] ?? '' ?>" required>

        <input type="number" step="0.01" name="preco" placeholder="Preço"
            value="<?= $editData['preco'] ?? '' ?>" required>

        <select name="autor" required>
            <option value="">Selecione o Autor</option>
            <?php
            $autores = $conn->query("SELECT * FROM autor");
            while ($a = $autores->fetch_assoc()):
            ?>
            <option value="<?= $a['AutorID'] ?>"
                <?= ($editData && $editData['AutorID'] == $a['AutorID']) ? 'selected' : '' ?>>
                <?= $a['Nome'] ?>
            </option>
            <?php endwhile; ?>
        </select>

        <select name="categoria" required>
            <option value="">Selecione a Categoria</option>
            <?php
            $cats = $conn->query("SELECT * FROM categoria");
            while ($c = $cats->fetch_assoc()):
            ?>
            <option value="<?= $c['CategoriaID'] ?>"
                <?= ($editData && $editData['CategoriaID'] == $c['CategoriaID']) ? 'selected' : '' ?>>
                <?= $c['Nome'] ?>
            </option>
            <?php endwhile; ?>
        </select>

        <button type="submit" name="action" value="<?= $editData ? 'update' : 'add' ?>">
            <?= $editData ? 'Atualizar' : 'Salvar' ?>
        </button>
    </form>
</div>

<div class="table-card">
    <h2>Lista de Livros</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Livro</th>
                <th>Autor</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
        <?php
        $result = $conn->query("
            SELECT 
                livro.*,
                autor.Nome AS AutorNome,
                categoria.Nome AS CategoriaNome
            FROM livro
            LEFT JOIN autor ON livro.AutorID = autor.AutorID
            LEFT JOIN categoria ON livro.CategoriaID = categoria.CategoriaID
        ");

        while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><?= $row['LivroID'] ?></td>
            <td><?= $row['titulo'] ?></td>
            <td><?= $row['AutorNome'] ?></td>
            <td><?= $row['CategoriaNome'] ?></td>
            <td>R$ <?= number_format($row['preco'],2,',','.') ?></td>
            <td>
                <a class="edit" href="?edit=<?= $row['LivroID'] ?>">Editar</a>
                <a class="delete" href="?delete=<?= $row['LivroID'] ?>"
                   onclick="return confirm('Excluir este livro?')">Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

</main>

</body>
</html>