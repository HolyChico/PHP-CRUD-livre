-- -----------------------------------------------------
-- Script SQL para o Projeto Restaurante (Itens e Pedidos)
-- -----------------------------------------------------

-- Cria e utiliza o esquema do banco de dados
CREATE SCHEMA IF NOT EXISTS `restaurante_crud` DEFAULT CHARACTER SET utf8 ;
USE `restaurante_crud` ;

-- -----------------------------------------------------
-- Tabela 1: Item de Menu (CRUD 1)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `item` (
  `id_item` INT NOT NULL AUTO_INCREMENT,
  `nome_item` VARCHAR(100) NOT NULL,
  `preco_item` DECIMAL(10, 2) NOT NULL,
  `categoria_item` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_item`)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Tabela 2: Pedido (CRUD 2)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedido` (
  `id_pedido` INT NOT NULL AUTO_INCREMENT,
  `hora_pedido` DATETIME NOT NULL,
  `status_pedido` VARCHAR(50) NOT NULL DEFAULT 'Aberto',
  `observacoes_pedido` TEXT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Tabela 3: Detalhe (Tabela de Ligação N:M)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `detalhe` (
  -- Colunas de dados (não fazem parte da chave)
  `quantidade_detalhe` INT NOT NULL,
  `preco_detalhe` DECIMAL(10, 2) NOT NULL,
  
  -- Chaves Estrangeiras que formam a Chave Primária Composta
  `item_id_item` INT NOT NULL, 
  `pedido_id_pedido` INT NOT NULL,
  
  -- Define a Chave Primária Composta (o que garante o N:M)
  PRIMARY KEY (`item_id_item`, `pedido_id_pedido`), 
  
  -- Definição dos Relacionamentos de Chave Estrangeira
  
  -- Liga ao Item
  CONSTRAINT `fk_detalhe_item`
    FOREIGN KEY (`item_id_item`)
    REFERENCES `item` (`id_item`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    
  -- Liga ao Pedido
  CONSTRAINT `fk_detalhe_pedido`
    FOREIGN KEY (`pedido_id_pedido`)
    REFERENCES `pedido` (`id_pedido`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION
) ENGINE = InnoDB;