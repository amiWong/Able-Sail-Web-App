DROP TABLE IF EXISTS `user`;
DROP TABLE IF EXISTS `infosheet`;

CREATE TABLE `user` 
(
   `ID` int NOT NULL,
   `username` varchar(16) NOT NULL,
   `email` varchar(255) NOT NULL,
   `password` varchar(255) NOT NULL,
   PRIMARY KEY (`ID`),
   UNIQUE KEY `ID_UNIQUE` (`ID`)
);


CREATE TABLE `infosheet`
(
   `ID` int NOT NULL,
   `first_name` varchar(255),
   `last_name` varchar(255),
   `address` varchar(255),
   `phone` varchar(255),
   `email` varchar(255),
   `emergency_contact` varchar(255),
   `lenses` int,
   `wheelchair_power` varchar(255),
   `wheelchair_manual` varchar(255),
   `scooter` varchar(255),
   `cane` varchar(255),
   `walker` varchar(255),
   `other` varchar(255),
   `transfer_assistance` varchar(255),
   `disabilities` varchar(255),
   `waver` int,
   `start_date` varchar(255),
   `end_date` varchar(255),
   `networkID` varchar(255),
   PRIMARY KEY (`ID`),
   UNIQUE KEY `ID_UNIQUE` (`ID`)
);