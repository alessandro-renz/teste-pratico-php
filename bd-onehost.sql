-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Jan-2019 às 22:59
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onehost`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL DEFAULT '0',
  `estado` varchar(50) NOT NULL DEFAULT '0',
  `cidade` varchar(100) NOT NULL DEFAULT '0',
  `bairro` varchar(100) NOT NULL DEFAULT '0',
  `rua` varchar(100) NOT NULL DEFAULT '0',
  `numero` varchar(10) NOT NULL DEFAULT '0',
  `senha` varchar(32) NOT NULL,
  `cep` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `preco` varchar(100) NOT NULL,
  `fornecedor` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `fornecedor`, `url`) VALUES
(1, 'adidas superstar', '200.00', 'adidas', 'images/adidas_superstar.jpg'),
(2, 'adidas daily', '150.00', 'adidas', 'images/adidas_daily.jpg'),
(3, 'adidas adizero club 2', '400.00', 'adidas', 'images/adidas-adizero-club-2.jpg'),
(4, 'adidas duramo', '500.00', 'adidas', 'images/adidas_duramo.jpg'),
(5, 'adidas energy cloud 2', '250.00', 'adidas', 'images/adidas_energy.jpg'),
(6, 'nike shox', '600.00', 'nike', 'images/nike_shox.jpg'),
(7, 'nike flex experience', '249.90', 'nike', 'images/nike_flex_experience.jpg'),
(8, 'nike air max', '230.00', 'nike', 'images/nike_air_max.jpg'),
(9, 'nike retaliation', '210.00', 'nike', 'images/nike_retaliation.jpg'),
(10, 'nike nightgazer', '190.00', 'nike', 'images/nike_night_gazer.jpg'),
(11, 'bull terrier acer', '279.80', 'bull_terrier', 'images/bull_terrier_acer.jpg'),
(12, 'bull terrier fox', '229.90', 'bull_terrier', 'images/bull_terrier_fox.jpg'),
(13, 'bull terrier havoc', '319.90', 'bull_terrier', 'images/bull_terrier_havoc.jpg'),
(14, 'bull terrier adventure', '279.90', 'bull_terrier', 'images/bull_terrier_adventure.jpg'),
(15, 'puma turin', '249.90', 'puma', 'images/puma_turin.jpg'),
(16, 'puma smash', '249.99', 'puma', 'images/puma_smash.jpg'),
(17, 'puma enzo street', '299.99', 'puma', 'images/puma_street.jpg'),
(18, 'puma meteor', '190.99', 'puma', 'images/puma_meteor.jpg'),
(19, 'mizuno iron', '159.90', 'mizuno', 'images/mizuno-iron.jpg'),
(20, 'mizuno wave', '259.90', 'mizuno', 'images/mizuno-wave.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `qt_produtos` int(11) NOT NULL,
  `preco_total` float NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
