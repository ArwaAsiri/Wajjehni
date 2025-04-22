CREATE DATABASE IF NOT EXISTS `Wajjehni2`;
USE `Wajjehni2`;

CREATE TABLE `Volunteer`(
    `VolunteerID` INT(9) NOT NULL AUTO_INCREMENT,
    `Name` VARCHAR(30),
    `Email` VARCHAR(50),
    `password` VARCHAR(255), -- Increased length to 255 characters
    `AvilabiltityStatus` BOOLEAN,
    `Guidance Type` VARCHAR(30),
    `Specialty` VARCHAR(30),
    `AcademicLevel` INT(2),
    `Time` DATE,
    `Points` INT(2),
    `pointsEarned` INT(100),
    CONSTRAINT `Volunteer_PK` PRIMARY KEY (`VolunteerID`)
);

CREATE TABLE `Student`(
    `StudentID` INT(9) NOT NULL AUTO_INCREMENT,
    `VolunteerID` INT(9) NOT NULL,
    `Name` VARCHAR(30),
    `Email` VARCHAR(50),
    `password` VARCHAR(255), -- Increased length to 255 characters
    `Specialty` VARCHAR(30),
    CONSTRAINT `Student_PK` PRIMARY KEY (`StudentID`),
    CONSTRAINT `Student_FK1` FOREIGN KEY (`VolunteerID`) REFERENCES `Volunteer`(`VolunteerID`) 
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE `Safety`(
    `levelOfDanger` VARCHAR(30) NOT NULL,
    `StudentID` INT(9) NOT NULL,
    `Details` VARCHAR(30),
    CONSTRAINT `Safety_PK` PRIMARY KEY (`levelOfDanger`),
    CONSTRAINT `Safety_FK1` FOREIGN KEY (`StudentID`) REFERENCES `Student`(`StudentID`) 
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE `UQU Notification`(
    `EventName` VARCHAR(30) NOT NULL,
    `StudentID` INT(9) NOT NULL,
    `EventDate` DATE,
    `EventLocation` VARCHAR(50),
    `EventType`VARCHAR(15),
    `EventProvider`VARCHAR(20),
    `CertificateAvailability` BOOLEAN,
    CONSTRAINT `UQU Notification_PK` PRIMARY KEY (`EventName`),
    CONSTRAINT `UQU Notification_FK1` FOREIGN KEY (`StudentID`) REFERENCES `Student`(`StudentID`) 
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE `Market Notification`(
    `MarketName` VARCHAR(30) NOT NULL,
    `StudentID` INT(9) NOT NULL,
    `Date` DATE,
    `DiscountDetails` INT(3),
    `SpeicalDeals` INT(3),
    CONSTRAINT `Market Notification_PK` PRIMARY KEY (`MarketName`),
    CONSTRAINT `Market Notification_FK1` FOREIGN KEY (`StudentID`) REFERENCES `Student`(`StudentID`) 
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE `Rating`(
    `RateID` INT(9) NOT NULL AUTO_INCREMENT,
    `StudentID` INT(9) NOT NULL,
    `VolunteerID` INT(9) NOT NULL,
    `NumberOfStars` INT(3),
    `RatingList` VARCHAR(40),
    `Feedback` VARCHAR(200),
    CONSTRAINT `Rating_PK` PRIMARY KEY (`RateID`),
    CONSTRAINT `Rating_FK1` FOREIGN KEY (`StudentID`) REFERENCES `Student`(`StudentID`),
    CONSTRAINT `Rating_FK2` FOREIGN KEY (`VolunteerID`) REFERENCES `Volunteer`(`VolunteerID`) 
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE `Map`(
    `Location`VARCHAR(60) NOT NULL,
    `StudentID` INT(9) NOT NULL,
    `VolunteerID` INT(9) NOT NULL,
    `EventName` VARCHAR(30) NOT NULL,
    `MarketName` VARCHAR(30) NOT NULL,
    `levelOfDanger` VARCHAR(30) NOT NULL,
    `MapScale` VARCHAR(40),
    `MapMarkers` VARCHAR(40),
    `MapImage` VARCHAR(40),
    CONSTRAINT `Map_PK` PRIMARY KEY (`Location`),
    CONSTRAINT `Map_FK1` FOREIGN KEY (`StudentID`) REFERENCES `Student`(`StudentID`),
    CONSTRAINT `Map_FK2` FOREIGN KEY (`VolunteerID`) REFERENCES `Volunteer`(`VolunteerID`),
    CONSTRAINT `Map_FK3` FOREIGN KEY (`EventName`) REFERENCES `UQU Notification`(`EventName`),
    CONSTRAINT `Map_FK4` FOREIGN KEY (`MarketName`) REFERENCES `Market Notification`(`MarketName`), 
    CONSTRAINT `Map_FK5` FOREIGN KEY (`levelOfDanger`) REFERENCES `Safety`(`levelOfDanger`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

insert into `Volunteer` (`VolunteerID`,`Name`,`Email`,`password`,`Specialty`,`AvilabiltityStatus`,`Guidance Type`,`AcademicLevel`,`Time`,`Points`,`pointsEarned`)
values
    (111111111,'AAA','Arwa@example.com','password111','IS',true,'Campus volunteer',8,'2024-05-10',10,10);

insert into  `Student`(`StudentID`,`VolunteerID`,`Name`,`Email`,`password`,`Specialty`)
values
    (123456789,111111111,'Arwa','ArwaAsiri@example.com','password123','IS');