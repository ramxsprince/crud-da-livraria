// script.js

let livros = [];
const tabelaLivros = document.getElementById('tabelaLivros');
const formulario = document.getElementById('formLivro');
const inputTitulo = document.getElementById('titulo');
const inputAutor = document.getElementById('autor');
const inputAno = document.getElementById('ano');
let livroEditando = null;

function listarLivros() {
    tabelaLivros.innerHTML = '';
    livros.forEach((livro, index) => {
        const linha = document.createElement('tr');
        linha.innerHTML = `
            <td>${livro.titulo}</td>
            <td>${livro.autor}</td>
            <td>${livro.ano}</td>
            <td>
                <button onclick="editarLivro(${index})">Editar</button>
                <button onclick="excluirLivro(${index})">Excluir</button>
            </td>
        `;
        tabelaLivros.appendChild(linha);
    });
}

function adicionarLivro(event) {
    event.preventDefault();
    const titulo = inputTitulo.value;
    const autor = inputAutor.value;
    const ano = inputAno.value;

    if (livroEditando !== null) {
        livros[livroEditando] = { titulo, autor, ano };
        livroEditando = null;
    } else {
        livros.push({ titulo, autor, ano });
    }

    formulario.reset();
    listarLivros();
}

function editarLivro(index) {
    livroEditando = index;
    const livro = livros[index];
    inputTitulo.value = livro.titulo;
    inputAutor.value = livro.autor;
    inputAno.value = livro.ano;
}

function excluirLivro(index) {
    if (confirm('Tem certeza que deseja excluir este livro?')) {
        livros.splice(index, 1);
        listarLivros();
    }
}

formulario.addEventListener('submit', adicionarLivro);
listarLivros();