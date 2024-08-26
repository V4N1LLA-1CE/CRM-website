-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS fit2104_a3_lab4_group10;

-- Use the newly created database
USE fit2104_a3_lab4_group10;

-- Create the User table if it doesn't exist
CREATE TABLE IF NOT EXISTS `User` (
  `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255),
  `password` VARCHAR(255),
  `first_name` VARCHAR(255),
  `last_name` VARCHAR(255)
);

-- Create the Project table if it doesn't exist
CREATE TABLE IF NOT EXISTS `Project` (
  `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255),
  `desc` VARCHAR(255),
  `technique_required` VARCHAR(255),
  `due_date` DATETIME,
  `pmt_link` VARCHAR(255),
  `org_id` INT,
  `contractor_id` INT
);

-- Create the Organisation table if it doesn't exist
CREATE TABLE IF NOT EXISTS `Organisation` (
  `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255),
  `website` VARCHAR(255),
  `desc` VARCHAR(255),
  `industry` VARCHAR(255)
);

-- Create the Contractor table if it doesn't exist
CREATE TABLE IF NOT EXISTS `Contractor` (
  `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255),
  `last_name` VARCHAR(255),
  `specialisation` VARCHAR(255),
  `email` VARCHAR(255),
  `phone_number` VARCHAR(255),
  `address` VARCHAR(255)
);

-- Create the Contact_Us table if it doesn't exist
CREATE TABLE IF NOT EXISTS `Contact_Us` (
  `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255),
  `last_name` VARCHAR(255),
  `phone_number` VARCHAR(255),
  `message` VARCHAR(255),
  `replied` BOOLEAN,
  `org_id` INT
);

-- Adding Foreign Key Constraints
ALTER TABLE `Contact_Us` 
  ADD CONSTRAINT `fk_org_id_contact_us` 
  FOREIGN KEY (`org_id`) REFERENCES `Organisation` (`id`);

ALTER TABLE `Project` 
  ADD CONSTRAINT `fk_org_id_project` 
  FOREIGN KEY (`org_id`) REFERENCES `Organisation` (`id`);

ALTER TABLE `Project` 
  ADD CONSTRAINT `fk_contractor_id_project` 
  FOREIGN KEY (`contractor_id`) REFERENCES `Contractor` (`id`);

-- Inserting data into the User table
INSERT INTO `User` (`email`, `password`, `first_name`, `last_name`)
VALUES 
  ("Nathan.Jims@gmail.com", "Ilovechocolatemint12", "Nathan", "Jims"),
  ("J.Wilson@gmail.com", "TedLasso2012FTW!", "John", "Wilson");

