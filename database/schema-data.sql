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
  ("Nathan.Jims@gmail.com", "Ilovechocolatemint12", "Nathan", "Jims");

-- Insert more data into Organisation table
INSERT INTO `Organisation` (`name`, `website`, `desc`, `industry`)
VALUES 
  ("Tech Innovators Inc.", "https://www.techinnovators.com", "A leading tech company specializing in innovative solutions and cutting-edge technologies.", "Technology"),
  ("Green Future Ltd.", "https://www.greenfuture.com", "An environmental organization dedicated to promoting sustainable practices and green energy.", "Environmental"),
  ("Global Health Services", "https://www.globalhealthservices.org", "Provides healthcare services and medical research to improve global health.", "Healthcare"),
  ("EduTech Solutions", "https://www.edutechsolutions.com", "Offers educational technology solutions to enhance learning experiences.", "Education"),
  ("ArtFusion Collective", "https://www.artfusioncollective.org", "Supports and promotes various forms of artistic expression and creativity.", "Arts & Culture"),
  ("HealthQuest Medical Group", "https://www.healthquestmedicalgroup.org", "Offers comprehensive medical services and health programs.", "Healthcare"),
  ("NextWave EduTech", "https://www.nextwaveedutech.com", "Develops educational technologies for modern learning environments.", "Education"),
  ("Arts Horizon Network", "https://www.artshorizonnetwork.org", "Promotes arts and cultural initiatives through community programs.", "Arts & Culture"),
  ("Capital Growth Partners", "https://www.capitalgrowthpartners.com", "Provides investment and financial management services.", "Finance"),
  ("Metro Innovations Inc.", "https://www.metroinnovationsinc.com", "Engages in innovative urban development and planning projects.", "Real Estate");

-- Insert data into the Contact_Us table with relevant messages for a B2B recruiting business
INSERT INTO `Contact_Us` (`first_name`, `last_name`, `phone_number`, `message`, `replied`, `org_id`)
VALUES 
  ('Michael', 'Anderson', '041-234-5678', 'I am interested in learning more about your recruitment services for technology roles.', 0, 1),
  ('Sophie', 'Turner', '042-987-6543', 'Can we arrange a discussion about potential recruitment partnerships?', 1, 1),
  ('William', 'Collins', '043-765-4321', 'Looking for information on how your recruitment services can assist with healthcare staffing.', 0, NULL),
  ('Emily', 'Clark', '044-555-1234', 'I would like to understand your approach to recruiting for educational positions.', 0, 4),
  ('James', 'Wilson', '045-678-9101', 'I have questions about how your services can support recruitment in the arts and culture sector.', 1, 3);

