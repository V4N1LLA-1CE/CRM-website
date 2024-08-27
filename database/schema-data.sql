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

-- Insert more data into Organisation table
INSERT INTO `Organisation` (`name`, `website`, `desc`, `industry`)
VALUES 
  ("Tech Innovators Inc.", "https://www.techinnovators.com", "A leading tech company specializing in innovative solutions and cutting-edge technologies.", "Technology"),
  ("Green Future Ltd.", "https://www.greenfuture.com", "An environmental organization dedicated to promoting sustainable practices and green energy.", "Environmental"),
  ("Global Health Services", "https://www.globalhealthservices.org", "Provides healthcare services and medical research to improve global health.", "Healthcare"),
  ("EduTech Solutions", "https://www.edutechsolutions.com", "Offers educational technology solutions to enhance learning experiences.", "Education"),
  ("Creative Arts Foundation", "https://www.creativeartsfoundation.org", "Supports and promotes arts and culture through various initiatives and programs.", "Arts & Culture"),
  ("FinServe Consulting", "https://www.finserveconsulting.com", "Financial consulting firm providing expert advice on investments and financial planning.", "Finance"),
  ("Urban Development Corp.", "https://www.urbandevelopmentcorp.com", "Specializes in urban planning and development projects to enhance city infrastructure.", "Real Estate"),
  ("Smart Home Solutions", "https://www.smarthomesolutions.com", "Innovative company focused on smart home technologies and automation.", "Technology"),
  ("Ocean Conservation Alliance", "https://www.oceanconservation.org", "Dedicated to preserving marine environments and promoting ocean conservation.", "Environmental"),
  ("Wellness and Fitness Hub", "https://www.wellnesshub.com", "Provides health and wellness services, including fitness programs and nutritional advice.", "Healthcare"),
  ("NextGen Learning", "https://www.nextgenlearning.com", "Develops advanced educational tools and platforms for the modern classroom.", "Education"),
  ("Artistic Expressions Network", "https://www.artisticexpressions.org", "Promotes and supports various forms of artistic expression through community events and grants.", "Arts & Culture"),
  ("Elite Financial Advisors", "https://www.elitefinancialadvisors.com", "Offers personalized financial planning and investment strategies for individuals and businesses.", "Finance"),
  ("Metro Build Group", "https://www.metrobuildergroup.com", "Engages in construction and development projects aimed at improving urban living conditions.", "Real Estate"),
  ("NextWave Technology Solutions", "https://www.nextwavetech.com", "Provides cutting-edge technology solutions and services to businesses across various sectors.", "Technology"),
  ("Renewable Energy Partners", "https://www.renewableenergypartners.org", "Focuses on developing and promoting renewable energy sources to combat climate change.", "Environmental"),
  ("Medical Innovation Labs", "https://www.medicalinnovationlabs.org", "Specializes in medical research and the development of new healthcare technologies.", "Healthcare"),
  ("SmartEdu Technologies", "https://www.smartedutech.com", "Offers innovative tech solutions aimed at transforming educational practices.", "Education"),
  ("Culture Connect Initiative", "https://www.cultureconnect.org", "Facilitates cultural exchange programs and supports local arts initiatives.", "Arts & Culture"),
  ("Strategic Wealth Management", "https://www.strategicwealthmanagement.com", "Provides comprehensive wealth management and financial advisory services.", "Finance"),
  ("Urban Renewal Projects", "https://www.urbanrenewalprojects.com", "Dedicated to revitalizing urban areas and improving community infrastructure.", "Real Estate"),
  ("Innovative Tech Labs", "https://www.innovativetechlabs.com", "Research and development in cutting-edge technology and software solutions.", "Technology"),
  ("Planet Protectors", "https://www.planetprotectors.org", "Environmental organization focused on preserving natural habitats and wildlife.", "Environmental"),
  ("HealthFirst Medical Center", "https://www.healthfirstmedicalcenter.org", "Comprehensive healthcare services with a focus on patient-centered care.", "Healthcare"),
  ("LearnTech Innovations", "https://www.learntechinnovations.com", "Creates advanced educational tools and technologies for schools and universities.", "Education"),
  ("Global Arts Collective", "https://www.globalartscollective.org", "Promotes global artistic collaborations and supports emerging artists.", "Arts & Culture"),
  ("WealthGuard Financial", "https://www.wealthguardfinancial.com", "Offers expert financial planning and investment management services.", "Finance"),
  ("Cityscape Developments", "https://www.cityscapedevelopments.com", "Focuses on large-scale urban development and infrastructure projects.", "Real Estate"),
  ("Tech Pioneers Ltd.", "https://www.techpioneers.com", "Leads in developing innovative technology solutions and digital products.", "Technology"),
  ("Green Horizons Initiative", "https://www.greenhorizons.org", "Works towards environmental sustainability and eco-friendly practices.", "Environmental"),
  ("Wellbeing Solutions", "https://www.wellbeingsolutions.com", "Provides holistic health and wellness services and programs.", "Healthcare"),
  ("FutureLearn Technologies", "https://www.futurelearntech.com", "Develops cutting-edge educational technologies for interactive learning.", "Education"),
  ("Artistry Hub", "https://www.artistryhub.org", "Supports and showcases artistic talents through various media and events.", "Arts & Culture"),
  ("Premier Financial Group", "https://www.premierfinancialgroup.com", "Provides comprehensive financial services and wealth management solutions.", "Finance"),
  ("Urban Visionary Projects", "https://www.urbanvisionaryprojects.com", "Specializes in innovative urban planning and development.", "Real Estate"),
  ("Digital Innovators", "https://www.digitalinnovators.com", "Develops digital solutions and technology innovations for businesses.", "Technology"),
  ("EcoSustain Initiative", "https://www.ecosustain.org", "Focuses on sustainable development and environmental conservation.", "Environmental"),
  ("AdvanceHealth Clinics", "https://www.advancehealthclinics.org", "Offers advanced healthcare services with a focus on patient well-being.", "Healthcare"),
  ("TechLeap Education", "https://www.techleapeducation.com", "Creates tech-driven educational resources and tools.", "Education"),
  ("Cultural Exchange Network", "https://www.culturalexchangenetwork.org", "Promotes cultural exchange programs and global arts initiatives.", "Arts & Culture"),
  ("Financial Wisdom Advisors", "https://www.financialwisdomadvisors.com", "Provides expert advice on financial planning and investment strategies.", "Finance"),
  ("New Horizons Realty", "https://www.newhorizonsrealty.com", "Focuses on real estate development and property management.", "Real Estate"),
  ("Innovatech Solutions", "https://www.innovatechsolutions.com", "Offers innovative technology solutions and IT consulting services.", "Technology"),
  ("EcoFuture Projects", "https://www.ecofutureprojects.org", "Dedicated to promoting environmental sustainability and green initiatives.", "Environmental"),
  ("TotalCare Health Group", "https://www.totalcarehealthgroup.org", "Provides comprehensive healthcare services and medical care.", "Healthcare"),
  ("EduSmart Technologies", "https://www.edusmarttech.com", "Develops smart educational technologies for enhancing learning experiences.", "Education"),
  ("ArtFusion Collective", "https://www.artfusioncollective.org", "Supports and promotes various forms of artistic expression and creativity.", "Arts & Culture"),
  ("Visionary Finance Solutions", "https://www.visionaryfinancesolutions.com", "Offers innovative financial solutions and advisory services.", "Finance"),
  ("Urban Prospects Inc.", "https://www.urbanprospectsinc.com", "Specializes in urban development and infrastructure enhancement.", "Real Estate"),
  ("TechTrend Innovations", "https://www.techtrendinnovations.com", "Provides technology solutions and innovations for businesses.", "Technology"),
  ("GreenStep Initiative", "https://www.greenstep.org", "Promotes environmental sustainability and green energy solutions.", "Environmental"),
  ("HealthPlus Services", "https://www.healthplusservices.org", "Offers a range of health services and wellness programs.", "Healthcare"),
  ("EduNext Solutions", "https://www.edunextsolutions.com", "Provides advanced educational tools and technologies.", "Education"),
  ("Cultural Impact Foundation", "https://www.culturalimpactfoundation.org", "Supports cultural programs and artistic initiatives.", "Arts & Culture"),
  ("Financial Insight Group", "https://www.financialinsightgroup.com", "Delivers financial planning and advisory services for individuals and businesses.", "Finance"),
  ("CityRevive Development", "https://www.cityrevivedevelopment.com", "Focuses on revitalizing urban areas through development projects.", "Real Estate"),
  ("Innovative Digital Labs", "https://www.innovativedigitallabs.com", "Provides digital solutions and technology advancements for businesses.", "Technology"),
  ("Sustainable Earth Foundation", "https://www.sustainableearthfoundation.org", "Works towards sustainable development and environmental protection.", "Environmental"),
  ("HealthQuest Medical Group", "https://www.healthquestmedicalgroup.org", "Offers comprehensive medical services and health programs.", "Healthcare"),
  ("NextWave EduTech", "https://www.nextwaveedutech.com", "Develops educational technologies for modern learning environments.", "Education"),
  ("Arts Horizon Network", "https://www.artshorizonnetwork.org", "Promotes arts and cultural initiatives through community programs.", "Arts & Culture"),
  ("Capital Growth Partners", "https://www.capitalgrowthpartners.com", "Provides investment and financial management services.", "Finance"),
  ("Metro Innovations Inc.", "https://www.metroinnovationsinc.com", "Engages in innovative urban development and planning projects.", "Real Estate");

