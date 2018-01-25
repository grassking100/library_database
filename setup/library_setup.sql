-- MySQL Script generated by MySQL Workbench
-- Tue Jun 27 14:09:21 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema library
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema library
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `library` DEFAULT CHARACTER SET utf8 ;
USE `library` ;

-- -----------------------------------------------------
-- Table `library`.`author`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `library`.`author` (
  `author_id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(200) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `phone_number` VARCHAR(45) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `name` VARCHAR(200) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`author_id`),
  UNIQUE INDEX `authir_id_UNIQUE` (`author_id` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 37
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_czech_ci;


-- -----------------------------------------------------
-- Table `library`.`publisher`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `library`.`publisher` (
  `publisher_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `address` VARCHAR(200) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `phone_number` VARCHAR(45) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  PRIMARY KEY (`publisher_id`),
  UNIQUE INDEX `publisher_id_UNIQUE` (`publisher_id` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 20
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_czech_ci;


-- -----------------------------------------------------
-- Table `library`.`book`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `library`.`book` (
  `book_id` INT(11) NOT NULL AUTO_INCREMENT,
  `book_name` VARCHAR(200) CHARACTER SET 'utf8' NOT NULL,
  `publish_date` DATE NULL DEFAULT NULL,
  `language` VARCHAR(45) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `publisher_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`book_id`),
  UNIQUE INDEX `book_id_UNIQUE` (`book_id` ASC),
  INDEX `fk_Book_Publisher1_idx` (`publisher_id` ASC),
  CONSTRAINT `fk_Book_Publisher1`
    FOREIGN KEY (`publisher_id`)
    REFERENCES `library`.`publisher` (`publisher_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 23
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_czech_ci;


-- -----------------------------------------------------
-- Table `library`.`book_has_author`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `library`.`book_has_author` (
  `book_id` INT(11) NOT NULL,
  `author_id` INT(11) NOT NULL,
  PRIMARY KEY (`book_id`, `author_id`),
  INDEX `fk_Book_has_Author_Author1_idx` (`author_id` ASC),
  INDEX `fk_Book_has_Author_Book1_idx` (`book_id` ASC),
  CONSTRAINT `fk_Book_has_Author_Author1`
    FOREIGN KEY (`author_id`)
    REFERENCES `library`.`author` (`author_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Book_has_Author_Book1`
    FOREIGN KEY (`book_id`)
    REFERENCES `library`.`book` (`book_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_czech_ci;


-- -----------------------------------------------------
-- Table `library`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `library`.`user` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) CHARACTER SET 'utf8' NOT NULL,
  `account` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `password` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `isAdministrator` TINYINT(4) NOT NULL,
  `birthday` DATE NULL DEFAULT NULL,
  `email` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `user_id_UNIQUE` (`user_id` ASC),
  UNIQUE INDEX `Account_UNIQUE` (`account` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 53
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_czech_ci;


-- -----------------------------------------------------
-- Table `library`.`physical_book`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `library`.`physical_book` (
  `physical_book_id` INT(11) NOT NULL AUTO_INCREMENT,
  `book_id` INT(11) NOT NULL,
  `borrower_user_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`physical_book_id`, `book_id`),
  INDEX `fk_Physical book_Book1_idx` (`book_id` ASC),
  INDEX `fk_Physical book_User1_idx` (`borrower_user_id` ASC),
  CONSTRAINT `fk_Physical book_Book`
    FOREIGN KEY (`book_id`)
    REFERENCES `library`.`book` (`book_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Physical book_borrower2`
    FOREIGN KEY (`borrower_user_id`)
    REFERENCES `library`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = utf8;

USE `library` ;
