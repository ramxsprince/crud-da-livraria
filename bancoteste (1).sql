-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/03/2026 às 12:22
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bancoteste`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `autor`
--

CREATE TABLE `autor` (
  `AutorID` int(11) NOT NULL,
  `Nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `autor`
--

INSERT INTO `autor` (`AutorID`, `Nome`) VALUES
(0, 'Machado de Assis'),
(1, 'Clarice Lispector'),
(2, 'Graciliano Ramos'),
(3, 'Érico Veríssimo'),
(4, 'Carlos Drummond de Andrade');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `CategoriaID` int(11) NOT NULL,
  `Nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`CategoriaID`, `Nome`) VALUES
(0, 'Romance'),
(1, 'Modernismo'),
(2, 'Regionalismo'),
(3, 'Poesia'),
(4, 'Romance');

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro`
--

CREATE TABLE `livro` (
  `LivroID` int(11) NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `preco` varchar(45) DEFAULT NULL,
  `AutorID` varchar(45) DEFAULT NULL,
  `CategoriaID` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `livro`
--

INSERT INTO `livro` (`LivroID`, `titulo`, `preco`, `AutorID`, `CategoriaID`) VALUES
(1, 'Dom Casmurro', '29.90', '0', '0'),
(2, 'A Hora da Estrela', '24.50', '1', '1'),
(3, 'Vidas Secas', '34.90', '2', '2'),
(4, 'O Tempo e o Vento', '49.90', '3', '3'),
(5, 'Sentimento do Mundo', '19.90', '5', '5');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`AutorID`);

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`CategoriaID`);

--
-- Índices de tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`LivroID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
