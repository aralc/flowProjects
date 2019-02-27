-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: NetServiceFlow
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB-0+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbAprovacaoDocumento`
--

DROP TABLE IF EXISTS `tbAprovacaoDocumento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbAprovacaoDocumento` (
  `IdRequisicao` int(11) NOT NULL,
  `CodigoEmpresa` int(4) NOT NULL,
  `CodigoLocal` int(4) NOT NULL,
  `Sequencia` int(4) NOT NULL,
  `CodigoProduto` varchar(10) NOT NULL,
  `DataAprovacao` date NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `TipoDocumento` char(1) DEFAULT NULL,
  `UsuarioAprovador` varchar(50) NOT NULL,
  `UsuarioRequisitante` varchar(50) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`IdRequisicao`,`CodigoEmpresa`,`CodigoLocal`,`Sequencia`),
  KEY `fk_ap_Requisicao_empresa` (`CodigoEmpresa`),
  KEY `fk_ap_Requisicao_usuario` (`UsuarioAprovador`),
  KEY `fk_ap_Requisicao_local` (`CodigoLocal`),
  CONSTRAINT `fk_ap_Requisicao_empresa` FOREIGN KEY (`CodigoEmpresa`) REFERENCES `tbEmpresa` (`Codigo`),
  CONSTRAINT `fk_ap_Requisicao_local` FOREIGN KEY (`CodigoLocal`) REFERENCES `tbLocal` (`Codigo`),
  CONSTRAINT `fk_ap_Requisicao_usuario` FOREIGN KEY (`UsuarioAprovador`) REFERENCES `tbUsuario` (`Login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbCliente`
--

DROP TABLE IF EXISTS `tbCliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbCliente` (
  `id` int(4) NOT NULL,
  `CodigoEmpresa` int(4) NOT NULL,
  `CodigoLocal` int(4) NOT NULL,
  `Nome` char(60) NOT NULL,
  `Cnpj` char(14) NOT NULL,
  `Endereco` char(30) DEFAULT NULL,
  `Bairro` char(20) DEFAULT NULL,
  `Cep` char(20) DEFAULT NULL,
  `Contato` char(30) DEFAULT NULL,
  `Email` char(20) DEFAULT NULL,
  `UF` char(2) DEFAULT NULL,
  `Telefone` char(12) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `Cidade` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`,`CodigoEmpresa`,`CodigoLocal`),
  KEY `fk_cliente_empresa` (`CodigoEmpresa`),
  KEY `fk_cliente_local` (`CodigoLocal`),
  KEY `fk_cliente_uf` (`UF`),
  CONSTRAINT `fk_cliente_empresa` FOREIGN KEY (`CodigoEmpresa`) REFERENCES `tbEmpresa` (`Codigo`),
  CONSTRAINT `fk_cliente_local` FOREIGN KEY (`CodigoLocal`) REFERENCES `tbLocal` (`Codigo`),
  CONSTRAINT `fk_cliente_uf` FOREIGN KEY (`UF`) REFERENCES `tbUF` (`CodigoUF`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbDocumentoEntrada`
--

DROP TABLE IF EXISTS `tbDocumentoEntrada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbDocumentoEntrada` (
  `Id` char(15) NOT NULL,
  `CodigoEmpresa` int(4) NOT NULL,
  `CodigoLocal` int(4) NOT NULL,
  `TipoDocumento` char(5) NOT NULL,
  `DataDocumento` date NOT NULL,
  `DataEntrada` date NOT NULL,
  `UsuarioDocumento` varchar(50) DEFAULT NULL,
  `IdFornecedor` int(4) NOT NULL,
  `Valor` double(10,2) DEFAULT NULL,
  `Status` char(1) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`,`CodigoEmpresa`,`CodigoLocal`),
  KEY `fk_DocumentoE_empresa` (`CodigoEmpresa`),
  KEY `fk_DocumentoE_usuario` (`UsuarioDocumento`),
  KEY `fk_DocumentoE_fornecedor` (`IdFornecedor`),
  KEY `fk_DocumentoE_local` (`CodigoLocal`),
  CONSTRAINT `fk_DocumentoE_empresa` FOREIGN KEY (`CodigoEmpresa`) REFERENCES `tbEmpresa` (`Codigo`),
  CONSTRAINT `fk_DocumentoE_fornecedor` FOREIGN KEY (`IdFornecedor`) REFERENCES `tbFornecedor` (`id`),
  CONSTRAINT `fk_DocumentoE_local` FOREIGN KEY (`CodigoLocal`) REFERENCES `tbLocal` (`Codigo`),
  CONSTRAINT `fk_DocumentoE_usuario` FOREIGN KEY (`UsuarioDocumento`) REFERENCES `tbUsuario` (`Login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbEmpresa`
--

DROP TABLE IF EXISTS `tbEmpresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbEmpresa` (
  `Codigo` int(4) NOT NULL AUTO_INCREMENT,
  `Cnpj` char(14) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Tipo` char(1) DEFAULT NULL,
  `Telefone` char(20) DEFAULT NULL,
  `Email` char(40) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbEstoque`
--

DROP TABLE IF EXISTS `tbEstoque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbEstoque` (
  `Id` char(4) NOT NULL,
  `DescricaoEstoque` varchar(20) NOT NULL,
  `TipoEstoque` varchar(20) NOT NULL,
  `CodigoEmpresa` int(4) NOT NULL,
  `CodigoLocal` int(4) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`,`CodigoEmpresa`,`CodigoLocal`),
  KEY `fk_estoque_empresa` (`CodigoEmpresa`),
  KEY `fk_estoque_local` (`CodigoLocal`),
  CONSTRAINT `fk_estoque_empresa` FOREIGN KEY (`CodigoEmpresa`) REFERENCES `tbEmpresa` (`Codigo`),
  CONSTRAINT `fk_estoque_local` FOREIGN KEY (`CodigoLocal`) REFERENCES `tbLocal` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbFornecedor`
--

DROP TABLE IF EXISTS `tbFornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbFornecedor` (
  `id` int(4) NOT NULL,
  `CodigoEmpresa` int(4) NOT NULL,
  `CodigoLocal` int(4) NOT NULL,
  `Nome` char(60) NOT NULL,
  `Cnpj` char(14) NOT NULL,
  `Endereco` char(30) DEFAULT NULL,
  `Bairro` char(20) DEFAULT NULL,
  `Rua` char(20) DEFAULT NULL,
  `Contato` char(30) DEFAULT NULL,
  `Email` char(20) DEFAULT NULL,
  `UF` char(2) DEFAULT NULL,
  `Telefone` char(12) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `Cep` char(20) DEFAULT NULL,
  `Cidade` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`CodigoEmpresa`,`CodigoLocal`),
  KEY `fk_fornecedor_empresa` (`CodigoEmpresa`),
  KEY `fk_fornecedor_local` (`CodigoLocal`),
  KEY `fk_fornecedor_uf` (`UF`),
  CONSTRAINT `fk_fornecedor_empresa` FOREIGN KEY (`CodigoEmpresa`) REFERENCES `tbEmpresa` (`Codigo`),
  CONSTRAINT `fk_fornecedor_local` FOREIGN KEY (`CodigoLocal`) REFERENCES `tbLocal` (`Codigo`),
  CONSTRAINT `fk_fornecedor_uf` FOREIGN KEY (`UF`) REFERENCES `tbUF` (`CodigoUF`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbItemDocumentoEntrada`
--

DROP TABLE IF EXISTS `tbItemDocumentoEntrada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbItemDocumentoEntrada` (
  `IdDocumento` char(15) NOT NULL,
  `CodigoEmpresa` int(4) NOT NULL,
  `CodigoLocal` int(4) NOT NULL,
  `Sequencia` int(4) NOT NULL,
  `CodigoProduto` varchar(10) NOT NULL,
  `DataDocumento` datetime DEFAULT NULL,
  `Quantidade` int(11) NOT NULL,
  `Valor` double(10,2) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`IdDocumento`,`CodigoEmpresa`,`CodigoLocal`,`Sequencia`),
  KEY `fk_ItemDocumentoEnt_empresa` (`CodigoEmpresa`),
  KEY `fk_ItemDocumentoEnt_Produto` (`CodigoProduto`),
  KEY `fk_ItemDocumentoEnt_local` (`CodigoLocal`),
  CONSTRAINT `fk_ItemDocumentoEnt_Documento` FOREIGN KEY (`IdDocumento`) REFERENCES `tbDocumentoEntrada` (`Id`),
  CONSTRAINT `fk_ItemDocumentoEnt_Produto` FOREIGN KEY (`CodigoProduto`) REFERENCES `tbProduto` (`Id`),
  CONSTRAINT `fk_ItemDocumentoEnt_empresa` FOREIGN KEY (`CodigoEmpresa`) REFERENCES `tbEmpresa` (`Codigo`),
  CONSTRAINT `fk_ItemDocumentoEnt_local` FOREIGN KEY (`CodigoLocal`) REFERENCES `tbLocal` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbItemRequisicao`
--

DROP TABLE IF EXISTS `tbItemRequisicao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbItemRequisicao` (
  `IdRequisicao` int(11) NOT NULL,
  `CodigoEmpresa` int(4) NOT NULL,
  `CodigoLocal` int(4) NOT NULL,
  `Sequencia` int(4) NOT NULL,
  `CodigoProduto` varchar(10) NOT NULL,
  `DataRequisicao` datetime NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `Status` char(1) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`IdRequisicao`,`CodigoEmpresa`,`CodigoLocal`,`Sequencia`),
  KEY `fk_ItemRequisicao_empresa` (`CodigoEmpresa`),
  KEY `fk_ItemRequisicao_Produto` (`CodigoProduto`),
  KEY `fk_ItemRequisicao_local` (`CodigoLocal`),
  CONSTRAINT `fk_ItemRequisicao_Produto` FOREIGN KEY (`CodigoProduto`) REFERENCES `tbProduto` (`Id`),
  CONSTRAINT `fk_ItemRequisicao_empresa` FOREIGN KEY (`CodigoEmpresa`) REFERENCES `tbEmpresa` (`Codigo`),
  CONSTRAINT `fk_ItemRequisicao_local` FOREIGN KEY (`CodigoLocal`) REFERENCES `tbLocal` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbLocal`
--

DROP TABLE IF EXISTS `tbLocal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbLocal` (
  `Codigo` int(4) NOT NULL,
  `CodigoEmpresa` int(4) NOT NULL,
  `Cnpj` char(14) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Telefone` char(20) DEFAULT NULL,
  `Email` char(40) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Codigo`,`CodigoEmpresa`),
  KEY `fk_Filial_Empersa` (`CodigoEmpresa`),
  CONSTRAINT `fk_Filial_Empersa` FOREIGN KEY (`CodigoEmpresa`) REFERENCES `tbEmpresa` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbMovimentoEstoque`
--

DROP TABLE IF EXISTS `tbMovimentoEstoque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbMovimentoEstoque` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoEmpresa` int(4) NOT NULL,
  `CodigoLocal` int(4) NOT NULL,
  `CodigoProduto` varchar(10) NOT NULL,
  `TipoMovimentação` char(1) NOT NULL,
  `IdEstoque` char(4) NOT NULL,
  `QuantidadeEstoque` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `DataMovimento` datetime NOT NULL,
  `Valor` double(10,2) DEFAULT NULL,
  `Documento` varchar(20) DEFAULT NULL,
  `CodigoPatrimonio` varchar(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`,`CodigoEmpresa`,`CodigoLocal`),
  KEY `fk_estoqueMovimento_empresa` (`CodigoEmpresa`),
  KEY `fk_estoqueMovimento_produto` (`CodigoProduto`),
  KEY `fk_estoqueMovimento_Estoque` (`IdEstoque`),
  KEY `fk_estoqueMovimento_local` (`CodigoLocal`),
  CONSTRAINT `fk_estoqueMovimento_Estoque` FOREIGN KEY (`IdEstoque`) REFERENCES `tbEstoque` (`Id`),
  CONSTRAINT `fk_estoqueMovimento_empresa` FOREIGN KEY (`CodigoEmpresa`) REFERENCES `tbEmpresa` (`Codigo`),
  CONSTRAINT `fk_estoqueMovimento_local` FOREIGN KEY (`CodigoLocal`) REFERENCES `tbLocal` (`Codigo`),
  CONSTRAINT `fk_estoqueMovimento_produto` FOREIGN KEY (`CodigoProduto`) REFERENCES `tbProduto` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbPermissaoUsuario`
--

DROP TABLE IF EXISTS `tbPermissaoUsuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbPermissaoUsuario` (
  `CodigoEmpresa` int(4) NOT NULL,
  `CodigoLocal` int(4) NOT NULL,
  `CodigoUsuario` varchar(50) NOT NULL,
  `AprovaCompras` char(1) DEFAULT NULL,
  `AprovaEstoque` char(1) DEFAULT NULL,
  `Requisitante` char(1) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`CodigoEmpresa`,`CodigoLocal`,`CodigoUsuario`),
  KEY `fk_Aprovador_Local` (`CodigoLocal`),
  KEY `fk_apr` (`CodigoUsuario`),
  CONSTRAINT `fk_Aprovador_Empresa` FOREIGN KEY (`CodigoEmpresa`) REFERENCES `tbEmpresa` (`Codigo`),
  CONSTRAINT `fk_Aprovador_Local` FOREIGN KEY (`CodigoLocal`) REFERENCES `tbLocal` (`Codigo`),
  CONSTRAINT `fk_apr` FOREIGN KEY (`CodigoUsuario`) REFERENCES `tbUsuario` (`Login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbProduto`
--

DROP TABLE IF EXISTS `tbProduto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbProduto` (
  `Id` varchar(10) NOT NULL,
  `CodigoEmpresa` int(4) NOT NULL,
  `CodigoLocal` int(4) NOT NULL,
  `Descricao` varchar(40) NOT NULL,
  `UnidadeMedida` char(3) NOT NULL,
  `ControlaPatrimonio` char(1) DEFAULT NULL,
  `CodigoPatrimonio` varchar(20) DEFAULT NULL,
  `Classificacao` varchar(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`,`CodigoEmpresa`,`CodigoLocal`),
  KEY `fk_produto_empresa` (`CodigoEmpresa`),
  KEY `fk_produto_local` (`CodigoLocal`),
  KEY `fk_produto_unidade` (`UnidadeMedida`),
  CONSTRAINT `fk_produto_empresa` FOREIGN KEY (`CodigoEmpresa`) REFERENCES `tbEmpresa` (`Codigo`),
  CONSTRAINT `fk_produto_local` FOREIGN KEY (`CodigoLocal`) REFERENCES `tbLocal` (`Codigo`),
  CONSTRAINT `fk_produto_unidade` FOREIGN KEY (`UnidadeMedida`) REFERENCES `tbUnidadeMedida` (`CodigoUnidade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `NetServiceFlow`.`tni_tbProdutoEstoque_Insert`
AFTER INSERT ON `NetServiceFlow`.`tbProduto`
FOR EACH ROW
insert into tbProdutoEstoque(Id,CodigoEmpresa,CodigoLocal,IdEstoque,Quantidade) select Id,CodigoEmpresa,CodigoLocal,1,0 from tbProduto
 where Id = NEW.Id */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `tbProdutoEstoque`
--

DROP TABLE IF EXISTS `tbProdutoEstoque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbProdutoEstoque` (
  `Id` varchar(10) NOT NULL,
  `CodigoEmpresa` int(4) NOT NULL,
  `CodigoLocal` int(4) NOT NULL,
  `IdEstoque` char(4) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`,`CodigoEmpresa`,`CodigoLocal`,`IdEstoque`),
  KEY `fk_ProdutoEstoque_empresa` (`CodigoEmpresa`),
  KEY `fk_ProdutoEstoque_Estoque` (`IdEstoque`),
  KEY `fk_ProdutoEstoque_local` (`CodigoLocal`),
  CONSTRAINT `fk_ProdutoEstoque_Estoque` FOREIGN KEY (`IdEstoque`) REFERENCES `tbEstoque` (`Id`),
  CONSTRAINT `fk_ProdutoEstoque_empresa` FOREIGN KEY (`CodigoEmpresa`) REFERENCES `tbEmpresa` (`Codigo`),
  CONSTRAINT `fk_ProdutoEstoque_local` FOREIGN KEY (`CodigoLocal`) REFERENCES `tbLocal` (`Codigo`),
  CONSTRAINT `fk_ProdutoEstoque_produto` FOREIGN KEY (`Id`) REFERENCES `tbProduto` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbProdutoSeguranca`
--

DROP TABLE IF EXISTS `tbProdutoSeguranca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbProdutoSeguranca` (
  `IdPS` varchar(10) NOT NULL,
  `CodigoEmpresa` int(4) NOT NULL,
  `CodigoLocal` int(4) NOT NULL,
  `EstoqueMinimo` int(11) NOT NULL,
  `EstoqueCompraAut` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`IdPS`,`CodigoEmpresa`,`CodigoLocal`),
  KEY `fk_produtoseg_empresa` (`CodigoEmpresa`),
  KEY `fk_produtoseg_local` (`CodigoLocal`),
  CONSTRAINT `fk_prod_seg_produto` FOREIGN KEY (`IdPS`) REFERENCES `tbProduto` (`Id`),
  CONSTRAINT `fk_produtoseg_empresa` FOREIGN KEY (`CodigoEmpresa`) REFERENCES `tbEmpresa` (`Codigo`),
  CONSTRAINT `fk_produtoseg_local` FOREIGN KEY (`CodigoLocal`) REFERENCES `tbLocal` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbRequisicao`
--

DROP TABLE IF EXISTS `tbRequisicao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbRequisicao` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoEmpresa` int(4) NOT NULL,
  `CodigoLocal` int(4) NOT NULL,
  `TipoRequisicao` char(1) NOT NULL,
  `DescricaoRequisicao` varchar(9999) NOT NULL,
  `DataRequisicao` date NOT NULL,
  `UsuarioRequisitante` varchar(50) NOT NULL,
  `IdCliente` int(4) NOT NULL,
  `Documento` varchar(10) NOT NULL,
  `CodigoPatrimonio` varchar(10) NOT NULL,
  `ContatoCliente` varchar(20) NOT NULL,
  `Status` char(1) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`,`CodigoEmpresa`,`CodigoLocal`),
  KEY `fk_Requisicao_empresa` (`CodigoEmpresa`),
  KEY `fk_Requisicao_usuario` (`UsuarioRequisitante`),
  KEY `fk_Requisicao_cliente` (`IdCliente`),
  KEY `fk_Requisicao_local` (`CodigoLocal`),
  CONSTRAINT `fk_Requisicao_cliente` FOREIGN KEY (`IdCliente`) REFERENCES `tbCliente` (`id`),
  CONSTRAINT `fk_Requisicao_empresa` FOREIGN KEY (`CodigoEmpresa`) REFERENCES `tbEmpresa` (`Codigo`),
  CONSTRAINT `fk_Requisicao_local` FOREIGN KEY (`CodigoLocal`) REFERENCES `tbLocal` (`Codigo`),
  CONSTRAINT `fk_Requisicao_usuario` FOREIGN KEY (`UsuarioRequisitante`) REFERENCES `tbUsuario` (`Login`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbTipoDocumento`
--

DROP TABLE IF EXISTS `tbTipoDocumento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbTipoDocumento` (
  `Id` int(4) NOT NULL,
  `CodigoEmpresa` int(4) NOT NULL,
  `CodigoLocal` int(4) NOT NULL,
  `Descricao` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`,`CodigoEmpresa`,`CodigoLocal`),
  KEY `fk_TipDoc_empresa` (`CodigoEmpresa`),
  KEY `fk_TipDoc_local` (`CodigoLocal`),
  CONSTRAINT `fk_TipDoc_empresa` FOREIGN KEY (`CodigoEmpresa`) REFERENCES `tbEmpresa` (`Codigo`),
  CONSTRAINT `fk_TipDoc_local` FOREIGN KEY (`CodigoLocal`) REFERENCES `tbLocal` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbUF`
--

DROP TABLE IF EXISTS `tbUF`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbUF` (
  `CodigoUF` char(2) NOT NULL,
  `Descricao` char(30) NOT NULL,
  PRIMARY KEY (`CodigoUF`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbUnidadeMedida`
--

DROP TABLE IF EXISTS `tbUnidadeMedida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbUnidadeMedida` (
  `CodigoUnidade` char(3) NOT NULL,
  `DescricaoUnidade` varchar(20) NOT NULL,
  PRIMARY KEY (`CodigoUnidade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbUsuario`
--

DROP TABLE IF EXISTS `tbUsuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbUsuario` (
  `CodigoEmpresa` int(4) NOT NULL,
  `Login` varchar(50) NOT NULL,
  `Senha` varchar(50) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Telefone` varchar(12) NOT NULL,
  `Grupo` char(5) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Login`,`CodigoEmpresa`),
  KEY `fk_Usuario_Empresa` (`CodigoEmpresa`),
  CONSTRAINT `fk_Usuario_Empresa` FOREIGN KEY (`CodigoEmpresa`) REFERENCES `tbEmpresa` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbUsuarioLocal`
--

DROP TABLE IF EXISTS `tbUsuarioLocal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbUsuarioLocal` (
  `CodigoEmpresa` int(4) NOT NULL,
  `CodigoLocal` int(4) NOT NULL,
  `CodigoUsuario` varchar(50) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`CodigoEmpresa`,`CodigoLocal`,`CodigoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping events for database 'NetServiceFlow'
--

--
-- Dumping routines for database 'NetServiceFlow'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-27 18:34:31
