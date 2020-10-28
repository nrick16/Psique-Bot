-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Out-2020 às 14:12
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
-- Banco de dados: `mysqli_connect`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chatbot_hints`
--

CREATE TABLE `chatbot_hints` (
  `id` int(11) NOT NULL,
  `question` varchar(160) NOT NULL,
  `reply` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `chatbot_hints`
--

INSERT INTO `chatbot_hints` (`id`, `question`, `reply`) VALUES
(1, 'Hi||Hello', 'Hello,how are you?'),
(2, 'How are you||How are you?', 'I\'m fine, thanks. It\'s good to see you'),
(3, 'what is your name||whats your name||what is your name?||whats your name?', 'My name is Psique Bot'),
(4, 'Como você se chama||Como você se chama?||Qual o seu nome||Qual o seu nome?', 'Você pode me chamar de Psique'),
(5, 'Good bye|| Bye||See you later', 'See you next time, bye!'),
(7, 'Oi||Olá', 'Olá, tudo bem? Em que posso ajudar?'),
(8, 'Bom dia', 'Bom dia, tudo bem? Em que posso ajudar?'),
(9, 'Boa tarde', 'Boa tarde, tudo bem? Em que posso ajudar?'),
(10, 'Boa noite', 'Boa noite, tudo bem? Em que posso ajudar?');

-- --------------------------------------------------------

--
-- Estrutura da tabela `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `added_on` date NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `message`
--

INSERT INTO `message` (`id`, `message`, `added_on`, `type`) VALUES
(64, 'oi', '2020-10-15', 'user'),
(65, 'Olá, tudo bem? Em que posso ajudar?', '2020-10-15', 'bot'),
(66, 'tudo bem?', '2020-10-15', 'user'),
(67, 'Sorry not be able to understand you', '2020-10-15', 'bot'),
(68, 'qual o seu nome?', '2020-10-15', 'user'),
(69, 'Você pode me chamar de Psique', '2020-10-15', 'bot'),
(70, 'oi', '2020-10-15', 'user'),
(71, 'Olá, tudo bem? Em que posso ajudar?', '2020-10-15', 'bot');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chatbot_hints`
--
ALTER TABLE `chatbot_hints`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chatbot_hints`
--
ALTER TABLE `chatbot_hints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
