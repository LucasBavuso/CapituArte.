-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 03/02/2023 às 11:13
-- Versão do servidor: 10.4.21-MariaDB
-- Versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdtcc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcategoria`
--

CREATE TABLE `tbcategoria` (
  `idCategoria` int(50) NOT NULL,
  `nomeCategoria` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbcategoria`
--

INSERT INTO `tbcategoria` (`idCategoria`, `nomeCategoria`) VALUES
(1, 'Roupas'),
(2, 'Acessorios'),
(3, 'Maquiagem'),
(4, 'Decoracao'),
(5, 'Pets'),
(6, 'Sapatos'),
(7, 'Personalizados'),
(8, 'Alimentos'),
(9, 'Bebidas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcliente`
--

CREATE TABLE `tbcliente` (
  `idCliente` int(50) NOT NULL,
  `nomeCompleto` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `numeroCasa` int(5) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `complemento` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbformaspgt`
--

CREATE TABLE `tbformaspgt` (
  `idFormaPgt` int(10) NOT NULL,
  `nomeFormaPgt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbformaspgt`
--

INSERT INTO `tbformaspgt` (`idFormaPgt`, `nomeFormaPgt`) VALUES
(1, 'Boleto'),
(2, 'Cartao de credito'),
(3, 'Cartao de debito'),
(4, 'Pix');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbitensvenda`
--

CREATE TABLE `tbitensvenda` (
  `id` int(10) NOT NULL,
  `idVenda` int(10) NOT NULL,
  `idProduto` int(10) NOT NULL,
  `qtd` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbmicroemp`
--

CREATE TABLE `tbmicroemp` (
  `idMicro` int(50) NOT NULL,
  `nomeCompleto` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(10) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `numeroCasa` varchar(10) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `complemento` varchar(11) NOT NULL,
  `chavepix` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbmicroemp`
--

INSERT INTO `tbmicroemp` (`idMicro`, `nomeCompleto`, `email`, `senha`, `cpf`, `telefone`, `cep`, `rua`, `numeroCasa`, `cidade`, `complemento`, `chavepix`) VALUES
(6, 'Ulisses Silva', 'ulisses@gmail.com', '1234', '44444444', '3598875461', '3470021', 'Rua Laeila Rezende', '521', 'Ouro Branco', 'Casa', 'ulisses@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbproduto`
--

CREATE TABLE `tbproduto` (
  `idProduto` int(50) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `preco` varchar(200) NOT NULL,
  `idcategoria` int(50) NOT NULL,
  `idsubcategoria` int(50) NOT NULL,
  `nomeImg` varchar(200) NOT NULL,
  `extensao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbproduto`
--

INSERT INTO `tbproduto` (`idProduto`, `nome`, `descricao`, `preco`, `idcategoria`, `idsubcategoria`, `nomeImg`, `extensao`) VALUES
(13, 'Boneca namoradeira', 'Boneca namoradeira grande', '50,00', 4, 11, '40304243.jpg', 'jpg'),
(14, 'Garrafa colorida', 'Garrafa colorida personalizada', '10,00', 7, 11, '425437137.jpg', 'jpg'),
(15, 'Barquinho de madeira', 'Barquinho de madeira personalizado', '15,00', 7, 11, '254114829.jpeg', 'jpeg'),
(16, 'Bolsa de crochê', 'Bolsa de crochê pequena de ombro', '20,00', 2, 6, '1664697897.jpg', 'jpg'),
(17, 'Biscoito recheado', 'Biscoito artesanal de doce de leite', '5,00', 8, 15, '803081614.jpeg', 'jpeg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbsubcategoria`
--

CREATE TABLE `tbsubcategoria` (
  `idSubCategoria` int(50) NOT NULL,
  `nomeSubCategoria` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbsubcategoria`
--

INSERT INTO `tbsubcategoria` (`idSubCategoria`, `nomeSubCategoria`) VALUES
(1, 'RoupasFemAdulto'),
(2, 'RoupasFemInfantil'),
(3, 'RoupasMascAdulto'),
(4, 'RoupasMascInfantil'),
(5, 'AcessoriosCabeca'),
(6, 'Bolsas'),
(7, 'Oculos'),
(8, 'JoiasEBijus'),
(9, 'MaquiagemOlhos'),
(10, 'MaquiagemRosto'),
(11, 'DecoracaoInteriores'),
(12, 'DecoracaoFestas'),
(13, 'RoupasPets'),
(14, 'AcessoriosPets'),
(15, 'AlimentosPadaria'),
(16, 'AlimentosPote'),
(17, 'BebidasAlcolicas'),
(18, 'BebidasNaoAlcolicas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbvendas`
--

CREATE TABLE `tbvendas` (
  `idVenda` int(10) NOT NULL,
  `totalVenda` varchar(200) NOT NULL,
  `cpfComprador` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbvendas`
--

INSERT INTO `tbvendas` (`idVenda`, `totalVenda`, `cpfComprador`) VALUES
(1, '440', ''),
(2, '40', ''),
(3, '80', ''),
(4, '40', ''),
(5, '40', ''),
(6, '120', ''),
(7, '40', ''),
(8, '65', ''),
(9, '50', ''),
(10, '260', ''),
(11, '250', ''),
(12, '250', ''),
(13, '50', ''),
(14, '110', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbcategoria`
--
ALTER TABLE `tbcategoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Índices de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices de tabela `tbformaspgt`
--
ALTER TABLE `tbformaspgt`
  ADD PRIMARY KEY (`idFormaPgt`);

--
-- Índices de tabela `tbitensvenda`
--
ALTER TABLE `tbitensvenda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idVenda` (`idVenda`),
  ADD KEY `idProduto` (`idProduto`);

--
-- Índices de tabela `tbmicroemp`
--
ALTER TABLE `tbmicroemp`
  ADD PRIMARY KEY (`idMicro`);

--
-- Índices de tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  ADD PRIMARY KEY (`idProduto`),
  ADD KEY `idsubcategoria` (`idsubcategoria`),
  ADD KEY `idcategoria` (`idcategoria`);

--
-- Índices de tabela `tbsubcategoria`
--
ALTER TABLE `tbsubcategoria`
  ADD PRIMARY KEY (`idSubCategoria`);

--
-- Índices de tabela `tbvendas`
--
ALTER TABLE `tbvendas`
  ADD PRIMARY KEY (`idVenda`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `idCliente` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbformaspgt`
--
ALTER TABLE `tbformaspgt`
  MODIFY `idFormaPgt` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbitensvenda`
--
ALTER TABLE `tbitensvenda`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbmicroemp`
--
ALTER TABLE `tbmicroemp`
  MODIFY `idMicro` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  MODIFY `idProduto` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tbsubcategoria`
--
ALTER TABLE `tbsubcategoria`
  MODIFY `idSubCategoria` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tbvendas`
--
ALTER TABLE `tbvendas`
  MODIFY `idVenda` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbitensvenda`
--
ALTER TABLE `tbitensvenda`
  ADD CONSTRAINT `tbitensvenda_ibfk_1` FOREIGN KEY (`idVenda`) REFERENCES `tbvendas` (`idVenda`),
  ADD CONSTRAINT `tbitensvenda_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `tbproduto` (`idProduto`);

--
-- Restrições para tabelas `tbproduto`
--
ALTER TABLE `tbproduto`
  ADD CONSTRAINT `tbproduto_ibfk_1` FOREIGN KEY (`idsubcategoria`) REFERENCES `tbsubcategoria` (`idSubCategoria`),
  ADD CONSTRAINT `tbproduto_ibfk_2` FOREIGN KEY (`idcategoria`) REFERENCES `tbcategoria` (`idCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
