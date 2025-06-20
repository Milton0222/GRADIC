-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- SO do servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- A despejar estrutura da base de dados para investigacaodb
CREATE DATABASE IF NOT EXISTS `investigacaodb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `investigacaodb`;

-- A despejar estrutura para tabela investigacaodb.dados
CREATE TABLE IF NOT EXISTS `dados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` text,
  `opniao` text,
  `numero` int DEFAULT NULL,
  `estatistica` int DEFAULT NULL,
  `perguntas_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `perguntas_id` (`perguntas_id`),
  CONSTRAINT `dados_ibfk_1` FOREIGN KEY (`perguntas_id`) REFERENCES `perguntas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela investigacaodb.dados: ~3 rows (aproximadamente)
INSERT INTO `dados` (`id`, `descricao`, `opniao`, `numero`, `estatistica`, `perguntas_id`) VALUES
	(2, 'Processo  de levantar os detalhes de um sistema.', 'Fase inicial no desenvolvimento de um sistema.', 2, NULL, 4),
	(3, 'kkkkkkkkkkkkkkkkkk', 'uihuhiuhiuhihi', 77, NULL, 4),
	(5, 'Estudar logica de programação', 'Requisito necessário para ser um bom programador', 1, NULL, 7);

-- A despejar estrutura para tabela investigacaodb.perguntas
CREATE TABLE IF NOT EXISTS `perguntas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `pesquisa_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pesquisa_id` (`pesquisa_id`),
  CONSTRAINT `perguntas_ibfk_1` FOREIGN KEY (`pesquisa_id`) REFERENCES `pesquisas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela investigacaodb.perguntas: ~4 rows (aproximadamente)
INSERT INTO `perguntas` (`id`, `nome`, `pesquisa_id`) VALUES
	(3, 'Analisar e desenhar o sistema.', 3),
	(4, 'Fazer o levantamento de requisitos.', 4),
	(5, 'Qual é a importância das IA na sociedade?', 5),
	(6, 'IA pode ou não substituir a força humana?', 5),
	(7, 'Qual é os fundamentos da  programação web', 6);

-- A despejar estrutura para tabela investigacaodb.pesquisas
CREATE TABLE IF NOT EXISTS `pesquisas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tema` text NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `objectivo` text,
  `ploblematica` text,
  `user_id` int NOT NULL,
  `dataregistro` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `pesquisas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `utilizadores` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela investigacaodb.pesquisas: ~2 rows (aproximadamente)
INSERT INTO `pesquisas` (`id`, `tema`, `tipo`, `objectivo`, `ploblematica`, `user_id`, `dataregistro`) VALUES
	(3, 'O impacto das TIC na educação', 'Qualitativa', 'Implementação das tics na educação para melhorar o ensino', 'Défice em acompanhar a evolução tecnológica em seles.', 2, '2025-06-18'),
	(4, 'Sistema informático de gestão de inscrição', 'Qualitativa', 'Desenvolver um sistema informático que maximiza a gestão de inscrição no IP.', 'A dificuldade durante analise e tomada de decisão no IP', 2, '2025-06-18'),
	(5, 'Inteligência Artificial', 'Qualitativa', 'Como a IA pode impactar o teu dia a dia.', 'IA como fator no desenvolvimento social', 2, '2025-06-18'),
	(6, 'Programação web', 'Qualitativa', 'Desenvolver aspectos fundamentais', 'ppppppppaakajjan', 2, '2025-06-19');

-- A despejar estrutura para tabela investigacaodb.utilizadores
CREATE TABLE IF NOT EXISTS `utilizadores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `tipo` enum('admin','investigador') NOT NULL,
  `senha` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela investigacaodb.utilizadores: ~3 rows (aproximadamente)
INSERT INTO `utilizadores` (`id`, `nome`, `userName`, `tipo`, `senha`) VALUES
	(2, 'Milton Francisc', 'francimilton43@gmail.com', 'investigador', '12345'),
	(3, 'Fatima  Francisco', 'matar2024@gmail.com', 'investigador', '123456789');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
