CREATE TABLE `User` (
  `id` int PRIMARY KEY,
  `email` varchar(255),
  `password` varchar(255),
  `first_name` varchar(255),
  `last_name` varchar(255)
);

CREATE TABLE `Project` (
  `id` integer PRIMARY KEY,
  `name` varchar(255),
  `desc` varchar(255),
  `technique_required` varchar(255),
  `due_date` datetime,
  `pmt_link` varchar(255),
  `org_id` int
);

CREATE TABLE `Organisation` (
  `id` integer PRIMARY KEY,
  `name` varchar(255),
  `website` varchar(255),
  `desc` varchar(255),
  `industry` varchar(255)
);

ALTER TABLE `Project` ADD FOREIGN KEY (`org_id`) REFERENCES `Organisation` (`id`);
