-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Okt 2023 pada 15.51
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smk_nusantara`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_class`
--

CREATE TABLE `tbl_class` (
  `ClassName` varchar(8) NOT NULL,
  `Grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_class`
--

INSERT INTO `tbl_class` (`ClassName`, `Grade`) VALUES
('XA', 10),
('XB', 10),
('XC', 10),
('XIA', 11),
('XIB', 11),
('XIC', 11),
('XIIA', 12),
('XIIB', 12),
('XIIC', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detailclass`
--

CREATE TABLE `tbl_detailclass` (
  `DetailClassID` int(11) NOT NULL,
  `ClassName` varchar(5) NOT NULL,
  `StudentID` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_detailclass`
--

INSERT INTO `tbl_detailclass` (`DetailClassID`, `ClassName`, `StudentID`) VALUES
(3, 'XB', 'STDN0003'),
(4, 'XB', 'STDN0004'),
(6, 'XC', 'STDN0006'),
(8, 'XC', 'STDN0002'),
(10, 'XA', 'STDN0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detailschedule`
--

CREATE TABLE `tbl_detailschedule` (
  `DetailID` int(11) NOT NULL,
  `ScheduleID` int(11) NOT NULL,
  `SubjectID` char(5) NOT NULL,
  `TeacherID` varchar(8) NOT NULL,
  `ShiftID` int(11) NOT NULL,
  `Day` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detailscore`
--

CREATE TABLE `tbl_detailscore` (
  `ScoreDetailID` int(11) NOT NULL,
  `DetailID` int(11) NOT NULL,
  `StudentID` varchar(8) NOT NULL,
  `Assigment` int(11) DEFAULT NULL,
  `Mid_Exam` int(11) DEFAULT NULL,
  `Final_Exam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_expertise`
--

CREATE TABLE `tbl_expertise` (
  `ExpertiseID` int(11) NOT NULL,
  `TeacherID` varchar(8) NOT NULL,
  `SubjectID` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_headerschedule`
--

CREATE TABLE `tbl_headerschedule` (
  `ScheduleID` int(11) NOT NULL,
  `ClassName` varchar(5) NOT NULL,
  `Finalize` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_shift`
--

CREATE TABLE `tbl_shift` (
  `ShiftID` int(11) NOT NULL,
  `Time` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_shift`
--

INSERT INTO `tbl_shift` (`ShiftID`, `Time`) VALUES
(1, '07:00 - 07:45'),
(2, '07:45 - 08:30'),
(3, '08:30 - 09:15'),
(4, '09:30 - 10:15'),
(5, '10:15 - 11:00'),
(6, '11:00 - 11:45'),
(7, '11:45 - 12:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_student`
--

CREATE TABLE `tbl_student` (
  `StudentID` varchar(8) NOT NULL,
  `Username` varchar(8) DEFAULT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `Gender` varchar(7) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `PhoneNumber` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_student`
--

INSERT INTO `tbl_student` (`StudentID`, `Username`, `Name`, `Address`, `Gender`, `DateOfBirth`, `PhoneNumber`) VALUES
('STDN0001', 'STDN0001', ' Hilda Nathaniela', 'Desa Cihideung', 'female', '2008-01-09', '085721485687'),
('STDN0002', 'STDN0002', 'Maulana Alif Anugrah', 'Desa Cihideung', 'male', '2008-01-09', '085721485687'),
('STDN0003', 'STDN0003', 'Ckasinta Winda S ', 'Desa Cihideung', 'female', '2008-01-09', '085721485687'),
('STDN0004', 'STDN0004', 'Nadya Saphira Esfandiari', 'Desa Cihideung', 'female', '2008-01-09', '085721485687'),
('STDN0005', 'STDN0005', 'Feggy Rizkiana Herman ', 'Desa Cihideung', 'male', '2008-01-09', '085721485687'),
('STDN0006', 'STDN0006', 'Dwi Laksana Bhakti', 'Desa Ciuyah Kec. Waled', 'male', '2007-01-15', '085721485688');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `SubjectID` char(5) NOT NULL,
  `Name` varchar(10) NOT NULL,
  `Assigment` int(11) NOT NULL,
  `Mid_Exam` int(11) NOT NULL,
  `Final_Exam` int(11) NOT NULL,
  `ShiftDuration` int(11) NOT NULL,
  `Grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_subject`
--

INSERT INTO `tbl_subject` (`SubjectID`, `Name`, `Assigment`, `Mid_Exam`, `Final_Exam`, `ShiftDuration`, `Grade`) VALUES
('S1001', 'Matematika', 20, 30, 50, 45, 10),
('S1002', 'IPA', 20, 30, 50, 45, 10),
('S1003', 'IPS', 20, 30, 50, 45, 10),
('S1004', 'AGAMA', 20, 30, 50, 45, 10),
('S1101', 'Matematika', 20, 30, 50, 45, 11),
('S1102', 'IPA', 20, 30, 50, 45, 11),
('S1103', 'IPS', 20, 30, 50, 45, 11),
('S1104', 'AGAMA', 20, 30, 50, 45, 11),
('S1201', 'Matematika', 20, 30, 50, 45, 12),
('S1202', 'IPA', 20, 30, 50, 45, 12),
('S1203', 'IPS', 20, 30, 50, 45, 12),
('S1204', 'AGAMA', 20, 30, 50, 45, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `TeacherID` varchar(8) NOT NULL,
  `Username` varchar(8) DEFAULT NULL,
  `Name` varchar(50) NOT NULL,
  `PhoneNumber` varchar(12) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Gender` varchar(7) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`TeacherID`, `Username`, `Name`, `PhoneNumber`, `DateOfBirth`, `Gender`, `Address`) VALUES
('TCHR0001', 'TCHR0001', 'Bambang Hermanto', '085721585664', '1992-06-03', 'male', 'Desa Cibening, Kabupaten Meraouke'),
('TCHR0002', 'TCHR0002', 'Hilda Nathaniela', '085721485664', '2002-12-01', 'female', 'Blok Dangdeur No. 35 Desa Ciuyah Kec. Waled Kab. Cirebon'),
('TCHR0003', 'TCHR0003', 'Maulana Alif Anugrah', '085721485664', '2002-12-02', 'male', 'WALED DESA, Kec. Waled, Kab. Cirebon, Jawa Barat.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `username` varchar(8) NOT NULL,
  `password` varchar(10) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Photo` varchar(100) DEFAULT NULL,
  `role` enum('admin','teacher','student','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`username`, `password`, `Name`, `Photo`, `role`) VALUES
('ADMN0001', 'admin2022', 'ADMN0001', '63a7fa900c97f8.20893925.png', 'admin'),
('STDN0001', 'fajar2001', NULL, '63a7fa0f8d7825.46944243.jpeg', 'student'),
('STDN0002', 'STDN0002', NULL, NULL, 'student'),
('STDN0003', 'STDN0003', NULL, NULL, 'student'),
('STDN0004', 'STDN0004', NULL, NULL, 'student'),
('STDN0005', 'STDN0005', NULL, NULL, 'student'),
('STDN0006', 'STDN0006', NULL, NULL, 'student'),
('TCHR0001', 'bambang202', NULL, '63a7fac747c6e5.72762515.png', 'teacher'),
('TCHR0002', 'TCHR0002', NULL, NULL, 'teacher'),
('TCHR0003', 'TCHR0003', NULL, NULL, 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`ClassName`);

--
-- Indeks untuk tabel `tbl_detailclass`
--
ALTER TABLE `tbl_detailclass`
  ADD PRIMARY KEY (`DetailClassID`),
  ADD KEY `ClassName` (`ClassName`),
  ADD KEY `StudentID` (`StudentID`);

--
-- Indeks untuk tabel `tbl_detailschedule`
--
ALTER TABLE `tbl_detailschedule`
  ADD PRIMARY KEY (`DetailID`),
  ADD KEY `ScheduleID` (`ScheduleID`),
  ADD KEY `SubjectID` (`SubjectID`),
  ADD KEY `TeacherID` (`TeacherID`),
  ADD KEY `ShiftID` (`ShiftID`);

--
-- Indeks untuk tabel `tbl_detailscore`
--
ALTER TABLE `tbl_detailscore`
  ADD PRIMARY KEY (`ScoreDetailID`),
  ADD KEY `DetailID` (`DetailID`),
  ADD KEY `StudentID` (`StudentID`);

--
-- Indeks untuk tabel `tbl_expertise`
--
ALTER TABLE `tbl_expertise`
  ADD PRIMARY KEY (`ExpertiseID`),
  ADD KEY `SubjectID` (`SubjectID`),
  ADD KEY `TeacherID` (`TeacherID`);

--
-- Indeks untuk tabel `tbl_headerschedule`
--
ALTER TABLE `tbl_headerschedule`
  ADD PRIMARY KEY (`ScheduleID`),
  ADD KEY `ClassName` (`ClassName`);

--
-- Indeks untuk tabel `tbl_shift`
--
ALTER TABLE `tbl_shift`
  ADD PRIMARY KEY (`ShiftID`);

--
-- Indeks untuk tabel `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`StudentID`),
  ADD KEY `Username` (`Username`);

--
-- Indeks untuk tabel `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`SubjectID`);

--
-- Indeks untuk tabel `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`TeacherID`),
  ADD KEY `Username` (`Username`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_detailclass`
--
ALTER TABLE `tbl_detailclass`
  MODIFY `DetailClassID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_detailschedule`
--
ALTER TABLE `tbl_detailschedule`
  MODIFY `DetailID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_detailscore`
--
ALTER TABLE `tbl_detailscore`
  MODIFY `ScoreDetailID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_expertise`
--
ALTER TABLE `tbl_expertise`
  MODIFY `ExpertiseID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_headerschedule`
--
ALTER TABLE `tbl_headerschedule`
  MODIFY `ScheduleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_shift`
--
ALTER TABLE `tbl_shift`
  MODIFY `ShiftID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_detailclass`
--
ALTER TABLE `tbl_detailclass`
  ADD CONSTRAINT `tbl_detailclass_ibfk_1` FOREIGN KEY (`ClassName`) REFERENCES `tbl_class` (`ClassName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detailclass_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `tbl_student` (`StudentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_detailschedule`
--
ALTER TABLE `tbl_detailschedule`
  ADD CONSTRAINT `tbl_detailschedule_ibfk_1` FOREIGN KEY (`ScheduleID`) REFERENCES `tbl_headerschedule` (`ScheduleID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detailschedule_ibfk_2` FOREIGN KEY (`SubjectID`) REFERENCES `tbl_subject` (`SubjectID`),
  ADD CONSTRAINT `tbl_detailschedule_ibfk_3` FOREIGN KEY (`TeacherID`) REFERENCES `tbl_teacher` (`TeacherID`),
  ADD CONSTRAINT `tbl_detailschedule_ibfk_4` FOREIGN KEY (`ShiftID`) REFERENCES `tbl_shift` (`ShiftID`);

--
-- Ketidakleluasaan untuk tabel `tbl_detailscore`
--
ALTER TABLE `tbl_detailscore`
  ADD CONSTRAINT `tbl_detailscore_ibfk_1` FOREIGN KEY (`DetailID`) REFERENCES `tbl_detailschedule` (`DetailID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detailscore_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `tbl_student` (`StudentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_expertise`
--
ALTER TABLE `tbl_expertise`
  ADD CONSTRAINT `tbl_expertise_ibfk_1` FOREIGN KEY (`SubjectID`) REFERENCES `tbl_subject` (`SubjectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_expertise_ibfk_2` FOREIGN KEY (`TeacherID`) REFERENCES `tbl_teacher` (`TeacherID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_headerschedule`
--
ALTER TABLE `tbl_headerschedule`
  ADD CONSTRAINT `tbl_headerschedule_ibfk_1` FOREIGN KEY (`ClassName`) REFERENCES `tbl_class` (`ClassName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD CONSTRAINT `tbl_student_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `tbl_user` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD CONSTRAINT `tbl_teacher_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `tbl_user` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
