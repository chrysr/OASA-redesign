-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2020 at 11:35 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdi1500205`
--

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `total_time` int(11) NOT NULL,
  `starting_station` varchar(255) NOT NULL,
  `ending_station` varchar(255) NOT NULL,
  `current_station` varchar(255) NOT NULL,
  `current_step` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `explanation` varchar(255) NOT NULL,
  `time_stations` varchar(255) NOT NULL,
  `scenario` int(11) NOT NULL,
  `ticket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `total_time`, `starting_station`, `ending_station`, `current_station`, `current_step`, `action`, `explanation`, `time_stations`, `scenario`, `ticket`) VALUES
(4, 4, 'Μοναστηράκι', 'Ευαγγελισμός', 'Μοναστηράκι', 1, 'M3', 'ΑΓΙΑ ΜΑΡΙΝΑ - ΔΟΥΚ. ΠΛΑΚΕΝΤΙΑΣ - ΑΕΡΟΔΡΟΜΙΟ', '4 λεπτ. (2 στάσεις)', 1, '0,60€ / 1,40€'),
(5, 5, 'Ευαγγελισμός', 'Μοναστηράκι', 'Ευαγγελισμός', 1, 'M3', 'ΑΕΡΟΔΡΟΜΙΟ - ΔΟΥΚ. ΠΛΑΚΕΝΤΙΑΣ - ΑΓΙΑ ΜΑΡΙΝΑ', '5 λεπτ. (2 στάσεις)', 1, '0,60€ / 1,40€'),
(11, 41, 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών', 'Ειρήνη', 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών', 1, '224', 'ΚΑΙΣΑΡΙΑΝΗ - ΕΛ. ΒΕΝΙΖΕΛΟΥ', '12 λεπτ. (9 στάσεις)', 1, '0,60€ / 1,40€'),
(12, 41, 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών', 'Ειρήνη', 'Ευαγγελισμός', 2, 'M3', 'ΑΕΡΟΔΡΟΜΙΟ - ΔΟΥΚ. ΠΛΑΚΕΝΤΙΑΣ - ΑΓΙΑ ΜΑΡΙΝΑ', '5 λεπτ. (2 στάσεις)', 1, '0,60€ / 1,40€'),
(13, 41, 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών', 'Ειρήνη', 'Μοναστηράκι', 3, 'M1', 'ΠΕΙΡΑΙΑΣ - ΚΗΦΙΣΙΑ', '24 λεπτ. (12 στάσεις)', 1, '0,60€ / 1,40€'),
(14, 52, 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών', 'Ειρήνη', 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών', 1, '250', 'ΠΑΝΕΠΙΣΤΗΜΙΟΥΠΟΛΗ - ΣΤ. ΕΥΑΓΓΕΛΙΣΜΟΥ (ΚΥΚΛΙΚΗ)', '23 λεπτ. (9 στάσεις)', 2, '0,60€ / 1,40€'),
(15, 52, 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών', 'Ειρήνη', 'Ευαγγελισμός', 2, 'M3', 'ΑΕΡΟΔΡΟΜΙΟ - ΔΟΥΚ. ΠΛΑΚΕΝΤΙΑΣ - ΑΓΙΑ ΜΑΡΙΝΑ', '5 λεπτ. (2 στάσεις)', 2, '0,60€ / 1,40€'),
(16, 52, 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών', 'Ειρήνη', 'Μοναστηράκι', 3, 'M1', 'ΠΕΙΡΑΙΑΣ - ΚΗΦΗΣΙΑ', '24 λεπτ. (12 στάσεις)', 2, '0,60€ / 1,40€');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` varchar(10) NOT NULL,
  `price` double NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `price`, `name`) VALUES
('n111', 1.4, '90 Λεπτών'),
('n112', 4.5, 'Ημερήσιο'),
('n113', 9, '5 Ημερών'),
('n114', 6.5, '5πλό Εισιτήριο'),
('n115', 13.4, '10+1 Ειστήρια'),
('n116', 2.7, '2πλό Ειστήριο'),
('n121', 10, '1 Διαδρομής από/προς Αεροδρόμιο με Μετρό'),
('n122', 6, '1 Διαδρομής από/προς Αεροδρόμιο με Λεωφορείο'),
('n123', 18, '1 Μετ\' επιστροφής στο Αεροδρόμιο'),
('n124', 6, '1 από/πρός τους σταθμούς Παλλήνη-Κάντζα-Κορωπί στο Αεροδρόμιο με Μετρό'),
('n1311', 30, '30 Ημερών χωρίς Διαδρομές Αεροδρομίου'),
('n1312', 49, '30 Ημερών με Διαδρομές Αεροδρομίου'),
('n1321', 85, '90 Ημερών χωρίς Διαδρομές Αεροδρομίου'),
('n1322', 142, '90 Ημερών με Διαδρομές Αεροδρομίου'),
('n1331', 170, '180 Ημερών χωρίς Διαδρομές Αεροδρομίου'),
('n1332', 250, '180 Ημερών με Διαδρομές Αεροδρομίου'),
('n1341', 330, '365 Ημερών χωρίς Διαδρομές Αεροδρομίου'),
('n1342', 490, '365 Ημερών με Διαδρομές Αεροδρομίου'),
('n211', 0.6, '90 Λεπτών - Μειωμένο'),
('n212', 3, '5πλό Εισιτήριο - Μειωμένο'),
('n213', 6, '10+1 Ειστήρια - Μειωμένο'),
('n214', 1.2, '2πλό Ειστήριο - Μειωμένο'),
('n221', 5, '1 Διαδρομής από/προς Αεροδρόμιο με Μετρό - Μειωμένο'),
('n222', 3, '1 Διαδρομής από/προς Αεροδρόμιο με Λεωφορείο - Μειωμένο'),
('n223', 3, '1 από/πρός τους σταθμούς Παλλήνη-Κάντζα-Κορωπί στο Αεροδρόμιο με Μετρό - Μειωμένο'),
('n2311', 15, '30 Ημερών χωρίς Διαδρομές Αεροδρομίου - Μειωμένο'),
('n2312', 25, '30 Ημερών με Διαδρομές Αεροδρομίου - Μειωμένο'),
('n2321', 43, '90 Ημερών χωρίς Διαδρομές Αεροδρομίου - Μειωμένο'),
('n2322', 71, '90 Ημερών με Διαδρομές Αεροδρομίου - Μειωμένο'),
('n2331', 85, '180 Ημερών χωρίς Διαδρομές Αεροδρομίου - Μειωμένο'),
('n2332', 125, '180 Ημερών με Διαδρομές Αεροδρομίου - Μειωμένο'),
('n2341', 165, '365 Ημερών χωρίς Διαδρομές Αεροδρομίου - Μειωμένο'),
('n2342', 245, '365 Ημερών με Διαδρομές Αεροδρομίου - Μειωμένο'),
('n31', 22, '3 Ημερών + Μεταφορά και Επιστροφή στο Αεροδρόμιο');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_purchase`
--

CREATE TABLE `ticket_purchase` (
  `ticketid` varchar(10) NOT NULL,
  `buyer` bigint(20) NOT NULL,
  `date` datetime NOT NULL,
  `amount` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_purchase`
--

INSERT INTO `ticket_purchase` (`ticketid`, `buyer`, `date`, `amount`) VALUES
('n111', 1234567891234567, '2020-01-11 12:33:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

CREATE TABLE `timetables` (
  `id` int(11) NOT NULL,
  `line_name` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `station` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `step` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timetables`
--

INSERT INTO `timetables` (`id`, `line_name`, `full_name`, `station`, `address`, `step`) VALUES
(3, 'Μ1', 'Πειραιάς - Κηφισιά', 'Κηφησιά', 'Κηφησιά', 1),
(5, 'Μ1', '0', 'Κ.Α.Τ.', 'Κηφησιά', 2),
(6, 'Μ1', '0', 'Μαρούσι', 'Μαρούσι', 3),
(7, 'Μ1', '0', 'Νερατζιώτισσα', 'Μαρούσι', 4),
(8, 'Μ1', '0', 'Αττική', 'Αθήνα', 5),
(9, 'Μ1', '0', 'Μοναστηράκι', 'Αθήνα', 6),
(10, 'Μ1', '0', 'Καλλιθέα', 'Καλλιθέα', 7),
(11, 'Μ1', '0', 'Νεό Φάληρο', 'Πειραιάς', 8),
(12, 'Μ1', '0', 'Πειραιάς', 'Πειραιάς', 9),
(13, 'Μ2', 'Ανθούπολη - Ελληνικό', 'Ανθούπολη', 'Περιστέρι', 1),
(14, 'Μ2', '0', 'Περιστέρι', 'Περιστέρι', 2),
(15, 'Μ2', '0', 'Άγιος Αντώνιος', 'Περιστέρι', 3),
(16, 'Μ2', '0', 'Σεπόλια', 'Αθήνα', 4),
(17, 'Μ2', '0', 'Αττική', 'Αθήνα', 5),
(18, 'Μ2', '0', 'Πανεπιστήμιο', 'Αθήνα', 6),
(19, 'Μ2', '0', 'Σύνταγμα', 'Αθήνα', 7),
(20, 'Μ2', '0', 'Δάφνη', 'Δάφνη', 8),
(21, 'Μ2', '0', 'Άγιος Δημήτριος', 'Ηλιούπολη', 9),
(22, 'Μ2', '0', 'Ηλιούπολη', 'Ηλιούπολη', 10),
(23, 'Μ2', '0', 'Ελληνικό', 'Ελληνικό', 11),
(24, '140', 'Πολύγωνο - Γλυφάδα', 'Πολύγωνο', 'Πολύγωνο', 1),
(25, '140', '', 'Κατεχάκη', 'Αθήνα', 2),
(26, '140', '', 'Βαρβάκειο', 'Ψυχικό', 3),
(27, '140', '', 'Γουδί', 'Αθήνα', 4),
(28, '140', '', 'Άλιμος', 'Άλιμος', 5),
(29, '140', '', 'Γλυφάδα', 'Γλυφάδα', 6),
(30, '024', 'Άγιοι Ανάργυροι - Σταθμός Κάτω Πατήσια (Κυκλική)', 'Άγιοι Ανάργυροι', 'Άγιοι Ανάργυροι', 1),
(31, '024', '', 'Παδική Χαρά', 'Άγιοι Ανάργυροι', 2),
(32, '024', '', 'Γέφυρα', 'Αθήνα', 3),
(33, '024', '', 'Τέρμα', 'Τσούντα', 4),
(34, '024', '', 'Ζαχαροπλαστείο', 'Φλαγγίνα', 5),
(35, '024', '', 'Γέφυρα', 'Αθήνα', 6),
(36, '024', '', 'Άγιοι Ανάργυροι', 'Άγιοι Ανάργυροι', 7),
(37, 'Π1', 'Πειραιάς - Αεροδρόμιο', 'Πειραιάς', 'Πειραιάς', 1),
(38, 'Π1', '', 'Λεύκα', 'Πειραιάς', 2),
(39, 'Π1', '', 'Ρέντης', 'Νίκαια', 3),
(40, 'Π1', '', 'Ταύρος', 'Μοσχάτο', 4),
(41, 'Π1', '', 'Ρουφ', 'Αθήνα', 5),
(42, 'Π1', '', 'Άγιοι Ανάργυροι', 'Άγιοι Ανάργυροι', 6),
(43, 'Π1', '', 'Ηράκλειο', 'Ηράκλειο', 7),
(44, 'Π1', '', 'Παλλήνη', 'Παλλήνη', 8),
(45, 'Π1', '', 'Αεροδρόμιο', 'Σπάτα', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `card` bigint(20) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstname`, `lastname`, `email`, `card`, `password`) VALUES
('Fname', 'Lname', 'person@domain.com', 1234567891234567, 'pass'),
('Fname2', 'Lname2', 'person2@domain2.com', 2345678912345678, 'pass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetables`
--
ALTER TABLE `timetables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`card`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `timetables`
--
ALTER TABLE `timetables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
