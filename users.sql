-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 10/03/2022 às 20:02
-- Versão do servidor: 8.0.28-0ubuntu0.20.04.3
-- Versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fsphp`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `document` varchar(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `document`, `created_at`, `updated_at`) VALUES
(1, 'Robson', 'Santos', 'robson1@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(4, 'Eleno', 'Santos', 'eleno29@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(5, 'Lucas', 'Santos', 'lucas30@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(6, 'Mateus', 'Santos', 'mateus31@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(7, 'João', 'Santos', 'joão32@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(8, 'Felipe', 'Santos', 'felipe33@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(9, 'Anderson', 'Santos', 'anderson34@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(10, 'Elton', 'Santos', 'elton35@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(11, 'Leonardo', 'Santos', 'leonardo36@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(12, 'Regilton', 'Santos', 'regilton37@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(13, 'Sidney', 'Santos', 'sidney38@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(14, 'Lourival', 'Santos', 'lourival39@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(15, 'Henrique', 'Santos', 'henrique40@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(16, 'Daniel', 'Santos', 'daniel41@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(17, 'Pedro', 'Santos', 'pedro42@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(18, 'Andre Roberto', 'Santos', 'andre roberto43@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(19, 'Ozeias', 'Santos', 'ozeias44@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(20, 'Arnobio', 'Santos', 'arnobio45@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(21, 'Roniel', 'Santos', 'roniel46@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(22, 'Caíque', 'Santos', 'caíque47@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(23, 'Lucas', 'Santos', 'lucas48@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(24, 'Francisco', 'Santos', 'francisco49@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(25, 'Cristian', 'Santos', 'cristian50@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(26, 'Eduardo', 'Santos', 'eduardo51@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(27, 'Rodrigo', 'Santos', 'rodrigo52@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(28, 'Raphael', 'Santos', 'raphael53@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(29, 'Jose', 'Santos', 'jose54@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(30, 'Rodrigo', 'Santos', 'rodrigo55@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(31, 'Diego', 'Santos', 'diego56@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL),
(32, 'Alexandre', 'Santos', 'alexandre57@email.com.br', '', NULL, '2022-01-29 21:02:22', NULL);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
