-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 18/05/2023 às 02:36
-- Versão do servidor: 10.4.27-MariaDB
-- Versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `siteCursoLibras`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `informacoesModulos`
--

CREATE TABLE `informacoesModulos` (
  `idModulo` int(11) NOT NULL,
  `identificadorModulo` int(11) DEFAULT NULL,
  `descricaoModulo` varchar(250) NOT NULL,
  `moduloVideo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `informacoesModulos`
--

INSERT INTO `informacoesModulos` (`idModulo`, `identificadorModulo`, `descricaoModulo`, `moduloVideo`) VALUES
(6, 1, 'Módulo relativo ao animal da fênix', 10),
(7, 1, 'águia de fogo que renasceu das cinzas do inferno 	', 11),
(8, 1, 'blá blá blá', 12),
(9, 1, 'fez o upload?', 13);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `informacoesModulos`
--
ALTER TABLE `informacoesModulos`
  ADD PRIMARY KEY (`idModulo`),
  ADD KEY `moduloVideo` (`moduloVideo`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `informacoesModulos`
--
ALTER TABLE `informacoesModulos`
  MODIFY `idModulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `informacoesModulos`
--
ALTER TABLE `informacoesModulos`
  ADD CONSTRAINT `informacoesModulos_ibfk_1` FOREIGN KEY (`moduloVideo`) REFERENCES `videos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
