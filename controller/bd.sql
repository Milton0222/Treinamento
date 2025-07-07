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


-- A despejar estrutura da base de dados para gtarefasbd
DROP DATABASE IF EXISTS `gtarefasbd`;
CREATE DATABASE IF NOT EXISTS `gtarefasbd` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `gtarefasbd`;

-- A despejar estrutura para tabela gtarefasbd.empresas
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `designacao` varchar(50) NOT NULL,
  `contacto` int NOT NULL,
  `responsavel` int NOT NULL,
  `objectivo` text,
  `nif` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `responsavel` (`responsavel`),
  CONSTRAINT `empresas_ibfk_1` FOREIGN KEY (`responsavel`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela gtarefasbd.empresas: ~1 rows (aproximadamente)
INSERT INTO `empresas` (`id`, `designacao`, `contacto`, `responsavel`, `objectivo`, `nif`) VALUES
	(1, 'KIZALU SOFT', 937743489, 3, 'Soluções tecnologicas.', 5001816);

-- A despejar estrutura para tabela gtarefasbd.grupos
CREATE TABLE IF NOT EXISTS `grupos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `designacao` varchar(100) NOT NULL,
  `qtdPessoal` int DEFAULT '1',
  `projeto_id` int NOT NULL,
  `supervisor` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `projeto_id` (`projeto_id`),
  KEY `users_FK2` (`supervisor`),
  CONSTRAINT `grupos_ibfk_1` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `users_FK2` FOREIGN KEY (`supervisor`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela gtarefasbd.grupos: ~4 rows (aproximadamente)
INSERT INTO `grupos` (`id`, `designacao`, `qtdPessoal`, `projeto_id`, `supervisor`) VALUES
	(6, 'HOMEKIZALU', 5, 11, 7),
	(7, 'Alfa', 7, 11, 6),
	(8, 'Enter', 5, 0, 6),
	(9, 'KSSUMBE', 3, 12, 7);

-- A despejar estrutura para tabela gtarefasbd.grupo_pessoal
CREATE TABLE IF NOT EXISTS `grupo_pessoal` (
  `grupo` int NOT NULL,
  `pessoa_id` int NOT NULL,
  `datar` date NOT NULL,
  PRIMARY KEY (`grupo`,`pessoa_id`),
  KEY `pessoa_id` (`pessoa_id`),
  CONSTRAINT `grupo_pessoal_ibfk_1` FOREIGN KEY (`grupo`) REFERENCES `grupos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `grupo_pessoal_ibfk_2` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoal` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela gtarefasbd.grupo_pessoal: ~7 rows (aproximadamente)
INSERT INTO `grupo_pessoal` (`grupo`, `pessoa_id`, `datar`) VALUES
	(6, 1, '2025-05-28'),
	(6, 5, '2025-05-17'),
	(7, 1, '2025-05-21'),
	(7, 5, '2025-05-04'),
	(8, 6, '2025-05-28'),
	(8, 8, '2025-05-28'),
	(9, 6, '2025-05-29');

-- A despejar estrutura para tabela gtarefasbd.pessoal
CREATE TABLE IF NOT EXISTS `pessoal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `funcao` enum('tecnico','supervisor','gestor') NOT NULL,
  `contacto` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela gtarefasbd.pessoal: ~5 rows (aproximadamente)
INSERT INTO `pessoal` (`id`, `nome`, `funcao`, `contacto`) VALUES
	(1, 'Nelson Francisco', 'tecnico', 923456341),
	(4, 'Manuel Pedro', 'gestor', 999999999),
	(5, 'Berta Santos', 'tecnico', 994566771),
	(6, 'Marta Pedro', 'tecnico', 954321398),
	(8, 'José Santos', 'tecnico', 924562341);

-- A despejar estrutura para tabela gtarefasbd.pessoal_tarefas
CREATE TABLE IF NOT EXISTS `pessoal_tarefas` (
  `pessoa_id` int NOT NULL,
  `tarefa_id` int NOT NULL,
  `data_atribuicao` date NOT NULL,
  PRIMARY KEY (`pessoa_id`,`tarefa_id`),
  KEY `tarefa_id` (`tarefa_id`),
  CONSTRAINT `pessoal_tarefas_ibfk_1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoal` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pessoal_tarefas_ibfk_2` FOREIGN KEY (`tarefa_id`) REFERENCES `tarefas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela gtarefasbd.pessoal_tarefas: ~4 rows (aproximadamente)
INSERT INTO `pessoal_tarefas` (`pessoa_id`, `tarefa_id`, `data_atribuicao`) VALUES
	(1, 9, '2025-05-13'),
	(5, 3, '2025-05-28'),
	(6, 10, '2025-05-29'),
	(8, 8, '2025-05-14');

-- A despejar estrutura para tabela gtarefasbd.projetos
CREATE TABLE IF NOT EXISTS `projetos` (
  `id` int NOT NULL,
  `designacao` varchar(100) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_conclusao` date NOT NULL,
  `descricao` text,
  `duracao` int DEFAULT '2',
  `empresa_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `empresa_id` (`empresa_id`),
  CONSTRAINT `projetos_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela gtarefasbd.projetos: ~5 rows (aproximadamente)
INSERT INTO `projetos` (`id`, `designacao`, `data_inicio`, `data_conclusao`, `descricao`, `duracao`, `empresa_id`) VALUES
	(0, 'GRH1.9', '2024-12-15', '2025-05-22', 'Desenvolvimento de uma plataforma de gestão de recursos humanos.', 3, 1),
	(2, 'PGOC 1.0', '2025-05-07', '2025-07-24', 'Plataforma de gestão de ocorrência', 2, 1),
	(3, 'KItanda Home', '2025-05-05', '2025-06-04', 'E comerce', 2, 1),
	(11, 'Gtarefas', '2025-05-22', '2025-06-18', 'Automatização de tarefas de umaa startup.', 3, 1),
	(12, 'ERP KS', '2025-06-05', '2026-04-01', 'Solução  inovadoras.', 12, 1);

-- A despejar estrutura para tabela gtarefasbd.tarefas
CREATE TABLE IF NOT EXISTS `tarefas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `designacao` varchar(100) NOT NULL,
  `estado` enum('Fazendo','Feito','Pendente') NOT NULL,
  `data_inicio` date NOT NULL,
  `data_conclusao` date NOT NULL,
  `id_projeto` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_projeto` (`id_projeto`),
  CONSTRAINT `tarefas_ibfk_1` FOREIGN KEY (`id_projeto`) REFERENCES `projetos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela gtarefasbd.tarefas: ~5 rows (aproximadamente)
INSERT INTO `tarefas` (`id`, `designacao`, `estado`, `data_inicio`, `data_conclusao`, `id_projeto`) VALUES
	(3, 'Criar as regras de negocio', 'Feito', '2025-05-07', '2025-05-31', 11),
	(4, 'Criar os metodos update e destroy', 'Feito', '2025-05-07', '2025-05-31', 0),
	(8, 'Criar o crud', 'Pendente', '2025-05-26', '2025-06-04', 0),
	(9, 'Criar os diagramas de actividade', 'Feito', '2025-05-04', '2025-06-07', 11),
	(10, 'Criar tela de login', 'Fazendo', '2025-05-12', '2025-06-07', 12);

-- A despejar estrutura para tabela gtarefasbd.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL,
  `passwords` varchar(255) NOT NULL,
  `tipo` enum('admin','tecnico','supervisor') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- A despejar dados para tabela gtarefasbd.users: ~9 rows (aproximadamente)
INSERT INTO `users` (`id`, `userName`, `passwords`, `tipo`) VALUES
	(3, 'kizalusoft@gmail.com', '12345', 'admin'),
	(4, 'Maria Francisco', 'maria2025@11', 'supervisor'),
	(5, 'Nelson Francisco', '1234-2025', 'tecnico'),
	(6, 'Milton Augusto', '1234-2025', 'supervisor'),
	(7, 'Adriano Francisco', '1234-2025', 'supervisor'),
	(8, 'Manuel Pedro', '1234-2025', 'admin'),
	(9, 'Berta Santos', '1234-2025', 'tecnico'),
	(10, 'Marta Pedro', '1234-2025', 'tecnico'),
	(12, 'José Santos', '1234-2025', 'tecnico');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
