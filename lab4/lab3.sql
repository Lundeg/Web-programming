





CREATE TABLE `course` (
  `courseIndex` varchar(8) NOT NULL,
  `courseName` varchar(50) NOT NULL,
  `courseCredit` tinyint(4) NOT NULL
) 


INSERT INTO `course` (`courseIndex`, `courseName`, `courseCredit`) VALUES
('CSII200', 'Алгоритмын үндэс', 3),
('CSII202', 'Өгөгдлийн сангийн үндэс', 3),
('CSII203', 'Интернэт технологийн үндэс', 3),
('ICSI201', 'Объект хандлагат програмчлал', 3),
('ICSI202', 'Өгөгдлийн бүтэц', 3),
('ICSI203', 'Магадлал статистик', 3),
('ICSI301', 'Веб програмчлал', 3),
('ICSI432', 'Компьютер график', 3);



CREATE TABLE `courseTakenHistory` (
  `studentID` varchar(15) NOT NULL,
  `courseIndex` varchar(8) NOT NULL,
  `takenDate` datetime DEFAULT CURRENT_TIMESTAMP
) 



CREATE TABLE `program` (
  `programIndex` varchar(8) NOT NULL,
  `programName` varchar(50) NOT NULL,
  `issuedDate` datetime DEFAULT CURRENT_TIMESTAMP
) 



INSERT INTO `program` (`programIndex`, `programName`, `issuedDate`) VALUES
('D061301', 'Компьютерийн ухаан', '2014-06-01'),
('D061302', 'Програм хангамж ', '2014-06-01'),
('D061303', 'Мэдээллийн систем', '2014-06-01'),
('D061304', 'Мэдээллийн технологи', '2014-06-01');



CREATE TABLE `student` (
  `studentID` varchar(15) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `dob` date NOT NULL,
  `programIndex` varchar(8) NOT NULL,
  `password` varchar(32) NOT NULL
) 



INSERT INTO `student` (`studentID`, `lastName`, `firstName`, `gender`, `dob`, `programIndex`, `password`) VALUES
('15b1seas3370', 'Steve', 'Jobs', 'm', '1997-08-02', 'D061302', '123456'),
('15b1seas3371', 'Bill', 'Gates', 'm', '1997-02-03', 'D061301', '123456'),
('16b1seas3369', 'Temuujin', 'Ya', 'm', '1998-01-01', 'D061302', '123456'),
('16b1seas3372', 'Uzumaki', 'Naruto', 'm', '1998-08-05', 'D061304', '123456'),
('16b1seas3373', 'San', 'Sakura', 'f', '1998-05-06', 'D061303', '123456');


ALTER TABLE `course`
  ADD PRIMARY KEY (`courseIndex`),
  ADD UNIQUE KEY `courseIndex` (`courseIndex`);


ALTER TABLE `courseTakenHistory`
  ADD PRIMARY KEY (`studentID`,`courseIndex`),
  ADD KEY `FK_courseTakenHistoryStudentID` (`studentID`) ,
  ADD KEY `FK_courseTakenHistoryCourseIndex` (`courseIndex`);


ALTER TABLE `program`
  ADD PRIMARY KEY (`programIndex`),
  ADD UNIQUE KEY `programIndex` (`programIndex`);


ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`),
  ADD UNIQUE KEY `studentID` (`studentID`),
  ADD KEY `FK_StudentProgramIndex` (`programIndex`);


ALTER TABLE `courseTakenHistory`
  ADD CONSTRAINT `FK_courseTakenHistoryCourseIndex` FOREIGN KEY (`courseIndex`) REFERENCES `course` (`courseIndex`) on delete cascade,
  ADD CONSTRAINT `FK_courseTakenHistoryStudentID` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`) on delete cascade;

-
ALTER TABLE `student`
  ADD CONSTRAINT `FK_StudentProgramIndex` FOREIGN KEY (`programIndex`) REFERENCES `program` (`programIndex`);
COMMIT;
