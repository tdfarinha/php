-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/04/2024 às 23:15
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
-- Banco de dados: `formaest`
--

CREATE DATABASE formaest;

USE formaest;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `limite_alunos` int(11) NOT NULL,
  `id_docente` int(11) DEFAULT NULL,
  `tipo_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `inscricoes`
--

CREATE TABLE `inscricoes` (
  `id_inscricao` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `data_inscricao` datetime NOT NULL,
  `v_exam_nacional` int(20) NOT NULL,
  `status_inscricao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `status_inscricao`
--

CREATE TABLE `status_inscricao` (
  `id_status_inscricao` int(11) NOT NULL,
  `desc` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `status_inscricao`
--

INSERT INTO `status_inscricao` (`id_status_inscricao`, `desc`) VALUES
(1, 'Em Analise'),
(2, 'Aprovada'),
(3, 'Reprovada'),
(4, 'Apagada');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_curso`
--

CREATE TABLE `tipo_curso` (
  `id_tipo_curso` int(11) NOT NULL,
  `descricao` varchar(25) NOT NULL,
  `duracao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tipo_curso`
--

INSERT INTO `tipo_curso` (`id_tipo_curso`, `descricao`, `duracao`) VALUES
(1, 'CTSP', 2),
(2, 'Licenciatura', 3),
(3, 'Mestrado', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_utilizador`
--

CREATE TABLE `tipo_utilizador` (
  `id_tipo_utilizador` int(11) NOT NULL,
  `descricao` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tipo_utilizador`
--

INSERT INTO `tipo_utilizador` (`id_tipo_utilizador`, `descricao`) VALUES
(1, 'Administrador'),
(2, 'Docente'),
(3, 'Aluno'),
(4, 'Aluno não validado'),
(5, 'Utilizador Apagado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tipo_user` int(11) NOT NULL,
  `imagem` varchar(30) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `utilizadores`
--

INSERT INTO `utilizadores` (`id_user`, `username`, `password`, `endereco`, `telefone`, `email`, `tipo_user`, `imagem`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Rua do Admin 1', '933888694', 'admin@formaest.pt', 1, 'admin.png'),
(2, 'docente', 'ac99fecf6fcb8c25d18788d14a5384ee', 'Rua do Docente 1', '933888593', 'docente@formaest.pt', 2, 'docente.png'),
(3, 'aluno','ca0cd09a12abade3bf0777574d9f987f', 'Rua do Aluno 1', '933888492', 'aluno@gmail.com', 3, 'aluno.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `id_docente` (`id_docente`),
  ADD KEY `tipo_curso` (`tipo_curso`);

--
-- Índices de tabela `inscricoes`
--
ALTER TABLE `inscricoes`
  ADD PRIMARY KEY (`id_inscricao`),
  ADD KEY `id_aluno` (`id_aluno`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `status_inscricao` (`status_inscricao`);

--
-- Índices de tabela `status_inscricao`
--
ALTER TABLE `status_inscricao`
  ADD PRIMARY KEY (`id_status_inscricao`);

--
-- Índices de tabela `tipo_curso`
--
ALTER TABLE `tipo_curso`
  ADD PRIMARY KEY (`id_tipo_curso`);

--
-- Índices de tabela `tipo_utilizador`
--
ALTER TABLE `tipo_utilizador`
  ADD PRIMARY KEY (`id_tipo_utilizador`);

--
-- Índices de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `tipo_user` (`tipo_user`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `inscricoes`
--
ALTER TABLE `inscricoes`
  MODIFY `id_inscricao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `status_inscricao`
--
ALTER TABLE `status_inscricao`
  MODIFY `id_status_inscricao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tipo_curso`
--
ALTER TABLE `tipo_curso`
  MODIFY `id_tipo_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tipo_utilizador`
--
ALTER TABLE `tipo_utilizador`
  MODIFY `id_tipo_utilizador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `fk_docente` FOREIGN KEY (`id_docente`) REFERENCES `utilizadores` (`id_user`),
  ADD CONSTRAINT `fk_tipo_curso` FOREIGN KEY (`tipo_curso`) REFERENCES `tipo_curso` (`id_tipo_curso`);

--
-- Restrições para tabelas `inscricoes`
--
ALTER TABLE `inscricoes`
  ADD CONSTRAINT `fk_aluno` FOREIGN KEY (`id_aluno`) REFERENCES `utilizadores` (`id_user`),
  ADD CONSTRAINT `fk_curso` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`),
  ADD CONSTRAINT `fk_status_inscricao` FOREIGN KEY (`status_inscricao`) REFERENCES `status_inscricao` (`id_status_inscricao`);

--
-- Restrições para tabelas `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD CONSTRAINT `fk_tipo_user` FOREIGN KEY (`tipo_user`) REFERENCES `tipo_utilizador` (`id_tipo_utilizador`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
