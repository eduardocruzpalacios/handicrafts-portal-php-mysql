/* DDBB */
CREATE DATABASE handicraft DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

/* TABLE USERS */
CREATE TABLE `handicraft`.`users` (
  `id` VARCHAR(20) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `password` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

/* TABLE HANDICRAFT */
CREATE TABLE `handicraft`.`handicraft` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `dateupload` DATE NOT NULL,
  `userid` VARCHAR(20) NOT NULL,
  `title` VARCHAR(50) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `fragile` BIT(1) NOT NULL,
  `weight` FLOAT NULL DEFAULT NULL,
  `imgname` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;