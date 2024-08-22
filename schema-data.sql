CREATE TABLE `User` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `email` varchar(255),
  `password` varchar(255),
  `first_name` varchar(255),
  `last_name` varchar(255)
);

CREATE TABLE `Project` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(255),
  `desc` varchar(255),
  `technique_required` varchar(255),
  `due_date` datetime,
  `pmt_link` varchar(255),
  `org_id` int,
  `contractor_id` int
);

CREATE TABLE `Organisation` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(255),
  `website` varchar(255),
  `desc` varchar(255),
  `industry` varchar(255)
);

CREATE TABLE `Contractor` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255),
  `last_name` varchar(255),
  `specialisation` varchar(255),
  `email` varchar(255),
  `phone_number` varchar(255),
  `address` varchar(255)
);

CREATE TABLE `Contact_Us` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255),
  `last_name` varchar(255),
  `phone_number` varchar(255),
  `message` varchar(255),
  `replied` boolean,
  `org_id` int
);

-- Adding Foreign Key Constraints
ALTER TABLE `Contact_Us` ADD FOREIGN KEY (`org_id`) REFERENCES `Organisation` (`id`);
ALTER TABLE `Project` ADD FOREIGN KEY (`org_id`) REFERENCES `Organisation` (`id`);
ALTER TABLE `Project` ADD FOREIGN KEY (`contractor_id`) REFERENCES `Contractor` (`id`);


-- When inserting, omit the 'id' column to let the database auto-generate it
INSERT INTO `User` (`email`, `password`, `first_name`, `last_name`)
VALUES ("Nathan.Jims@gmail.com", "Ilovechocolatemint12", "Nathan", "Jims");

INSERT INTO `User` (`email`, `password`, `first_name`, `last_name`)
VALUES ("J.Wilson@gmail.com", "TedLasso2012FTW!", "John", "Wilson");


