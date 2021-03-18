-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Mar-2021 às 08:14
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `claro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `nome_cargo` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `dt_cadastro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nome_cargo`, `dt_cadastro`) VALUES
(4, 'Analista programador', '2021-03-15 00:51:20'),
(6, 'Analista de dados II', '2021-03-16 00:05:14'),
(7, 'Analista de dados III', '2021-03-16 01:11:52'),
(8, 'Analista programador Sr.', '2021-03-16 03:04:38'),
(9, 'Gerente Administrativo/Financeiro', '2021-03-17 23:37:08'),
(11, 'Analista Financeiro PL', '2021-03-18 02:44:59'),
(12, 'Analista RH', '2021-03-18 02:52:16'),
(13, 'Analista Comercial', '2021-03-18 02:52:22');

--
-- Acionadores `cargo`
--
DELIMITER $$
CREATE TRIGGER `dt_cadastro_cargo` BEFORE INSERT ON `cargo` FOR EACH ROW BEGIN
	SET NEW.dt_cadastro = now();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gerente`
--

CREATE TABLE `gerente` (
  `id_gerente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `dt_cadastro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `gerente`
--

INSERT INTO `gerente` (`id_gerente`, `id_usuario`, `dt_cadastro`) VALUES
(2, 4, '2021-03-16 04:07:08'),
(3, 1, '2021-03-17 16:11:47'),
(6, 10, '2021-03-18 00:01:19');

--
-- Acionadores `gerente`
--
DELIMITER $$
CREATE TRIGGER `dt_cad_ger` BEFORE INSERT ON `gerente` FOR EACH ROW BEGIN
	SET NEW.dt_cadastro = now();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `login` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id_login`, `login`, `senha`, `id_usuario`) VALUES
(1, 'leonardo.ribeiro', '$2y$10$9FVAVZctFa0EFULv4FXsE.BjlTApEpdk64uUW3u4oLxTxRUS5iQyi', 1),
(2, 'felipe.martins', '$2y$10$BQY6RJgAahs1bUzk5Mqy9O7sA0KeswmBriuF72ntKu4dRPTL7OMvi', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_acesso`
--

CREATE TABLE `nivel_acesso` (
  `id_acesso` int(11) NOT NULL,
  `nome_permissao` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dt_cadastro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `nivel_acesso`
--

INSERT INTO `nivel_acesso` (`id_acesso`, `nome_permissao`, `dt_cadastro`) VALUES
(1, 'administrador', '2021-03-15 02:27:06'),
(2, 'básico', '2021-03-15 02:27:18'),
(3, 'avançado', '2021-03-15 02:27:32');

--
-- Acionadores `nivel_acesso`
--
DELIMITER $$
CREATE TRIGGER `dt_cad_acesso` BEFORE INSERT ON `nivel_acesso` FOR EACH ROW BEGIN
	SET NEW.dt_cadastro = now();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `id_setor` int(11) NOT NULL,
  `nome_setor` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `id_gerente` int(11) NOT NULL,
  `dt_cadastro` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`id_setor`, `nome_setor`, `id_gerente`, `dt_cadastro`) VALUES
(1, 'TI', 3, '2021-03-16 03:37:11'),
(2, 'Comercial', 2, '2021-03-16 04:08:37'),
(3, 'Administrativo', 6, '2021-03-17 23:44:07');

--
-- Acionadores `setor`
--
DELIMITER $$
CREATE TRIGGER `dt_cad_setor` BEFORE INSERT ON `setor` FOR EACH ROW BEGIN
	SET NEW.dt_cadastro = now();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `id_setor` int(11) DEFAULT NULL,
  `id_acesso` int(11) NOT NULL,
  `dt_cadastro` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `id_cargo`, `id_setor`, `id_acesso`, `dt_cadastro`) VALUES
(1, 'Leonardo Ribeiro de Carvalho', 4, 1, 1, '0000-00-00 00:00:00'),
(4, 'Maria de Fátima', 8, 1, 3, '0000-00-00 00:00:00'),
(9, 'Felipe Martins', 4, 1, 1, '0000-00-00 00:00:00'),
(10, 'Cátia Machado Castro', 9, 3, 1, '2021-03-18 00:29:41'),
(12, 'João Vicente Santos', 11, NULL, 2, '0000-00-00 00:00:00'),
(17, 'Leonardo Ribeiro1', 8, 3, 2, '2021-03-18 06:49:59'),
(18, 'John Doe', 13, 2, 3, '2021-03-18 06:50:55'),
(19, 'Maria Joana', 13, 2, 2, '2021-03-18 06:51:49'),
(20, 'Ana Julia', 12, 3, 3, '2021-03-18 06:52:11'),
(21, 'Ana Leticia', 8, 1, 1, '2021-03-18 06:52:40'),
(22, 'Vitor Augusto', 4, 1, 2, '2021-03-18 06:52:55'),
(23, 'Rita de Cassia', 11, 3, 2, '2021-03-18 06:53:09'),
(24, 'Caroline Mota', 13, 2, 3, '2021-03-18 06:53:43'),
(25, 'Luiz Inácio', 8, 1, 3, '2021-03-18 06:54:41'),
(26, 'José Felix', 9, 3, 3, '2021-03-18 06:55:09'),
(27, 'Caetano Veloso', 8, 1, 3, '2021-03-18 06:55:56'),
(28, 'Karol Senk', 12, 3, 2, '2021-03-18 06:56:25'),
(29, 'Gilberto Vigoroso', 13, 2, 3, '2021-03-18 06:56:46'),
(30, 'Monica Freire', 11, 3, 2, '2021-03-18 06:57:38'),
(31, 'Thaís Souza Silva', 4, 1, 2, '2021-03-18 06:58:05');

--
-- Acionadores `usuario`
--
DELIMITER $$
CREATE TRIGGER `dt_cad_usuario` BEFORE INSERT ON `usuario` FOR EACH ROW BEGIN
	SET NEW.dt_cadastro = now();
END
$$
DELIMITER ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Índices para tabela `gerente`
--
ALTER TABLE `gerente`
  ADD PRIMARY KEY (`id_gerente`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  ADD PRIMARY KEY (`id_acesso`);

--
-- Índices para tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id_setor`),
  ADD KEY `id_gerente` (`id_gerente`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_cargo` (`id_cargo`),
  ADD KEY `id_setor` (`id_setor`),
  ADD KEY `id_acesso` (`id_acesso`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `gerente`
--
ALTER TABLE `gerente`
  MODIFY `id_gerente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `id_setor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `gerente`
--
ALTER TABLE `gerente`
  ADD CONSTRAINT `gerente_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `setor`
--
ALTER TABLE `setor`
  ADD CONSTRAINT `setor_ibfk_1` FOREIGN KEY (`id_gerente`) REFERENCES `gerente` (`id_gerente`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_setor`) REFERENCES `setor` (`id_setor`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`id_acesso`) REFERENCES `nivel_acesso` (`id_acesso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
