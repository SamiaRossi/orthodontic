-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/11/2024 às 13:57
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_orthodontic`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `sugestao`
--

CREATE TABLE `sugestao` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `sugestao` longtext NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `dt_cadastro` date NOT NULL,
  `qtd_votos` int(11) NOT NULL,
  `situacao` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sugestao`
--

INSERT INTO `sugestao` (`id`, `titulo`, `sugestao`, `id_usuario`, `dt_cadastro`, `qtd_votos`, `situacao`) VALUES
(1, 'Atendimento Personalizado', 'Deixar o atendimento o mais personalizado possível, considerando que o ato de humanizar o atendimento significa deixa-lo o quanto mais individualizado possível', 2, '2024-11-14', 0, 'Pendente'),
(2, 'Sistema Feedback', 'Criar um sistema de Feed-back ou opinião do cliente para que os pacientes tenham a possibilidade de dar sugestões, fazer críticas ou elogios', 2, '2024-11-14', 0, 'Pendente'),
(3, 'Videos e Apresentações', 'Disponibilizar no website da empresa vídeos e apresentações lúdicas orientando sobre os procedimentos dentários para que os pacientes possam ser devidamente informados sobre os procedimentos aos quais serão submetidos', 2, '2024-11-15', 0, 'Pendente'),
(4, 'Agendamento Intuitivo', 'Oferecer aos clientes um sistema de agendamento de consultas online que seja intuitivo', 2, '2024-11-15', 0, 'Pendente'),
(5, 'Ansiedade e Dor', 'Ter o controle da Ansiedade e da Dor dos pacientes como prioridade de nossa Empresa, dando a percepção de que ser tratado em nossa clínica é a melhor escolha', 2, '2024-11-16', 0, 'Pendente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `senha`, `tipo`) VALUES
(1, 'Sâmia Rossi', 'samiarossi@yahoo.com.br', 'Samia1914!', 0),
(2, 'Maria Aparecida', 'solucao_treinamentos@hotmail.com', '234Sa#1', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `votacao`
--

CREATE TABLE `votacao` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_sugestao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `sugestao`
--
ALTER TABLE `sugestao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices de tabela `votacao`
--
ALTER TABLE `votacao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `sugestao`
--
ALTER TABLE `sugestao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `votacao`
--
ALTER TABLE `votacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
