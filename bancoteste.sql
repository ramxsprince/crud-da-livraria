-- Banco de dados: `bancoteste`

CREATE DATABASE IF NOT EXISTS bancoteste;

USE bancoteste;

-- Tabela `autor`
CREATE TABLE IF NOT EXISTS `autor` (
  `AutorID` int(11) NOT NULL,
  `Nome` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`AutorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `autor` (`AutorID`, `Nome`) VALUES
(0, 'Machado de Assis'),
(1, 'Clarice Lispector'),
(2, 'Graciliano Ramos'),
(3, 'Érico Veríssimo'),
(4, 'Carlos Drummond de Andrade');

-- Tabela `categoria`
CREATE TABLE IF NOT EXISTS `categoria` (
  `CategoriaID` int(11) NOT NULL,
  `Nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`CategoriaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `categoria` (`CategoriaID`, `Nome`) VALUES
(0, 'Romance'),
(1, 'Modernismo'),
(2, 'Regionalismo'),
(3, 'Poesia'),
(4, 'Romance');

-- Tabela `livro`
CREATE TABLE IF NOT EXISTS `livro` (
  `LivroID` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `AutorID` int(11) DEFAULT NULL,
  `CategoriaID` int(11) DEFAULT NULL,
  PRIMARY KEY (`LivroID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `livro` (`LivroID`, `titulo`, `preco`, `AutorID`, `CategoriaID`) VALUES
(1, 'Dom Casmurro', '29.90', 0, 0),
(2, 'A Hora da Estrela', '24.50', 1, 1),
(3, 'Vidas Secas', '34.90', 2, 2),
(4, 'O Tempo e o Vento', '49.90', 3, 3),
(5, 'Sentimento do Mundo', '19.90', 4, 4);