-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Dez-2020 às 20:29
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto01`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin_online`
--

CREATE TABLE `tb_admin_online` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `ultima_acao` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin_usuarios`
--

CREATE TABLE `tb_admin_usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_admin_usuarios`
--

INSERT INTO `tb_admin_usuarios` (`id`, `user`, `password`, `img`, `nome`, `cargo`) VALUES
(1, 'admin', 'admin', '5fb8984ae7f33.jpg', 'Ivan T. Acioli', 2),
(2, 'guigui769', 'teste', '5fb8980728ea2.jpg', 'Lucas', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin_visitas`
--

CREATE TABLE `tb_admin_visitas` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `dia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_admin_visitas`
--

INSERT INTO `tb_admin_visitas` (`id`, `ip`, `dia`) VALUES
(5, '::1', '2020-11-13'),
(6, '::1', '2020-11-13'),
(7, '::1', '2020-11-13'),
(8, '::1', '2020-11-13'),
(9, '::1', '2020-11-13'),
(10, '192.168.02', '2020-11-12'),
(11, '192.168.02', '2020-11-12'),
(12, '::1', '2020-11-16'),
(13, '::1', '2020-11-18'),
(14, '::1', '2020-11-20'),
(15, '::1', '2020-11-24'),
(16, '::1', '2020-11-25'),
(17, '::1', '2020-11-25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site_depoimentos`
--

CREATE TABLE `tb_site_depoimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `depoimentos` text NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_site_depoimentos`
--

INSERT INTO `tb_site_depoimentos` (`id`, `nome`, `depoimentos`, `data`) VALUES
(1, 'Ivan', 'Testo texte para depoimentos do site ve se pega agora', ''),
(2, 'Ivan Teotonio', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', ''),
(3, 'João', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', ''),
(4, 'Ana Joaquina', 'ontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonoru', '25/11/2020');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_admin_online`
--
ALTER TABLE `tb_admin_online`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin_usuarios`
--
ALTER TABLE `tb_admin_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin_visitas`
--
ALTER TABLE `tb_admin_visitas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site_depoimentos`
--
ALTER TABLE `tb_site_depoimentos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin_online`
--
ALTER TABLE `tb_admin_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `tb_admin_usuarios`
--
ALTER TABLE `tb_admin_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_admin_visitas`
--
ALTER TABLE `tb_admin_visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tb_site_depoimentos`
--
ALTER TABLE `tb_site_depoimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
