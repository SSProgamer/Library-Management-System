-- -------------------------------------------------------------
-- TablePlus 4.5.2(402)
--
-- https://tableplus.com/
--
-- Database: webpro
-- Generation Time: 2565-04-16 21:44:46.5920
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `Book_List`;
CREATE TABLE `Book_List` (
  `Book_ID` integer(10) AUTO_INCREMENT,
  `Book_Name` varchar(255) NOT NULL,
  `Type_ID` integer(10) NOT NULL,
  `ISBN` Varchar(10) NOT NULL,
  PRIMARY KEY (`Book_ID`),
  KEY `typeid_FK` (`Type_ID`),
  CONSTRAINT `typeid_FK` FOREIGN KEY (`Type_ID`) REFERENCES `Book_Type` (`Type_ID`) ON DELETE CASCADE
);

DROP TABLE IF EXISTS `Book_Type`;
CREATE TABLE `Book_Type` (
  `Type_ID` integer(10) AUTO_INCREMENT,
  `Type_Name` Varchar(255),
  PRIMARY KEY (`Type_ID`)
);

DROP TABLE IF EXISTS `Room_Booking`;
CREATE TABLE `Room_Booking` (
  `RB_ID` integer(10) AUTO_INCREMENT,
  `Member_ID` integer(10) NOT NULL,
  `Room_ID` integer(10) NOT NULL,
  `B_Date` date NOT NULL,
  `Start_Time` time NOT NULL,
  `End_Time` time NOT NULL,
  `Cause` varchar(255) NOT NULL,
  `Lib_ID` integer(10) NOT NULL,
  PRIMARY KEY (`RB_ID`),
  KEY `memberid_FK` (`Member_ID`),
  CONSTRAINT `memberid_FK` FOREIGN KEY (`Member_ID`) REFERENCES `Member` (`Member_ID`) ON DELETE CASCADE,
   KEY `roomid_FK` (`Room_ID`),
  CONSTRAINT `roomid_FK` FOREIGN KEY (`Room_ID`) REFERENCES `Room` (`Room_ID`) ON DELETE CASCADE,
  KEY `libid_FK` (`Lib_ID`),
  CONSTRAINT `libid_FK` FOREIGN KEY (`Lib_ID`) REFERENCES `Librarian` (`Lib_ID`) ON DELETE CASCADE
);

DROP TABLE IF EXISTS `Room`;
CREATE TABLE `Room` (
  `Room_ID` integer(10) AUTO_INCREMENT,
  `Room_Name` varchar(255) NOT NULL,
  PRIMARY KEY (`Room_ID`)
);

DROP TABLE IF EXISTS `Borrow_return`;
CREATE TABLE `Borrow_return` (
  `BR_ID` int(10) AUTO_INCREMENT,
  `Member_ID` integer(10) NOT NULL,
  `Book_ID` integer(10) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `B_Date` date NOT NULL,
  `R_Date` date NOT NULL,
  `Lib_ID`int NOT NULL,
  PRIMARY KEY (`BR_ID`),
   KEY `BR_memberid_FK` (`Member_ID`),
  CONSTRAINT `BR_memberid_FK` FOREIGN KEY (`Member_ID`) REFERENCES `Member` (`Member_ID`) ON DELETE CASCADE,
   KEY `BR_bookid_FK` (`Book_ID`),
  CONSTRAINT `BR_bookid_FK` FOREIGN KEY (`Book_ID`) REFERENCES `Book_List` (`Book_ID`) ON DELETE CASCADE,
  KEY `BR_libid_FK` (`Lib_ID`),
  CONSTRAINT `BR_libid_FK` FOREIGN KEY (`Lib_ID`) REFERENCES `Librarian` (`Lib_ID`) ON DELETE CASCADE
);

DROP TABLE IF EXISTS `Librarian`;
CREATE TABLE `Librarian` (
  `Lib_ID` integer(10) AUTO_INCREMENT,
  `Lib_Name` varchar(255) NOT NULL,
  `Lib_Tel` integer(10) NOT NULL,
  `Lib_Email` varchar(255) NOT NULL,
  PRIMARY KEY (`Lib_ID`)
);

DROP TABLE IF EXISTS `Member`;
CREATE TABLE `Member` (
  `Member_ID` integer(10) AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Tel` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Birth_Date` date NOT NULL,
  PRIMARY KEY (`Member_ID`)
);

DROP TABLE IF EXISTS `Blacklist`;
CREATE TABLE `Blacklist` (
  `BL_ID` integer(10) AUTO_INCREMENT,
  `Member_ID` integer(10) NOT NULL,
  `Cause_Blacklist` varchar(255) NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  PRIMARY KEY (`BL_ID`),
  KEY `BL_memberid_FK` (`Member_ID`),
  CONSTRAINT `BL_memberid_FK` FOREIGN KEY (`Member_ID`) REFERENCES `Member` (`Member_ID`) ON DELETE CASCADE
);

DROP TABLE IF EXISTS `Appointment`;
CREATE TABLE `Appointment` (
  `App_ID` integer(10) AUTO_INCREMENT,
  `Member_ID` integer(10) NOT NULL,
  `Book_ID` integer(10) NOT NULL,
  `B_Date` date NOT NULL,
  `App_Date` date NOT NULL,
  `Lib_ID` integer(10),
  PRIMARY KEY (`App_ID`),
  KEY `AP_memberid_FK` (`Member_ID`),
  CONSTRAINT `AP_memberid_FK` FOREIGN KEY (`Member_ID`) REFERENCES `Member` (`Member_ID`) ON DELETE CASCADE,
    KEY `AP_bookid_FK` (`Book_ID`),
  CONSTRAINT `AP_bookid_FK` FOREIGN KEY (`Book_ID`) REFERENCES `Book_List` (`Book_ID`) ON DELETE CASCADE,
    KEY `AP_libid_FK` (`Lib_ID`),
  CONSTRAINT `AP_libid_FK` FOREIGN KEY (`Lib_ID`) REFERENCES `Librarian` (`Lib_ID`) ON DELETE CASCADE
);

INSERT INTO `Book_List` (`Book_ID`, `Book_Name`, `Type_ID`, `ISBN`)
VALUES (1,'nonthiwaht',1,00001),(2,'pengpan',2,00002);

INSERT INTO `Book_Type` (`Type_ID`, `Type_Name`)
VALUES (1,'แฟนตาซี'),(2,'สยอง');

INSERT INTO `Room_Booking` (`RB_ID`, `Member_ID`, `Room_ID`, `B_Date`,`Start_Time`, `End_Time`, `Cause`, `Lib_ID`)
VALUES (1,1,1,'2565-02-23','2565-02-24','12:00','13:00','อยากนอนห้องนี้เลยจอง',1),(2,2,2,'2565-02-23','2565-02-24''12:00','13:00','กุว่างจบปะบรรณารักษ์ 1-1ได้อะ',2);

INSERT INTO `Room` (`Room_ID`, `Room_Name`)
VALUES (1,'ห้องประชุม1'),(2,'ห้องประชุม2');

INSERT INTO `Borrow_return` (`BR_ID`, `Member_ID`, `Book_ID`, `Status`,`B_Date`, `R_Date`, `Lib_ID`)
VALUES (1,1,1,'คืนแล้ว','2565-01-20','2565-01-27',1),(2,2,2,'คืนแล้ว','2565-02-12','2565-02-19',1);

INSERT INTO `Librarian` (`Lib_ID`, `Lib_Name`, `Lib_Name`, `Lib_Email`)
VALUES (1,'นนทิวัฒน์ เพ็งพันธ์','0123456789','nonthiwaht@gmail.com'),(2,'เพ็งพันธ์ นนทิวัฒน์','0987654321','pengpan@gmail.com');

INSERT INTO `Member` (`Member_ID`, `Name`, `Gender`, `Tel`,`Email`, `Birth_Date`)
VALUES (1,'ไซรัปบอย','ชาย','0123456789','syrupboy@gmail.com','2545-08-19'),(2,'ไซรัปเกิล','หญิง','0874198753','syrupgirl@gmail.com','2545-08-20');

INSERT INTO `Blacklist` (`BL_ID`, `Member_ID`, `Cause_Blacklist`, `Start_Date`,`End_Date`)
VALUES (1,1,'ขโมยหนังสือ','2565-01-20','2565-08-20'),(2,2,'ฉีกหนังสือในห้องสมุด','2565-03-14','2566-03-14');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
