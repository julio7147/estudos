-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Jul-2025 às 16:51
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dados`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.agenda`
--

CREATE TABLE `tb_admin.agenda` (
  `id` int(11) NOT NULL,
  `tarefa` varchar(255) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tb_admin.agenda`
--

INSERT INTO `tb_admin.agenda` (`id`, `tarefa`, `data`) VALUES
(1, 'Dar comida para o rocky', '2017-10-02'),
(2, 'Ir para academia', '2017-10-02'),
(3, 'Ir ao médico', '2017-10-03'),
(4, 'Outra tarefa', '2017-09-01'),
(5, 'kkk', '2017-09-01'),
(6, 'Minha tarefa dia 02', '2017-10-02'),
(7, 'Outra tarefa', '2017-10-02'),
(8, 'tarefa para o dia 03', '2017-10-03'),
(9, 'Tarefa nova', '2017-10-02'),
(10, 'tarefa 2 para o dia 03', '2017-10-03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.alunos`
--

CREATE TABLE `tb_admin.alunos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tb_admin.alunos`
--

INSERT INTO `tb_admin.alunos` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Guilherme', 'guilhermegrillo.13@gmail.com', '909090');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.aulas`
--

CREATE TABLE `tb_admin.aulas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `modulo_id` int(11) NOT NULL,
  `link_aula` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tb_admin.aulas`
--

INSERT INTO `tb_admin.aulas` (`id`, `nome`, `modulo_id`, `link_aula`) VALUES
(1, 'Conhecendo o HTML', 1, 'http://youtube.com'),
(2, 'Conceitos da web', 1, 'https://www.youtube.com/embed/hVB6dmoyUaU?autoplay=1'),
(3, 'Iniciando projeto', 2, 'http://youtube.com'),
(4, 'Aplicando AJAX', 2, 'https://www.youtube.com/embed/cdT-gYSYO7s');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.chat`
--

CREATE TABLE `tb_admin.chat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mensagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tb_admin.chat`
--

INSERT INTO `tb_admin.chat` (`id`, `user_id`, `mensagem`) VALUES
(1, 1, 'Olá pessoal, tudo certo?\n'),
(2, 1, 'Olá pessoal, tudo bem?\n'),
(3, 1, 'Oi\n'),
(4, 1, 'oi\n'),
(5, 1, 'oi\n'),
(6, 1, 'jiohj\n'),
(7, 1, 'bhiuobui\n'),
(8, 1, 'Olá mundo\n'),
(9, 1, 'Olá mundo\n'),
(10, 1, 'bub\n'),
(11, 1, 'huihui\n'),
(12, 1, 'huih\n'),
(13, 1, 'Olá mundo\n'),
(14, 3, 'Opa, tudo bom?\n'),
(15, 1, 'E ai pessoal\n'),
(16, 1, 'Qual as novidades?\n'),
(17, 3, 'Nada\n'),
(18, 1, 'Olá mundo\n'),
(19, 1, 'kk');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.clientes`
--

CREATE TABLE `tb_admin.clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `cpf_cnpj` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tb_admin.clientes`
--

INSERT INTO `tb_admin.clientes` (`id`, `nome`, `email`, `tipo`, `cpf_cnpj`, `imagem`) VALUES
(1, 'Guilherme', 'gui_grillo1@hotmail.com', 'Admin', '09888181', ''),
(2, 'Joao', 'joao@hotmail.com', 'funcionario', '090909090', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.curso_controle`
--

CREATE TABLE `tb_admin.curso_controle` (
  `id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tb_admin.curso_controle`
--

INSERT INTO `tb_admin.curso_controle` (`id`, `aluno_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.depoimentos`
--

CREATE TABLE `tb_admin.depoimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `depoimento` text NOT NULL,
  `Data` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_admin.depoimentos`
--

INSERT INTO `tb_admin.depoimentos` (`id`, `nome`, `depoimento`, `Data`, `order_id`) VALUES
(15, 'lego', 'agora va go', '22/10/2023', 15),
(16, 'jj', '951259', '05/11/2023', 16),
(17, 'lego', '3', '20/11/202', 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.empreendimentos`
--

CREATE TABLE `tb_admin.empreendimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `preco` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tb_admin.empreendimentos`
--

INSERT INTO `tb_admin.empreendimentos` (`id`, `nome`, `tipo`, `preco`, `imagem`, `slug`, `order_id`) VALUES
(3, 'Teste', 'residencial', '9,00', '59e960c6c520f.jpg', 'teste', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.estoque`
--

CREATE TABLE `tb_admin.estoque` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `largura` int(11) NOT NULL,
  `altura` int(11) NOT NULL,
  `comprimento` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tb_admin.estoque`
--

INSERT INTO `tb_admin.estoque` (`id`, `nome`, `descricao`, `largura`, `altura`, `comprimento`, `peso`, `quantidade`, `preco`) VALUES
(3, 'Curso 1', '.', 0, 0, 0, 0, 0, '900.00'),
(4, 'Curso #2', '.', 0, 0, 0, 0, 0, '200.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.estoque_imagens`
--

CREATE TABLE `tb_admin.estoque_imagens` (
  `id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tb_admin.estoque_imagens`
--

INSERT INTO `tb_admin.estoque_imagens` (`id`, `produto_id`, `imagem`) VALUES
(3, 3, '59fdfeaa0442a.png'),
(4, 4, '59fdfeb6d8188.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.financeiro`
--

CREATE TABLE `tb_admin.financeiro` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `vencimento` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.imagens_imoveis`
--

CREATE TABLE `tb_admin.imagens_imoveis` (
  `id` int(11) NOT NULL,
  `imovel_id` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.imoveis`
--

CREATE TABLE `tb_admin.imoveis` (
  `id` int(11) NOT NULL,
  `empreend_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `area` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.local`
--

CREATE TABLE `tb_admin.local` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_admin.local`
--

INSERT INTO `tb_admin.local` (`id`, `user`, `password`, `img`, `nome`, `cargo`) VALUES
(1, 'admin', '1234', '656890012ee3e.png', 'lego', 2),
(4, 'julio', '1234', 'logo.png', 'julio', 0),
(5, 'lego', '1234', '653e5140c9d1c.png', 'lego', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.modulos`
--

CREATE TABLE `tb_admin.modulos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tb_admin.modulos`
--

INSERT INTO `tb_admin.modulos` (`id`, `nome`) VALUES
(1, 'Introdução e conceitos'),
(2, 'Projeto Prático');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.online`
--

CREATE TABLE `tb_admin.online` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `ultima_acao` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_admin.online`
--

INSERT INTO `tb_admin.online` (`id`, `ip`, `ultima_acao`, `token`) VALUES
(1288, '::1', '2025-06-01 14:03:53', '681f9fed7fa86'),
(1289, '::1', '2025-06-07 16:47:24', '681f9fed7fa86'),
(1290, '::1', '2025-06-07 16:47:45', '681f9fed7fa86'),
(1291, '::1', '2025-06-07 16:47:48', '681f9fed7fa86'),
(1292, '::1', '2025-06-07 16:47:50', '681f9fed7fa86'),
(1293, '::1', '2025-06-07 16:47:52', '681f9fed7fa86'),
(1294, '::1', '2025-06-07 16:47:53', '681f9fed7fa86'),
(1295, '::1', '2025-06-07 16:47:54', '681f9fed7fa86'),
(1296, '::1', '2025-06-07 16:47:58', '681f9fed7fa86'),
(1297, '::1', '2025-06-07 16:53:20', '681f9fed7fa86');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.pedidos`
--

CREATE TABLE `tb_admin.pedidos` (
  `id` int(11) NOT NULL,
  `reference_id` varchar(255) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tb_admin.pedidos`
--

INSERT INTO `tb_admin.pedidos` (`id`, `reference_id`, `produto_id`, `amount`, `status`) VALUES
(13, '59fe42bb254a1', 3, 2, 'pago'),
(14, '59fe42bb254a1', 4, 2, 'pago');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.servicos`
--

CREATE TABLE `tb_admin.servicos` (
  `id` int(11) NOT NULL,
  `servicos` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_admin.servicos`
--

INSERT INTO `tb_admin.servicos` (`id`, `servicos`, `order_id`) VALUES
(1, 'apenas um teste de rotina!', '2'),
(2, 'ola mundo', '3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.slide`
--

CREATE TABLE `tb_admin.slide` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slide` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_admin.slide`
--

INSERT INTO `tb_admin.slide` (`id`, `nome`, `slide`, `order_id`) VALUES
(16, 'lego', '666dc99067148.png', 14),
(17, 'jjjjj', '666dca6db2533.png', 17),
(18, 'jogo3', '666dcb5f91606.png', 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.usuarios`
--

CREATE TABLE `tb_admin.usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tb_admin.usuarios`
--

INSERT INTO `tb_admin.usuarios` (`id`, `user`, `password`, `img`, `nome`, `cargo`) VALUES
(1, 'admin', 'admin', '599ef130dcb41.jpg', 'Guilherme C. Grillo', 2),
(2, 'guigui768', '123456', 'danki_bg.jpg', 'Guilherme C. Grillo', 0),
(3, 'admin2', 'admin', '59cbf2ba67c78.jpg', 'João', 0),
(4, 'guigui769', '909090', '59cbf679da958.jpg', 'Gui', 0),
(5, 'admin3', '909090', '59cbf6f29fa6d.jpg', 'Admin', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.visitas`
--

CREATE TABLE `tb_admin.visitas` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `dia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_admin.visitas`
--

INSERT INTO `tb_admin.visitas` (`id`, `ip`, `dia`) VALUES
(12, '::1', '2023-10-29'),
(13, '::1', '2023-10-29'),
(14, '::1', '2023-11-05'),
(15, '::1', '2023-11-06'),
(16, '::1', '2023-11-20'),
(17, '::1', '2023-11-20'),
(18, '::1', '2023-11-26'),
(19, '::1', '2023-11-30'),
(20, '::1', '2023-12-02'),
(21, '::1', '2023-12-02'),
(22, '::1', '2023-12-04'),
(23, '::1', '2023-12-04'),
(24, '::1', '2023-12-05'),
(25, '::1', '2023-12-05'),
(26, '::1', '2023-12-06'),
(27, '::1', '2023-12-06'),
(28, '::1', '2023-12-08'),
(29, '::1', '2023-12-11'),
(30, '::1', '2023-12-16'),
(31, '::1', '2023-12-18'),
(32, '::1', '2023-12-18'),
(33, '::1', '2023-12-19'),
(34, '::1', '2023-12-21'),
(35, '::1', '2023-12-29'),
(36, '::1', '2024-01-02'),
(37, '::1', '2024-01-06'),
(38, '::1', '2024-01-14'),
(39, '::1', '2024-01-14'),
(40, '::1', '2024-01-23'),
(41, '::1', '2024-01-27'),
(42, '::1', '2024-01-30'),
(43, '::1', '2024-02-04'),
(44, '::1', '2024-02-05'),
(45, '::1', '2024-02-05'),
(46, '::1', '2024-02-06'),
(47, '::1', '2024-02-09'),
(48, '::1', '2024-02-12'),
(49, '::1', '2024-02-13'),
(50, '::1', '2024-02-14'),
(51, '::1', '2024-03-02'),
(52, '::1', '2024-03-03'),
(53, '::1', '2024-03-11'),
(54, '::1', '2024-03-13'),
(55, '::1', '2024-03-16'),
(56, '::1', '2024-03-17'),
(57, '::1', '2024-03-18'),
(58, '::1', '2024-03-31'),
(59, '::1', '2024-04-01'),
(60, '::1', '2024-04-20'),
(61, '::1', '2024-05-03'),
(62, '::1', '2024-05-03'),
(63, '::1', '2024-05-04'),
(64, '::1', '2024-05-06'),
(65, '::1', '2024-05-08'),
(66, '::1', '2024-05-19'),
(67, '::1', '2024-05-19'),
(68, '::1', '2024-05-28'),
(69, '::1', '2024-05-31'),
(70, '::1', '2024-05-31'),
(71, '::1', '2024-06-02'),
(72, '::1', '2024-06-02'),
(73, '::1', '2024-06-02'),
(74, '::1', '2024-06-02'),
(75, '::1', '2024-06-15'),
(76, '::1', '2024-06-29'),
(77, '::1', '2024-06-29'),
(78, '::1', '2024-06-29'),
(79, '::1', '2024-07-06'),
(80, '::1', '2024-07-17'),
(81, '::1', '2024-07-28'),
(82, '::1', '2024-07-29'),
(83, '::1', '2024-08-09'),
(84, '::1', '2024-08-25'),
(85, '::1', '2024-09-01'),
(86, '::1', '2024-09-07'),
(87, '::1', '2024-09-10'),
(88, '::1', '2024-09-14'),
(89, '::1', '2024-09-22'),
(90, '::1', '2024-10-06'),
(91, '::1', '2024-10-19'),
(92, '::1', '2024-10-24'),
(93, '::1', '2024-10-27'),
(94, '::1', '2024-11-03'),
(95, '::1', '2024-11-03'),
(96, '::1', '2024-11-03'),
(97, '::1', '2024-11-03'),
(98, '::1', '2024-11-04'),
(99, '::1', '2025-04-12'),
(100, '::1', '2025-05-02'),
(101, '::1', '2025-05-02'),
(102, '::1', '2025-05-10'),
(103, '::1', '2025-05-24'),
(104, '::1', '2025-05-25'),
(105, '::1', '2025-06-01'),
(106, '::1', '2025-06-01'),
(107, '::1', '2025-06-07'),
(108, '::1', '2025-06-07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site-comentarios`
--

CREATE TABLE `tb_site-comentarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `comentario` int(11) NOT NULL,
  `noticia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.categorias`
--

CREATE TABLE `tb_site.categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_site.categorias`
--

INSERT INTO `tb_site.categorias` (`id`, `nome`, `slug`, `order_id`) VALUES
(1, 'Esportes', 'esportes', 1),
(79, 'mundo', 'mundo', 79);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.config`
--

CREATE TABLE `tb_site.config` (
  `titulo` varchar(255) NOT NULL,
  `nome_autor` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `icone1` varchar(255) NOT NULL,
  `descricao1` text NOT NULL,
  `icone2` varchar(255) NOT NULL,
  `descricao2` text NOT NULL,
  `icone3` varchar(255) NOT NULL,
  `descricao3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_site.config`
--

INSERT INTO `tb_site.config` (`titulo`, `nome_autor`, `descricao`, `icone1`, `descricao1`, `icone2`, `descricao2`, `icone3`, `descricao3`) VALUES
('TORII', 'julio-c', 'ola mundo', '1234', 'A penas um teste para ver se ira funcionar!', 'ola', 'teste dois do projeto', 'mundo', '1234648946+515+'),
('TORII', 'julio-c', 'ola mundo', '1234', 'A penas um teste para ver se ira funcionar!', 'ola', 'teste dois do projeto', 'mundo', '1234648946+515+'),
('TORII', 'julio-c', 'ola mundo', '1234', 'A penas um teste para ver se ira funcionar!', 'ola', 'teste dois do projeto', 'mundo', '1234648946+515+');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.depoimentos`
--

CREATE TABLE `tb_site.depoimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `depoimento` text NOT NULL,
  `data` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.feed`
--

CREATE TABLE `tb_site.feed` (
  `id` int(11) NOT NULL,
  `membro_id` int(11) NOT NULL,
  `post` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tb_site.feed`
--

INSERT INTO `tb_site.feed` (`id`, `membro_id`, `post`) VALUES
(1, 4, 'Show de bola!'),
(2, 6, 'Pensando em alguma coisa'),
(3, 4, 'Blabal'),
(4, 5, 'Oláa pessoal!!!'),
(5, 6, 'daasdwa'),
(6, 6, 'daasdwa'),
(7, 6, 'daasdwa'),
(8, 7, 'asdsadw'),
(9, 7, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.'),
(10, 7, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.membros`
--

CREATE TABLE `tb_site.membros` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tb_site.membros`
--

INSERT INTO `tb_site.membros` (`id`, `nome`, `email`, `senha`, `imagem`) VALUES
(4, 'Guilherme C. Grillo', 'contato@dankicode.com', '909090', '5a00b2f19bae6.jpg'),
(5, 'Fernando Flach', 'fernando@dankicode.com', '909090', '5a00b2fd66863.jpg'),
(6, 'Giusepe Fontanela', 'giu@dankicode.com', '909090', '5a00b309f1c84.jpg'),
(7, 'ola mundo ', 'julio7147@yahoo.com.br', '1234', '66f032fd99570.jpg'),
(8, 'ola mundo ', 'julio7@yahoo.com.br', '1234', '6713f99550e20.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.noticias`
--

CREATE TABLE `tb_site.noticias` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `capa` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_site.noticias`
--

INSERT INTO `tb_site.noticias` (`id`, `categoria_id`, `data`, `titulo`, `conteudo`, `capa`, `slug`, `order_id`) VALUES
(1, 1, '2017-09-08', 'Futebol', '<h2><strong>Ano do mes</strong></h2>\r\n<p>Ol&aacute; mundo</p>', '59b31c00ed5d0.jpg', 'futebol', 1),
(12, 79, '2024-06-02', 'mundo aberto', '<p><img src=\"https://tm.ibxk.com.br/2021/07/14/14113105690190.jpg?ims=750x\" alt=\"Halo Infinite revela mais novidades do multiplayer em v&iacute;deo in&eacute;dito | Voxel\"></p>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '665cee776df33.jfif', 'mundo-aberto', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.servicos`
--

CREATE TABLE `tb_site.servicos` (
  `id` int(11) NOT NULL,
  `servico` text NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.solicitacoes`
--

CREATE TABLE `tb_site.solicitacoes` (
  `id` int(11) NOT NULL,
  `id_from` int(11) NOT NULL,
  `id_to` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_site.solicitacoes`
--

INSERT INTO `tb_site.solicitacoes` (`id`, `id_from`, `id_to`, `status`) VALUES
(6, 7, 4, 1),
(7, 7, 5, 0),
(9, 7, 8, 0),
(10, 5, 4, 0),
(11, 5, 6, 1),
(12, 5, 8, 0),
(13, 6, 4, 0),
(14, 6, 7, 1),
(15, 6, 8, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_admin.depoimentos`
--
ALTER TABLE `tb_admin.depoimentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.local`
--
ALTER TABLE `tb_admin.local`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.servicos`
--
ALTER TABLE `tb_admin.servicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.slide`
--
ALTER TABLE `tb_admin.slide`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site-comentarios`
--
ALTER TABLE `tb_site-comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.categorias`
--
ALTER TABLE `tb_site.categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.depoimentos`
--
ALTER TABLE `tb_site.depoimentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.feed`
--
ALTER TABLE `tb_site.feed`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.membros`
--
ALTER TABLE `tb_site.membros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.noticias`
--
ALTER TABLE `tb_site.noticias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.solicitacoes`
--
ALTER TABLE `tb_site.solicitacoes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin.depoimentos`
--
ALTER TABLE `tb_admin.depoimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tb_admin.local`
--
ALTER TABLE `tb_admin.local`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1298;

--
-- AUTO_INCREMENT de tabela `tb_admin.servicos`
--
ALTER TABLE `tb_admin.servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_admin.slide`
--
ALTER TABLE `tb_admin.slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de tabela `tb_site-comentarios`
--
ALTER TABLE `tb_site-comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_site.categorias`
--
ALTER TABLE `tb_site.categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de tabela `tb_site.feed`
--
ALTER TABLE `tb_site.feed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_site.membros`
--
ALTER TABLE `tb_site.membros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tb_site.noticias`
--
ALTER TABLE `tb_site.noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb_site.solicitacoes`
--
ALTER TABLE `tb_site.solicitacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
