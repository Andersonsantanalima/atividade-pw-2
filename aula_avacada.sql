-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 14-Set-2022 às 21:39
-- Versão do servidor: 8.0.27
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `aula_avacada`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

DROP TABLE IF EXISTS `imagem`;
CREATE TABLE IF NOT EXISTS `imagem` (
  `link` varchar(100) NOT NULL,
  `fk_usuario_email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`link`),
  KEY `fk_usuario_email` (`fk_usuario_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `imagem`
--

INSERT INTO `imagem` (`link`, `fk_usuario_email`) VALUES
('img/imagenUser1663189656.jpg', 'camargoliveira@gmail.com'),
('img/imagenUser1663189663.jpg', 'camargoliveira@gmail.com'),
('img/imagenUser1663189669.jpg', 'camargoliveira@gmail.com'),
('img/imagenUser1663189677.jpg', 'camargoliveira@gmail.com'),
('img/imagenUser1663189691.jpg', 'camargoliveira@gmail.com'),
('img/imagenUser1663189707.jpg', 'camargoliveira@gmail.com'),
('img/imagenUser1663189750.jpg', 'camargoliveira@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`email`, `senha`, `nome`) VALUES
('camargoliveira@gmail.com', 'aluno123', 'ELITON CAMARGO de Oliveira');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `imagem`
--
ALTER TABLE `imagem`
  ADD CONSTRAINT `imagem_ibfk_1` FOREIGN KEY (`fk_usuario_email`) REFERENCES `usuario` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- DROP PROCEDURE `usuario_Delet`; CREATE DEFINER=`root`@`localhost` PROCEDURE `usuario_Delet`(IN `_email` VARCHAR(100)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER DELETE FROM usuario WHERE usuario.email = _email
-- DROP PROCEDURE `imagem_Delet`; CREATE DEFINER=`root`@`localhost` PROCEDURE `imagem_Delet`(IN `_link` VARCHAR(100)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER DELETE FROM imagem WHERE imagem.link = _link