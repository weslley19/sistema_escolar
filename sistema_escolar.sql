-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 12/03/2020 às 17:25
-- Versão do servidor: 10.4.11-MariaDB
-- Versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema_escolar`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admin_director`
--

CREATE TABLE `admin_director` (
  `id` int(11) NOT NULL,
  `tname` varchar(255) NOT NULL,
  `cpf` varchar(13) NOT NULL,
  `date_nasc` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `admin_director`
--

INSERT INTO `admin_director` (`id`, `tname`, `cpf`, `date_nasc`, `email`, `pass`) VALUES
(1, 'Weslley Oliveiraaa', '789', '1999-11-10', 'weslley@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura para tabela `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `tname` varchar(255) NOT NULL,
  `ano` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `class`
--

INSERT INTO `class` (`id`, `tname`, `ano`, `date_created`) VALUES
(6, 'Turma Z', '4ª série', '2020-03-10'),
(7, 'Turma D', '5ª série', '2020-03-12'),
(8, 'Turma B', '8ª série', '2020-03-11'),
(10, 'Turma H', 'Primário', '2020-03-12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `direction`
--

CREATE TABLE `direction` (
  `id` int(11) NOT NULL,
  `tname` varchar(255) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `date_nasc` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `direction`
--

INSERT INTO `direction` (`id`, `tname`, `cpf`, `date_nasc`, `email`, `pass`) VALUES
(1, 'Meliodassss', '987654321', '2020-02-20', 'volmar@email.com', '202cb962ac59075b964b07152d234b70'),
(6, 'Meliodas', '3232', '1999-10-10', 'meliodas@fullcounter.coom', '202cb962ac59075b964b07152d234b70'),
(7, 'Volmar', '55', '1975-04-28', 'volmar@email.com', '202cb962ac59075b964b07152d234b70'),
(9, 'Chefão', '789', '2020-02-20', 'chefao@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02'),
(12, 'leonidas', '456', '2020-10-10', 'leonidas@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura para tabela `docente`
--

CREATE TABLE `docente` (
  `id` int(11) NOT NULL,
  `tname` varchar(255) NOT NULL,
  `cpf` varchar(13) NOT NULL,
  `date_nasc` date NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `docente`
--

INSERT INTO `docente` (`id`, `tname`, `cpf`, `date_nasc`, `email`) VALUES
(5, 'Joséeee', '456', '1010-10-10', 'jose@gmail.com'),
(6, 'abreu', '456', '2020-12-12', 'abreu@email.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  `tname` varchar(255) NOT NULL,
  `cpf` varchar(13) NOT NULL,
  `date_nasc` date NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `students`
--

INSERT INTO `students` (`id`, `id_class`, `tname`, `cpf`, `date_nasc`, `email`) VALUES
(6, 7, 'Daniellll', '789621', '2000-01-20', 'daniel@hotmail.br'),
(7, 6, 'Lucas', '123456', '2001-11-14', 'lucas@gmail.com'),
(10, 7, 'Marcos pontes', '123', '2000-02-20', 'meliodas@fullcounter.coom'),
(11, 6, 'Volmar', '159', '1010-10-10', 'volmar@email.com'),
(14, 6, 'José', '456', '2020-02-02', 'jordania@yahoo.br'),
(15, 6, 'Meliodas', '456', '2020-02-20', 'jose@gmail.com'),
(17, 7, 'FULANO', '456', '2020-10-10', 'fulano@email.com'),
(22, 7, 'goku', '456', '2020-02-20', 'goku@email.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `tname` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `subject`
--

INSERT INTO `subject` (`id`, `tname`, `date_created`) VALUES
(1, 'Programação 9', '1980-12-10'),
(5, 'geografia', '2020-03-12'),
(6, 'Filosofia', '2020-02-25');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `admin_director`
--
ALTER TABLE `admin_director`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `direction`
--
ALTER TABLE `direction`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_students` (`id_class`);

--
-- Índices de tabela `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `admin_director`
--
ALTER TABLE `admin_director`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `direction`
--
ALTER TABLE `direction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `docente`
--
ALTER TABLE `docente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `class_students` FOREIGN KEY (`id_class`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
