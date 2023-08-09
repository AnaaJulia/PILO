-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.28-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para bd_aboa
DROP DATABASE IF EXISTS `bd_aboa`;
CREATE DATABASE IF NOT EXISTS `bd_aboa` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `bd_aboa`;

-- Copiando estrutura para tabela bd_aboa.avaliacoes
DROP TABLE IF EXISTS `avaliacoes`;
CREATE TABLE IF NOT EXISTS `avaliacoes` (
  `id_aval` int(11) NOT NULL AUTO_INCREMENT,
  `evento_id_eve` int(11) DEFAULT NULL,
  `usuario_id_usu` int(11) DEFAULT NULL,
  `nota_aval` int(11) DEFAULT NULL,
  `comentario_aval` text DEFAULT NULL,
  PRIMARY KEY (`id_aval`),
  KEY `evento_id_eve` (`evento_id_eve`),
  KEY `usuario_id_usu` (`usuario_id_usu`),
  CONSTRAINT `avaliacoes_ibfk_1` FOREIGN KEY (`evento_id_eve`) REFERENCES `eventos` (`id_eve`),
  CONSTRAINT `avaliacoes_ibfk_2` FOREIGN KEY (`usuario_id_usu`) REFERENCES `usuarios` (`id_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela bd_aboa.avaliacoes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `avaliacoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `avaliacoes` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_aboa.categorias
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela bd_aboa.categorias: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_aboa.eventos
DROP TABLE IF EXISTS `eventos`;
CREATE TABLE IF NOT EXISTS `eventos` (
  `id_eve` int(11) NOT NULL AUTO_INCREMENT,
  `nome_eve` varchar(100) DEFAULT NULL,
  `data_eve` date DEFAULT NULL,
  `local_eve` varchar(255) DEFAULT NULL,
  `imagem_eve` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_eve`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela bd_aboa.eventos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_aboa.eventoscategorias
DROP TABLE IF EXISTS `eventoscategorias`;
CREATE TABLE IF NOT EXISTS `eventoscategorias` (
  `id_evc` int(11) NOT NULL AUTO_INCREMENT,
  `evento_id_eve` int(11) DEFAULT NULL,
  `categoria_id_cat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_evc`),
  KEY `evento_id_eve` (`evento_id_eve`),
  KEY `categoria_id_cat` (`categoria_id_cat`),
  CONSTRAINT `eventoscategorias_ibfk_1` FOREIGN KEY (`evento_id_eve`) REFERENCES `eventos` (`id_eve`),
  CONSTRAINT `eventoscategorias_ibfk_2` FOREIGN KEY (`categoria_id_cat`) REFERENCES `categorias` (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela bd_aboa.eventoscategorias: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `eventoscategorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventoscategorias` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_aboa.lembretes
DROP TABLE IF EXISTS `lembretes`;
CREATE TABLE IF NOT EXISTS `lembretes` (
  `id_lemb` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id_usu` int(11) DEFAULT NULL,
  `evento_id_eve` int(11) DEFAULT NULL,
  `data_lemb` date DEFAULT NULL,
  PRIMARY KEY (`id_lemb`),
  KEY `usuario_id_usu` (`usuario_id_usu`),
  KEY `evento_id_eve` (`evento_id_eve`),
  CONSTRAINT `lembretes_ibfk_1` FOREIGN KEY (`usuario_id_usu`) REFERENCES `usuarios` (`id_usu`),
  CONSTRAINT `lembretes_ibfk_2` FOREIGN KEY (`evento_id_eve`) REFERENCES `eventos` (`id_eve`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela bd_aboa.lembretes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `lembretes` DISABLE KEYS */;
/*!40000 ALTER TABLE `lembretes` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_aboa.local
DROP TABLE IF EXISTS `local`;
CREATE TABLE IF NOT EXISTS `local` (
  `cep_loc` varchar(8) NOT NULL,
  `nome_loc` varchar(100) DEFAULT NULL,
  `logradouro_loc` varchar(100) DEFAULT NULL,
  `cidade_loc` varchar(100) DEFAULT NULL,
  `estado_loc` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cep_loc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela bd_aboa.local: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `local` DISABLE KEYS */;
/*!40000 ALTER TABLE `local` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_aboa.presenca
DROP TABLE IF EXISTS `presenca`;
CREATE TABLE IF NOT EXISTS `presenca` (
  `id_pre` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id_usu` int(11) DEFAULT NULL,
  `evento_id_eve` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pre`),
  KEY `usuario_id_usu` (`usuario_id_usu`),
  KEY `evento_id_eve` (`evento_id_eve`),
  CONSTRAINT `presenca_ibfk_1` FOREIGN KEY (`usuario_id_usu`) REFERENCES `usuarios` (`id_usu`),
  CONSTRAINT `presenca_ibfk_2` FOREIGN KEY (`evento_id_eve`) REFERENCES `eventos` (`id_eve`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela bd_aboa.presenca: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `presenca` DISABLE KEYS */;
/*!40000 ALTER TABLE `presenca` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_aboa.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usu` int(11) NOT NULL AUTO_INCREMENT,
  `nivel_usu` enum('1','2','3') DEFAULT NULL,
  `nome_completo_usu` varchar(100) DEFAULT NULL,
  `nome_usuario_usu` varchar(50) DEFAULT NULL,
  `data_nascimento_usu` date DEFAULT NULL,
  `email_usu` varchar(100) DEFAULT NULL,
  `senha_usu` varchar(100) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela bd_aboa.usuarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
REPLACE INTO `usuarios` (`id_usu`, `nivel_usu`, `nome_completo_usu`, `nome_usuario_usu`, `data_nascimento_usu`, `email_usu`, `senha_usu`, `ativo`) VALUES
	(1, '2', 'Rodrigo santos', 'rodrigo', '2023-07-02', 'rodrigo@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
	(2, '1', 'luis', 'luis', '2023-07-02', 'luis@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
