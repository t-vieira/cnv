-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.24-log
-- Versão do PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `db_cnv`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_cidades`
--

CREATE TABLE IF NOT EXISTS `tab_cidades` (
  `id_cidade` int(11) NOT NULL AUTO_INCREMENT,
  `cidade` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_cidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=130 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_cnv`
--

CREATE TABLE IF NOT EXISTS `tab_cnv` (
  `id_colab` int(11) NOT NULL AUTO_INCREMENT,
  `num_drt` int(11) NOT NULL,
  `nome_colab` varchar(255) NOT NULL,
  `num_cidade` int(11) NOT NULL,
  `venc_cnv` date NOT NULL,
  `dt_env_colab` date NOT NULL,
  `dt_env_sp` date NOT NULL,
  `dt_entr_sind` date NOT NULL,
  `protocolo` varchar(255) NOT NULL,
  `ativo` int(11) NOT NULL,
  PRIMARY KEY (`id_colab`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=363 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_docfaltantes`
--

CREATE TABLE IF NOT EXISTS `tab_docfaltantes` (
  `id_faltantes` int(11) NOT NULL AUTO_INCREMENT,
  `id_colaborador` int(11) NOT NULL,
  `str_doc_faltantes` varchar(255) NOT NULL,
  `dt_env_faltantes` date NOT NULL,
  PRIMARY KEY (`id_faltantes`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
