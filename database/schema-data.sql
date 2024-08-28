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

-- Insert data into Organisation table
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

-- Insert data into the Contact_Us table 
INSERT INTO `Contact_Us` (`first_name`, `last_name`, `phone_number`, `message`, `replied`, `org_id`)
VALUES 
  ('Michael', 'Anderson', '0412345678', 'I am interested in learning more about your recruitment services for technology roles.', 0, 1),
  ('Sophie', 'Turner', '0429876543', 'Can we arrange a discussion about potential recruitment partnerships?', 1, 1),
  ('William', 'Collins', '0437654321', 'Looking for information on how your recruitment services can assist with healthcare staffing.', 0, NULL),
  ('Emily', 'Clark', '0445551234', 'I would like to understand your approach to recruiting for educational positions.', 0, 4),
  ('James', 'Wilson', '0456789101', 'I have questions about how your services can support recruitment in the arts and culture sector.', 1, 3);

-- Insert data into the Contractor table 
INSERT INTO `Contractor` (`first_name`, `last_name`, `specialisation`, `email`, `phone_number`, `address`)
VALUES 
  ('John', 'Williams', 'Software Developer', 'john.williams@techsolutions.com', '0412345678', '123 Elm Street, Springfield'),
  ('Jessica', 'Smith', 'Project Manager', 'jessica.smith@innovativeprojects.com', '0423456789', '456 Oak Avenue, Metropolis'),
  ('Emily', 'Brown', 'UX Designer', 'emily.brown@creativedesigns.com', '0434567890', '789 Pine Road, Gotham'),
  ('Michael', 'Johnson', 'Database Administrator', 'michael.johnson@dataexpert.com', '0445678901', '101 Maple Street, Smalltown'),
  ('Sophie', 'Taylor', 'Front-End Developer', 'sophie.taylor@webdevpro.com', '0456789012', '202 Birch Lane, Riverside'),
  ('Daniel', 'Miller', 'Back-End Developer', 'daniel.miller@backendtech.com', '0467890123', '303 Cedar Drive, Lakeside'),
  ('Olivia', 'Davis', 'Network Engineer', 'olivia.davis@networkspecialist.com', '0478901234', '404 Willow Crescent, Hilltop'),
  ('Matthew', 'Wilson', 'Full Stack Developer', 'matthew.wilson@fullstacksolutions.com', '0489012345', '505 Spruce Street, Forestview'),
  ('Isabella', 'Anderson', 'DevOps Engineer', 'isabella.anderson@devopsmasters.com', '0490123456', '606 Fir Avenue, Greenfield'),
  ('Liam', 'Clark', 'IT Consultant', 'liam.clark@itconsultingfirm.com', '0501234567', '707 Redwood Boulevard, Seaside');

-- Insert data into the Project table
INSERT INTO `Project` (`name`, `desc`, `technique_required`, `due_date`, `pmt_link`, `org_id`, `contractor_id`)
VALUES
  ('Next-Gen CRM Development', 
   'Developing a next-gen Customer Relationship Management system using the latest web technologies.', 
   'ReactJS, Node.js, MongoDB', 
   '2024-10-15 17:00:00', 
   'https://pmt.techinnovators.com/crm', 
   1, 1),
  
  ('Green Energy Initiative', 
   'Creating a platform to monitor and manage green energy sources and usage.', 
   'Angular, Java, MySQL', 
   '2024-12-01 12:00:00', 
   'https://pmt.greenfuture.com/energy', 
   1, NULL),
  
  ('Global Health Portal', 
   'Developing a portal for global healthcare services and medical research data management.', 
   'Python, Django, PostgreSQL', 
   '2024-11-20 15:30:00', 
   'https://pmt.globalhealthservices.org/portal', 
   3, 4),
  
  ('E-Learning Platform Enhancement', 
   'Enhancing an existing e-learning platform with new features and improved user experience.', 
   'Vue.js, Laravel, MariaDB', 
   '2024-09-30 10:00:00', 
   'https://pmt.edutechsolutions.com/elearning', 
   4, 3),
  
  ('Art Community Hub', 
   'Building an online community hub for artists to collaborate and share their work.', 
   'React, Node.js, Firebase', 
   '2024-10-25 14:00:00', 
   'https://pmt.artfusioncollective.org/hub', 
   5, 5),
  
  ('Healthcare Analytics Dashboard', 
   'Developing a dashboard for healthcare analytics and reporting.', 
   'R, Shiny, SQL Server', 
   '2024-12-10 09:00:00', 
   'https://pmt.healthquestmedicalgroup.org/analytics', 
   4, 4),
  
  ('Advanced Learning Management System', 
   'Creating an advanced learning management system with adaptive learning technologies.', 
   'React, Python, Django', 
   '2024-11-15 16:00:00', 
   'https://pmt.nextwaveedutech.com/lms', 
   4, NULL),
  
  ('Arts & Culture Event Platform', 
   'Building a platform to manage and promote arts and culture events globally.', 
   'Ruby on Rails, PostgreSQL', 
   '2024-10-05 13:00:00', 
   'https://pmt.artshorizonnetwork.org/events', 
   8, 9),
  
  ('Investment Portfolio Management System', 
   'Developing a system to manage and optimize investment portfolios.', 
   'Java, Spring Boot, MySQL', 
   '2024-12-20 11:00:00', 
   'https://pmt.capitalgrowthpartners.com/portfolio', 
   9, 7),
  
  ('Smart City Infrastructure Project', 
   'Creating a smart city infrastructure management platform.', 
   'IoT, Python, Azure', 
   '2024-11-10 14:30:00', 
   'https://pmt.metroinnovationsinc.com/smartcity', 
   10, NULL);

