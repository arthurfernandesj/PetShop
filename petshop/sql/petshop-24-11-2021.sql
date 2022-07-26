-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/11/2021 às 20:42
-- Versão do servidor: 10.1.30-MariaDB
-- Versão do PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `petshop`
--

-- --------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `petshop`;
USE petshop;
--
-- Estrutura para tabela `animal`
--

CREATE TABLE `animal` (
  `idanimal` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `categoria` varchar(45) DEFAULT 'Canino' COMMENT 'Canino\nFelino\nAves\nReptéis',
  `peso` float(6,3) DEFAULT '0.000',
  `sexo` char(1) DEFAULT NULL,
  `raca` varchar(45) DEFAULT NULL,
  `usuario_idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `detalhe_pedido`
--

CREATE TABLE `detalhe_pedido` (
  `pedido_idpedido` int(11) NOT NULL,
  `servicoproduto_idservicoproduto` int(11) NOT NULL,
  `valor_unitario` decimal(13,2) DEFAULT '0.00',
  `qtde_item` float(6,3) DEFAULT '0.000',
  `valor_total_item` decimal(13,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `idpedido` int(11) NOT NULL,
  `data_abertura` datetime NOT NULL,
  `forma_pagto` varchar(45) DEFAULT NULL,
  `situacao` varchar(15) DEFAULT 'Aberto' COMMENT 'Aberto, Finalizado ou Cancelado',
  `valor_total` decimal(13,2) DEFAULT '0.00',
  `data_final` datetime DEFAULT NULL,
  `animal_idanimal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicoproduto`
--

CREATE TABLE `servicoproduto` (
  `idservicoproduto` int(11) NOT NULL,
  `categoria` char(7) NOT NULL DEFAULT 'Serviço' COMMENT 'Produto\nServiço',
  `nome` varchar(100) NOT NULL,
  `nomeReduzido` varchar(20) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `imagem` varchar(45) DEFAULT NULL,
  `valor_unitario` decimal(13,2) DEFAULT NULL,
  `qtd_estoque` float(6,3) DEFAULT '1.000' COMMENT 'Para SERVIÇO => qtd_estoque = 1\nPara Produto, informar a quantidade do estoque'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `servicoproduto`
--

INSERT INTO `servicoproduto` (`idservicoproduto`, `categoria`, `nome`, `nomeReduzido`, `codigo`, `imagem`, `valor_unitario`, `qtd_estoque`) VALUES
(1, 'Serviço', 'Banho', 'Banho', '0001', NULL, '35.50', 1.000),
(2, 'Serviço', 'Tosa', 'Tosa', '0002', NULL, '45.80', 1.000),
(3, 'Serviço', 'Transpet', 'Transpet', '0003', NULL, '20.00', 1.000),
(4, 'Produto', 'Coleira', 'Coleira', '399442233', NULL, '12.15', 30.000),
(5, 'Produto', 'Ração X - pct 3,5kg', 'Ração X', '66553333', NULL, '22.44', 10.000),
(6, 'Produto', 'Ração Petchiq - no kg', 'Ração Petchiq', '0004', NULL, '10.00', 60.000);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `perfil` varchar(20) DEFAULT NULL,
  `situacao` char(7) DEFAULT 'Ativo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `email`, `senha`, `telefone`, `endereco`, `perfil`, `situacao`) VALUES
(1, 'JoÃ£o Admin', 'jadmin@gmail.com', '202cb962ac59075b964b07152d234b70', '61 9999-88888', 'QNM 01 CONJ o LOTE 66', 'FuncionÃ¡rio', '0');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`idanimal`),
  ADD KEY `fk_animal_usuario_idx` (`usuario_idusuario`);

--
-- Índices de tabela `detalhe_pedido`
--
ALTER TABLE `detalhe_pedido`
  ADD PRIMARY KEY (`pedido_idpedido`,`servicoproduto_idservicoproduto`),
  ADD KEY `fk_pedido_has_servicoproduto_servicoproduto1_idx` (`servicoproduto_idservicoproduto`),
  ADD KEY `fk_pedido_has_servicoproduto_pedido1_idx` (`pedido_idpedido`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `fk_pedido_animal1_idx` (`animal_idanimal`);

--
-- Índices de tabela `servicoproduto`
--
ALTER TABLE `servicoproduto`
  ADD PRIMARY KEY (`idservicoproduto`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `animal`
--
ALTER TABLE `animal`
  MODIFY `idanimal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servicoproduto`
--
ALTER TABLE `servicoproduto`
  MODIFY `idservicoproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `fk_animal_usuario` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `detalhe_pedido`
--
ALTER TABLE `detalhe_pedido`
  ADD CONSTRAINT `fk_pedido_has_servicoproduto_pedido1` FOREIGN KEY (`pedido_idpedido`) REFERENCES `pedido` (`idpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_has_servicoproduto_servicoproduto1` FOREIGN KEY (`servicoproduto_idservicoproduto`) REFERENCES `servicoproduto` (`idservicoproduto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_animal1` FOREIGN KEY (`animal_idanimal`) REFERENCES `animal` (`idanimal`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
