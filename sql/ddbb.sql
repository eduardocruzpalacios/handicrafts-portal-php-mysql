/* DDBB */

CREATE DATABASE handicraft
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

/* TABLE USERS */
CREATE TABLE `handicraft`.`users` (
  `id` VARCHAR(20) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `password` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;