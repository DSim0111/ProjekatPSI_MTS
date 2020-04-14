-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema gifterydatabase
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema gifterydatabase
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gifterydatabase` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `gifterydatabase` ;

-- -----------------------------------------------------
-- Table `gifterydatabase`.`systemuser`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gifterydatabase`.`systemuser` ;

CREATE TABLE IF NOT EXISTS `gifterydatabase`.`systemuser` (
  `id` INT(11) NOT NULL,
  `username` VARCHAR(40) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  `name` VARCHAR(30) NOT NULL,
  `surname` VARCHAR(30) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `image` VARCHAR(100) NOT NULL,
  `phoneNum` CHAR(18) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) VISIBLE,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `gifterydatabase`.`shop`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gifterydatabase`.`shop` ;

CREATE TABLE IF NOT EXISTS `gifterydatabase`.`shop` (
  `idShop` INT(11) NOT NULL,
  `image` VARCHAR(200) NOT NULL,
  `description` VARCHAR(200) NOT NULL,
  `shopName` VARCHAR(30) NOT NULL,
  `state` CHAR(18) NOT NULL,
  `submitDate` DATE NOT NULL,
  `address` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idShop`),
  CONSTRAINT `R_3`
    FOREIGN KEY (`idShop`)
    REFERENCES `gifterydatabase`.`systemuser` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `gifterydatabase`.`addon`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gifterydatabase`.`addon` ;

CREATE TABLE IF NOT EXISTS `gifterydatabase`.`addon` (
  `idA` INT(11) NOT NULL,
  `name` VARCHAR(18) NOT NULL,
  `price` FLOAT NOT NULL,
  `image` VARCHAR(100) NOT NULL,
  `idShop` INT(11) NOT NULL,
  PRIMARY KEY (`idA`),
  INDEX `R_48` (`idShop` ASC) VISIBLE,
  CONSTRAINT `R_48`
    FOREIGN KEY (`idShop`)
    REFERENCES `gifterydatabase`.`shop` (`idShop`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `gifterydatabase`.`administrator`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gifterydatabase`.`administrator` ;

CREATE TABLE IF NOT EXISTS `gifterydatabase`.`administrator` (
  `idAdmin` INT(11) NOT NULL,
  PRIMARY KEY (`idAdmin`),
  CONSTRAINT `R_1`
    FOREIGN KEY (`idAdmin`)
    REFERENCES `gifterydatabase`.`systemuser` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `gifterydatabase`.`category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gifterydatabase`.`category` ;

CREATE TABLE IF NOT EXISTS `gifterydatabase`.`category` (
  `idC` INT(11) NOT NULL,
  `name` VARCHAR(18) NOT NULL,
  PRIMARY KEY (`idC`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `gifterydatabase`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gifterydatabase`.`user` ;

CREATE TABLE IF NOT EXISTS `gifterydatabase`.`user` (
  `idUser` INT(11) NOT NULL,
  `address` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idUser`),
  CONSTRAINT `R_2`
    FOREIGN KEY (`idUser`)
    REFERENCES `gifterydatabase`.`systemuser` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `gifterydatabase`.`comment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gifterydatabase`.`comment` ;

CREATE TABLE IF NOT EXISTS `gifterydatabase`.`comment` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idUser` INT(11) NOT NULL,
  `idShop` INT(11) NOT NULL,
  `commentField` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `R_46` (`idUser` ASC) VISIBLE,
  INDEX `R_47` (`idShop` ASC) VISIBLE,
  CONSTRAINT `R_46`
    FOREIGN KEY (`idUser`)
    REFERENCES `gifterydatabase`.`user` (`idUser`),
  CONSTRAINT `R_47`
    FOREIGN KEY (`idShop`)
    REFERENCES `gifterydatabase`.`shop` (`idShop`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `gifterydatabase`.`deliveryrequest`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gifterydatabase`.`deliveryrequest` ;

CREATE TABLE IF NOT EXISTS `gifterydatabase`.`deliveryrequest` (
  `idDelReq` INT(11) NOT NULL,
  `idUser` INT(11) NOT NULL,
  `idShop` INT(11) NOT NULL,
  `state` VARCHAR(18) NOT NULL,
  `submitDate` DATE NOT NULL,
  `payment` VARCHAR(30) NOT NULL,
  `notes` VARCHAR(200) NULL DEFAULT NULL,
  `address` VARCHAR(50) NOT NULL,
  `submitTime` TIME NOT NULL,
  PRIMARY KEY (`idDelReq`),
  INDEX `R_38` (`idUser` ASC) VISIBLE,
  INDEX `R_40` (`idShop` ASC) VISIBLE,
  CONSTRAINT `R_38`
    FOREIGN KEY (`idUser`)
    REFERENCES `gifterydatabase`.`user` (`idUser`),
  CONSTRAINT `R_40`
    FOREIGN KEY (`idShop`)
    REFERENCES `gifterydatabase`.`shop` (`idShop`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `gifterydatabase`.`deliveryaddon`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gifterydatabase`.`deliveryaddon` ;

CREATE TABLE IF NOT EXISTS `gifterydatabase`.`deliveryaddon` (
  `idA` INT(11) NOT NULL,
  `idDelReq` INT(11) NOT NULL,
  `idDelAdd` INT(11) NOT NULL,
  PRIMARY KEY (`idDelAdd`),
  INDEX `R_53` (`idA` ASC) VISIBLE,
  INDEX `R_54` (`idDelReq` ASC) VISIBLE,
  CONSTRAINT `R_53`
    FOREIGN KEY (`idA`)
    REFERENCES `gifterydatabase`.`addon` (`idA`),
  CONSTRAINT `R_54`
    FOREIGN KEY (`idDelReq`)
    REFERENCES `gifterydatabase`.`deliveryrequest` (`idDelReq`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `gifterydatabase`.`product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gifterydatabase`.`product` ;

CREATE TABLE IF NOT EXISTS `gifterydatabase`.`product` (
  `idProduct` INT(11) NOT NULL,
  `code` VARCHAR(12) NOT NULL,
  `name` VARCHAR(40) NOT NULL,
  `description` VARCHAR(200) NULL DEFAULT NULL,
  `image` VARCHAR(100) NOT NULL,
  `price` FLOAT NOT NULL,
  `idShop` INT(11) NOT NULL,
  PRIMARY KEY (`idProduct`),
  INDEX `R_23` (`idShop` ASC) VISIBLE,
  CONSTRAINT `R_23`
    FOREIGN KEY (`idShop`)
    REFERENCES `gifterydatabase`.`shop` (`idShop`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `gifterydatabase`.`deliveryproduct`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gifterydatabase`.`deliveryproduct` ;

CREATE TABLE IF NOT EXISTS `gifterydatabase`.`deliveryproduct` (
  `idProduct` INT(11) NOT NULL,
  `idDelReq` INT(11) NOT NULL,
  `idDelProduct` INT(11) NOT NULL,
  `quantity` INT(11) NOT NULL,
  PRIMARY KEY (`idDelProduct`),
  INDEX `R_51` (`idProduct` ASC) VISIBLE,
  INDEX `R_52` (`idDelReq` ASC) VISIBLE,
  CONSTRAINT `R_51`
    FOREIGN KEY (`idProduct`)
    REFERENCES `gifterydatabase`.`product` (`idProduct`),
  CONSTRAINT `R_52`
    FOREIGN KEY (`idDelReq`)
    REFERENCES `gifterydatabase`.`deliveryrequest` (`idDelReq`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `gifterydatabase`.`favshop`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gifterydatabase`.`favshop` ;

CREATE TABLE IF NOT EXISTS `gifterydatabase`.`favshop` (
  `idUser` INT(11) NOT NULL,
  `idShop` INT(11) NOT NULL,
  PRIMARY KEY (`idUser`, `idShop`),
  INDEX `R_35` (`idShop` ASC) VISIBLE,
  CONSTRAINT `R_34`
    FOREIGN KEY (`idUser`)
    REFERENCES `gifterydatabase`.`user` (`idUser`),
  CONSTRAINT `R_35`
    FOREIGN KEY (`idShop`)
    REFERENCES `gifterydatabase`.`shop` (`idShop`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `gifterydatabase`.`rating`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gifterydatabase`.`rating` ;

CREATE TABLE IF NOT EXISTS `gifterydatabase`.`rating` (
  `idUser` INT(11) NOT NULL,
  `idShop` INT(11) NOT NULL,
  `rating` INT(11) NOT NULL,
  PRIMARY KEY (`idUser`, `idShop`),
  INDEX `R_14` (`idShop` ASC) VISIBLE,
  CONSTRAINT `R_14`
    FOREIGN KEY (`idShop`)
    REFERENCES `gifterydatabase`.`shop` (`idShop`),
  CONSTRAINT `R_9`
    FOREIGN KEY (`idUser`)
    REFERENCES `gifterydatabase`.`user` (`idUser`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `gifterydatabase`.`shopcat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gifterydatabase`.`shopcat` ;

CREATE TABLE IF NOT EXISTS `gifterydatabase`.`shopcat` (
  `idC` INT(11) NOT NULL,
  `idShop` INT(11) NOT NULL,
  PRIMARY KEY (`idC`, `idShop`),
  INDEX `R_37` (`idShop` ASC) VISIBLE,
  CONSTRAINT `R_36`
    FOREIGN KEY (`idC`)
    REFERENCES `gifterydatabase`.`category` (`idC`),
  CONSTRAINT `R_37`
    FOREIGN KEY (`idShop`)
    REFERENCES `gifterydatabase`.`shop` (`idShop`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `gifterydatabase`.`shopreport`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gifterydatabase`.`shopreport` ;

CREATE TABLE IF NOT EXISTS `gifterydatabase`.`shopreport` (
  `idUser` INT(11) NOT NULL,
  `description` VARCHAR(200) NOT NULL,
  `idShop` INT(11) NOT NULL,
  `submitDate` DATE NOT NULL,
  PRIMARY KEY (`idUser`, `idShop`),
  INDEX `R_19` (`idShop` ASC) VISIBLE,
  CONSTRAINT `R_18`
    FOREIGN KEY (`idUser`)
    REFERENCES `gifterydatabase`.`user` (`idUser`),
  CONSTRAINT `R_19`
    FOREIGN KEY (`idShop`)
    REFERENCES `gifterydatabase`.`shop` (`idShop`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
