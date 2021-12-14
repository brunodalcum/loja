-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Dez-2021 às 01:34
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL,
  `categoria_pai_id` int(11) DEFAULT NULL,
  `categoria_nome` varchar(45) NOT NULL,
  `categoria_ativa` tinyint(1) DEFAULT NULL,
  `categoria_meta_link` varchar(100) DEFAULT NULL,
  `categoria_data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `categoria_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `categoria_pai_id`, `categoria_nome`, `categoria_ativa`, `categoria_meta_link`, `categoria_data_criacao`, `categoria_data_alteracao`) VALUES
(1, 1, 'Cintas', 1, 'cintas', '2021-11-29 21:47:15', '2021-11-30 14:34:04'),
(2, 5, 'Gel Redutor', 1, 'gel-redutor', '2021-11-29 21:48:08', '2021-11-30 14:34:12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias_pai`
--

CREATE TABLE `categorias_pai` (
  `categoria_pai_id` int(11) NOT NULL,
  `categoria_pai_nome` varchar(45) NOT NULL,
  `categoria_pai_ativa` tinyint(1) DEFAULT NULL,
  `categoria_pai_meta_link` varchar(100) DEFAULT NULL,
  `categoria_pai_data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `categoria_pai_data_alteracao` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias_pai`
--

INSERT INTO `categorias_pai` (`categoria_pai_id`, `categoria_pai_nome`, `categoria_pai_ativa`, `categoria_pai_meta_link`, `categoria_pai_data_criacao`, `categoria_pai_data_alteracao`) VALUES
(1, 'Omega-5', 1, 'omega-5', '2021-11-30 00:17:10', '2021-11-30 00:17:10'),
(2, 'Albumina', 1, 'albumina', '2021-11-30 01:50:02', '2021-11-30 01:50:02'),
(5, 'Suplementos', 1, 'suplementos', '2021-11-30 01:57:46', '2021-11-30 01:57:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

CREATE TABLE `marcas` (
  `marca_id` int(11) NOT NULL,
  `marca_nome` varchar(45) NOT NULL,
  `marca_meta_link` varchar(255) NOT NULL,
  `marca_ativa` tinyint(1) DEFAULT NULL,
  `marca_data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `marca_data_alteracao` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `marcas` (`marca_id`, `marca_nome`, `marca_meta_link`, `marca_ativa`, `marca_data_criacao`, `marca_data_alteracao`) VALUES
(1, 'Takecare-master', 'takecare-master', 1, '2021-11-29 02:33:31', '2021-11-29 20:34:34'),
(2, 'Integral Médica', 'integral-medica', 1, '2021-11-29 14:32:23', NULL),
(3, 'Dspay-dois', 'dspay-dois', 1, '2021-11-29 20:58:28', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `produto_id` int(11) NOT NULL,
  `produto_codigo` varchar(45) DEFAULT NULL,
  `produto_data_cadastro` timestamp NULL DEFAULT current_timestamp(),
  `produto_categoria_id` int(11) DEFAULT NULL,
  `produto_marca_id` int(11) DEFAULT NULL,
  `produto_nome` varchar(255) DEFAULT NULL,
  `produto_meta_link` varchar(255) DEFAULT NULL,
  `produto_peso` int(11) DEFAULT 0,
  `produto_altura` int(11) DEFAULT 0,
  `produto_largura` int(11) DEFAULT 0,
  `produto_comprimento` int(11) DEFAULT 0,
  `produto_valor` varchar(45) DEFAULT NULL,
  `produto_destaque` tinyint(1) DEFAULT NULL,
  `produto_controlar_estoque` tinyint(1) DEFAULT NULL,
  `produto_quantidade_estoque` int(11) DEFAULT 0,
  `produto_ativo` tinyint(1) DEFAULT NULL,
  `produto_resumo` longtext NOT NULL,
  `produto_descricao` longtext DEFAULT NULL,
  `produto_data_alteracao` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`produto_id`, `produto_codigo`, `produto_data_cadastro`, `produto_categoria_id`, `produto_marca_id`, `produto_nome`, `produto_meta_link`, `produto_peso`, `produto_altura`, `produto_largura`, `produto_comprimento`, `produto_valor`, `produto_destaque`, `produto_controlar_estoque`, `produto_quantidade_estoque`, `produto_ativo`, `produto_resumo`, `produto_descricao`, `produto_data_alteracao`) VALUES
(1, '12345678', '2021-11-30 17:00:59', 1, 1, 'ômega 5', 'omega-5', 1, 10, 10, 10, '25', 1, 1, 10, 1, 'CÁLCIO + VITAMINA D - 60 CÁPSULAS - 1.000 MG\r\n\r\n \r\n\r\nO que é?: suplemento vitamínico mineral à base de cálcio e vitamina D em cápsulas.\r\n\r\n \r\n\r\nCálcio: mineral essencial para a construção e manutenção dos ossos e dos dentes, coagulação sanguínea, ativação de enzimas, condução de impulsos nervosos e contração muscular.\r\n\r\n \r\n\r\nVitamina D: conhecida como a vitamina do sol, é muito importante para o corpo humano. Além de suas funções mais conhecidas relacionadas à saúde dos ossos, é responsável também por outras atividades, trabalhando como reguladora do crescimento, sistema imunológico, cardiovascular, músculos, metabolismo e insulina.\r\n\r\n', 'Beneficios:\r\n\r\n- A vitamina D e o Cálcio auxiliam na formação de ossos e dentes.\r\n\r\n- A vitamina D auxilia na absorção de cálcio e fosforo.\r\n\r\n- A vitamina D auxilia no funcionamento do sistema imune.\r\n\r\n- A vitamina D e o Cálcio auxiliam no funcionamento muscular.\r\n\r\n- A vitamina D auxilia na manutenção dos níveis de cálcio no sangue.\r\n\r\n- A vitamina D e o Cálcio auxiliam no processo de divisão celular.\r\n\r\n- O Cálcio auxilia na coagulação do sangue.\r\n\r\n- O Cálcio auxilia no metabolismo energético.\r\n\r\n \r\n\r\nIngredientes: Cálcio, vitamina D.\r\nCápsula: gelatina, água purificada e umectante (glicerina)\r\n\r\n(NÃO CONTÉM GLÚTEN)\r\n\r\n \r\n\r\nRecomendação diaria: ingerir 1 (uma) cápsula 2 (duas) vezes ao dia, preferencialmente antes da principal refeição.\r\n\r\n \r\n\r\nTabela Nutricional:\r\n\r\nInformação nutricional: \r\nPorção de 2 g (2 cápsulas)\r\n\r\nQuantidade por porção\r\n\r\n% VD (*)\r\n\r\nValor energético\r\n\r\n0 Kcal = 0 KJ\r\n\r\n0 %\r\n\r\nCálcio\r\n\r\n700 mg\r\n\r\n70 %\r\n\r\nVitamina D', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_fotos`
--

CREATE TABLE `produtos_fotos` (
  `foto_id` int(11) NOT NULL,
  `foto_produto_id` int(11) DEFAULT NULL,
  `foto_caminho` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sistema`
--

CREATE TABLE `sistema` (
  `sistema_id` int(11) NOT NULL,
  `sistema_razao_social` varchar(145) DEFAULT NULL,
  `sistema_nome_fantasia` varchar(145) DEFAULT NULL,
  `sistema_cnpj` varchar(25) DEFAULT NULL,
  `sistema_ie` varchar(25) DEFAULT NULL,
  `sistema_telefone_fixo` varchar(25) DEFAULT NULL,
  `sistema_telefone_movel` varchar(25) NOT NULL,
  `sistema_email` varchar(100) DEFAULT NULL,
  `sistema_site_url` varchar(100) DEFAULT NULL,
  `sistema_cep` varchar(25) DEFAULT NULL,
  `sistema_endereco` varchar(145) DEFAULT NULL,
  `sistema_numero` varchar(25) DEFAULT NULL,
  `sistema_cidade` varchar(45) DEFAULT NULL,
  `sistema_estado` varchar(2) DEFAULT NULL,
  `sistema_produtos_destaques` int(11) NOT NULL,
  `sistema_texto` tinytext DEFAULT NULL,
  `sistema_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sistema`
--

INSERT INTO `sistema` (`sistema_id`, `sistema_razao_social`, `sistema_nome_fantasia`, `sistema_cnpj`, `sistema_ie`, `sistema_telefone_fixo`, `sistema_telefone_movel`, `sistema_email`, `sistema_site_url`, `sistema_cep`, `sistema_endereco`, `sistema_numero`, `sistema_cidade`, `sistema_estado`, `sistema_produtos_destaques`, `sistema_texto`, `sistema_data_alteracao`) VALUES
(1, 'Neto Suplementos', 'Vende tudo!', '80.838.809/0001-26', '683.90228-49', '(41) 3232-3030', '(41) 9999-9999', 'vendetudo@contato.com.br', 'http://vendetudo.com.br', '80510-000', 'Rua da Programação', '54', 'Curitiba', 'PR', 6, 'Preço e qualidade!', '2021-11-29 02:24:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$10$IjcgjWHuk6K.bJ1PFvbTu.0Yii3yH6KYbuS.KjmYkgfBkKGuuruTm', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1639437965, 1, 'Bruno', 'Dalcum', 'ADMIN', '0'),
(2, '::1', 'brunodalcum@gmail.com', '$2y$10$D5qtZhv6Z/iST04GYLbexO.LzCJ1HxErc7XaMi5XZSn/gvPYL8OAa', 'brunodalcum@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1638067580, NULL, 1, 'BRUNO', '01733120556', NULL, NULL),
(4, '::1', NULL, '$2y$10$rh5iY4nrkwrE4A6DE.OkiuOzVZDFdoFP.w8qzrwbFYHqVK1puBod.', 'maria@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1638068880, NULL, 1, 'MARIA EDILEUZA VICENTE', 'SILVA', NULL, NULL),
(5, '::1', NULL, '$2y$10$xVPISxixzdaCoOFYqO2CHOp8sgWqVL1Kq6ms8lghB5NM3mV.HI9ZW', 'mariannacharpinel@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1638069142, NULL, 1, NULL, NULL, NULL, NULL),
(6, '::1', 'malveira', '$2y$10$HStvSKRon.zULRAZOZBRC.6iX/r.q5T0.Xp7RyX0FAcgpmGO1JNv6', 'malveira.ricardo@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1638069386, NULL, 1, 'RICARDO DE', 'MALVEIRA', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(6, 1, 1),
(9, 2, 1),
(11, 4, 1),
(12, 5, 2),
(13, 6, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`),
  ADD KEY `categoria_pai_id` (`categoria_pai_id`);

--
-- Índices para tabela `categorias_pai`
--
ALTER TABLE `categorias_pai`
  ADD PRIMARY KEY (`categoria_pai_id`);

--
-- Índices para tabela `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`marca_id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`produto_id`),
  ADD KEY `produto_categoria_id` (`produto_categoria_id`),
  ADD KEY `produto_marca_id` (`produto_marca_id`);

--
-- Índices para tabela `produtos_fotos`
--
ALTER TABLE `produtos_fotos`
  ADD PRIMARY KEY (`foto_id`),
  ADD KEY `fk_foto_produto_id` (`foto_produto_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Índices para tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `categorias_pai`
--
ALTER TABLE `categorias_pai`
  MODIFY `categoria_pai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `marca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `produto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produtos_fotos`
--
ALTER TABLE `produtos_fotos`
  MODIFY `foto_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `fk_categoria_pai_id` FOREIGN KEY (`categoria_pai_id`) REFERENCES `categorias_pai` (`categoria_pai_id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `produtos_fotos`
--
ALTER TABLE `produtos_fotos`
  ADD CONSTRAINT `fk_foto_produto_id` FOREIGN KEY (`foto_produto_id`) REFERENCES `produtos` (`produto_id`);

--
-- Limitadores para a tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
