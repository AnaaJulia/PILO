-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.24-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para p.i.l.o
DROP DATABASE IF EXISTS `p.i.l.o`;
CREATE DATABASE IF NOT EXISTS `p.i.l.o` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `p.i.l.o`;

-- Copiando estrutura para tabela p.i.l.o.avaliacao
DROP TABLE IF EXISTS `avaliacao`;
CREATE TABLE IF NOT EXISTS `avaliacao` (
  `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `nota_avaliacao` int(11) NOT NULL,
  `desc_avaliacao` varchar(255) NOT NULL,
  `iduser_cli` int(11) NOT NULL,
  `iduser_lab` int(11) NOT NULL,
  PRIMARY KEY (`id_avaliacao`),
  KEY `iduser_cli` (`iduser_cli`),
  KEY `iduser_lab` (`iduser_lab`),
  CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`iduser_cli`) REFERENCES `user_cli` (`iduser_cli`),
  CONSTRAINT `avaliacao_ibfk_2` FOREIGN KEY (`iduser_lab`) REFERENCES `user_lab` (`iduser_lab`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela p.i.l.o.avaliacao: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `avaliacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `avaliacao` ENABLE KEYS */;

-- Copiando estrutura para tabela p.i.l.o.clinica_odonto
DROP TABLE IF EXISTS `clinica_odonto`;
CREATE TABLE IF NOT EXISTS `clinica_odonto` (
  `id_cli` int(11) NOT NULL AUTO_INCREMENT,
  `cnpj_cli` varchar(18) NOT NULL,
  `nome_cli` varchar(50) NOT NULL,
  `fantasia_cli` varchar(50) NOT NULL,
  `tell_cli` varchar(10) NOT NULL,
  `tell2_cli` varchar(10) DEFAULT NULL,
  `email_cli` varchar(255) NOT NULL,
  `numero_cli` int(11) NOT NULL,
  `complemento_cli` varchar(45) NOT NULL,
  `cep` char(9) NOT NULL,
  PRIMARY KEY (`id_cli`),
  UNIQUE KEY `cnpj_cli` (`cnpj_cli`,`tell_cli`,`tell2_cli`,`email_cli`),
  KEY `cep` (`cep`),
  CONSTRAINT `clinica_odonto_ibfk_1` FOREIGN KEY (`cep`) REFERENCES `localidade` (`cep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela p.i.l.o.clinica_odonto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `clinica_odonto` DISABLE KEYS */;
/*!40000 ALTER TABLE `clinica_odonto` ENABLE KEYS */;

-- Copiando estrutura para tabela p.i.l.o.dentista
DROP TABLE IF EXISTS `dentista`;
CREATE TABLE IF NOT EXISTS `dentista` (
  `id_dentista` int(11) NOT NULL AUTO_INCREMENT,
  `nome_dentista` varchar(45) NOT NULL,
  `tell_dentista` varchar(10) NOT NULL,
  `cpf_dentista` varchar(14) NOT NULL,
  `email_dentista` varchar(255) NOT NULL,
  `cro_dentista` varchar(45) NOT NULL,
  PRIMARY KEY (`id_dentista`),
  UNIQUE KEY `tell_dentista` (`tell_dentista`,`cpf_dentista`,`email_dentista`,`cro_dentista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela p.i.l.o.dentista: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `dentista` DISABLE KEYS */;
/*!40000 ALTER TABLE `dentista` ENABLE KEYS */;

-- Copiando estrutura para tabela p.i.l.o.habilitado
DROP TABLE IF EXISTS `habilitado`;
CREATE TABLE IF NOT EXISTS `habilitado` (
  `id_lab` int(11) NOT NULL,
  `id_tec` int(11) NOT NULL,
  KEY `id_tec` (`id_tec`),
  KEY `id_lab` (`id_lab`),
  CONSTRAINT `habilitado_ibfk_1` FOREIGN KEY (`id_tec`) REFERENCES `tecnologias` (`id_tec`),
  CONSTRAINT `habilitado_ibfk_2` FOREIGN KEY (`id_lab`) REFERENCES `lab_protetico` (`id_lab`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela p.i.l.o.habilitado: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `habilitado` DISABLE KEYS */;
/*!40000 ALTER TABLE `habilitado` ENABLE KEYS */;

-- Copiando estrutura para tabela p.i.l.o.lab_protetico
DROP TABLE IF EXISTS `lab_protetico`;
CREATE TABLE IF NOT EXISTS `lab_protetico` (
  `id_lab` int(11) NOT NULL AUTO_INCREMENT,
  `cnpj_lab` varchar(18) NOT NULL,
  `nome_lab` varchar(50) NOT NULL,
  `fantasia_lab` varchar(50) NOT NULL,
  `tell_lab` varchar(10) NOT NULL,
  `tell2_lab` varchar(10) DEFAULT NULL,
  `email_lab` varchar(255) NOT NULL,
  `numero_lab` int(11) NOT NULL,
  `complemento_lab` varchar(45) NOT NULL,
  `cep` char(9) NOT NULL,
  PRIMARY KEY (`id_lab`),
  UNIQUE KEY `cnpj_lab` (`cnpj_lab`,`tell_lab`,`tell2_lab`,`email_lab`),
  KEY `cep` (`cep`),
  CONSTRAINT `lab_protetico_ibfk_1` FOREIGN KEY (`cep`) REFERENCES `localidade` (`cep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela p.i.l.o.lab_protetico: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `lab_protetico` DISABLE KEYS */;
/*!40000 ALTER TABLE `lab_protetico` ENABLE KEYS */;

-- Copiando estrutura para tabela p.i.l.o.localidade
DROP TABLE IF EXISTS `localidade`;
CREATE TABLE IF NOT EXISTS `localidade` (
  `cep` char(9) NOT NULL,
  `logradouro` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `uf` char(2) NOT NULL,
  PRIMARY KEY (`cep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela p.i.l.o.localidade: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `localidade` DISABLE KEYS */;
/*!40000 ALTER TABLE `localidade` ENABLE KEYS */;

-- Copiando estrutura para tabela p.i.l.o.paciente
DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `id_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_paciente` varchar(45) NOT NULL,
  `tell_paciente` varchar(10) NOT NULL,
  `cpf_paciente` varchar(14) NOT NULL,
  `email_paciente` varchar(255) NOT NULL,
  PRIMARY KEY (`id_paciente`),
  UNIQUE KEY `tell_paciente` (`tell_paciente`,`cpf_paciente`,`email_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela p.i.l.o.paciente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;

-- Copiando estrutura para tabela p.i.l.o.servico
DROP TABLE IF EXISTS `servico`;
CREATE TABLE IF NOT EXISTS `servico` (
  `id_servico` int(11) NOT NULL AUTO_INCREMENT,
  `nome_serv` varchar(45) NOT NULL,
  `data_serv` date NOT NULL,
  `status_serv` varchar(45) NOT NULL,
  `situacao_serv` varchar(45) NOT NULL,
  `orcamento_serv` double NOT NULL,
  `valor_serv` double NOT NULL,
  `valor_acrescimo` double NOT NULL,
  `valor_desconto` double NOT NULL,
  `taxa_entrega` double NOT NULL,
  `obs` varchar(255) NOT NULL,
  `iduser_cli` int(11) NOT NULL,
  `iduser_lab` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_dentista` int(11) NOT NULL,
  PRIMARY KEY (`id_servico`),
  KEY `iduser_cli` (`iduser_cli`),
  KEY `iduser_lab` (`iduser_lab`),
  KEY `id_paciente` (`id_paciente`),
  KEY `id_dentista` (`id_dentista`),
  CONSTRAINT `servico_ibfk_1` FOREIGN KEY (`iduser_cli`) REFERENCES `user_cli` (`iduser_cli`),
  CONSTRAINT `servico_ibfk_2` FOREIGN KEY (`iduser_lab`) REFERENCES `user_lab` (`iduser_lab`),
  CONSTRAINT `servico_ibfk_3` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`),
  CONSTRAINT `servico_ibfk_4` FOREIGN KEY (`id_dentista`) REFERENCES `dentista` (`id_dentista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela p.i.l.o.servico: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `servico` DISABLE KEYS */;
/*!40000 ALTER TABLE `servico` ENABLE KEYS */;

-- Copiando estrutura para tabela p.i.l.o.tecnologias
DROP TABLE IF EXISTS `tecnologias`;
CREATE TABLE IF NOT EXISTS `tecnologias` (
  `id_tec` int(11) NOT NULL AUTO_INCREMENT,
  `nome_tec` varchar(45) NOT NULL,
  `desc_tec` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tec`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela p.i.l.o.tecnologias: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tecnologias` DISABLE KEYS */;
/*!40000 ALTER TABLE `tecnologias` ENABLE KEYS */;

-- Copiando estrutura para tabela p.i.l.o.user_cli
DROP TABLE IF EXISTS `user_cli`;
CREATE TABLE IF NOT EXISTS `user_cli` (
  `iduser_cli` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usercli` varchar(45) NOT NULL,
  `email_usercli` varchar(255) NOT NULL,
  `cpf_usercli` varchar(14) NOT NULL,
  `nivel_usercli` int(11) NOT NULL,
  `id_cli` int(11) NOT NULL,
  PRIMARY KEY (`iduser_cli`),
  UNIQUE KEY `email_usercli` (`email_usercli`,`cpf_usercli`),
  KEY `id_cli` (`id_cli`),
  CONSTRAINT `user_cli_ibfk_1` FOREIGN KEY (`id_cli`) REFERENCES `clinica_odonto` (`id_cli`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela p.i.l.o.user_cli: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `user_cli` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_cli` ENABLE KEYS */;

-- Copiando estrutura para tabela p.i.l.o.user_lab
DROP TABLE IF EXISTS `user_lab`;
CREATE TABLE IF NOT EXISTS `user_lab` (
  `iduser_lab` int(11) NOT NULL AUTO_INCREMENT,
  `nome_userlab` varchar(45) NOT NULL,
  `email_userlab` varchar(255) NOT NULL,
  `cpf_userlab` varchar(14) NOT NULL,
  `nivel_userlab` int(11) NOT NULL,
  `id_lab` int(11) NOT NULL,
  PRIMARY KEY (`iduser_lab`),
  UNIQUE KEY `email_userlab` (`email_userlab`,`cpf_userlab`),
  KEY `id_lab` (`id_lab`),
  CONSTRAINT `user_lab_ibfk_1` FOREIGN KEY (`id_lab`) REFERENCES `lab_protetico` (`id_lab`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela p.i.l.o.user_lab: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `user_lab` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_lab` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
