-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 20, 2019 at 05:24 PM
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
-- Database: `oasa`
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
  `scenario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `total_time`, `starting_station`, `ending_station`, `current_station`, `current_step`, `action`, `explanation`, `time_stations`, `scenario`) VALUES
(4, 4, 'Μοναστηράκι', 'Ευαγγελισμός', 'Μοναστηράκι', 1, 'M3', 'ΑΓΙΑ ΜΑΡΙΝΑ - ΔΟΥΚ. ΠΛΑΚΕΝΤΙΑΣ - ΑΕΡΟΔΡΟΜΙΟ', '4 λεπτ. (2 στάσεις)', 1),
(5, 5, 'Ευαγγελισμός', 'Μοναστηράκι', 'Ευαγγελισμός', 1, 'M3', 'ΑΕΡΟΔΡΟΜΙΟ - ΔΟΥΚ. ΠΛΑΚΕΝΤΙΑΣ - ΑΓΙΑ ΜΑΡΙΝΑ', '5 λεπτ. (2 στάσεις)', 1),
(11, 41, 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών', 'Ειρήνη', 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών', 1, '224', 'ΚΑΙΣΑΡΙΑΝΗ - ΕΛ. ΒΕΝΙΖΕΛΟΥ', '12 λεπτ. (9 στάσεις)', 1),
(12, 41, 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών', 'Ειρήνη', 'Ευαγγελισμός', 2, 'M3', 'ΑΕΡΟΔΡΟΜΙΟ - ΔΟΥΚ. ΠΛΑΚΕΝΤΙΑΣ - ΑΓΙΑ ΜΑΡΙΝΑ', '5 λεπτ. (2 στάσεις)', 1),
(13, 41, 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών', 'Ειρήνη', 'Μοναστηράκι', 3, 'M1', 'ΠΕΙΡΑΙΑΣ - ΚΗΦΙΣΙΑ', '24 λεπτ. (12 στάσεις)', 1),
(14, 52, 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών', 'Ειρήνη', 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών', 1, '250', 'ΠΑΝΕΠΙΣΤΗΜΙΟΥΠΟΛΗ - ΣΤ. ΕΥΑΓΓΕΛΙΣΜΟΥ (ΚΥΚΛΙΚΗ)', '23 λεπτ. (9 στάσεις)', 2),
(15, 52, 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών', 'Ειρήνη', 'Ευαγγελισμός', 2, 'M3', 'ΑΕΡΟΔΡΟΜΙΟ - ΔΟΥΚ. ΠΛΑΚΕΝΤΙΑΣ - ΑΓΙΑ ΜΑΡΙΝΑ', '5 λεπτ. (2 στάσεις)', 2),
(16, 52, 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών', 'Ειρήνη', 'Μοναστηράκι', 3, 'M1', 'ΠΕΙΡΑΙΑΣ - ΚΗΦΗΣΙΑ', '24 λεπτ. (12 στάσεις)', 2);

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
('n121', 10, '1 Διαδρομής με Μετρό'),
('n122', 6, '1 Διαδρομής με λεωφορείο'),
('n123', 18, '1 Μετ\' επιστροφής'),
('n124', 6, '1 από/πρός τους σταθμούς Παλλήνη-Κάντζα-Κορωπί με Μετρό'),
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
('n221', 5, '1 Διαδρομής με Μετρό - Μειωμένο'),
('n222', 3, '1 Διαδρομής με λεωφορείο - Μειωμένο'),
('n223', 3, '1 από/πρός τους σταθμούς Παλλήνη-Κάντζα-Κορωπί με Μετρό - Μειωμένο'),
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
('abc', 'aa', 'a@ba.com', 1, 'pass'),
('alfjk', 'asfdjas', 'asdfk@b.com', 2, 'asdflj'),
('a', 'b', 'cd', 3, 'df'),
('dsafjad', 'aslfkj', 'salfjad@d.com', 5, 'adflj'),
('αφδα', 'αδφα', 'a@b.com', 234234, 'εςρς'),
('aldjfal;f', 'sdlfj', 'aldf@dlafjk.com', 23423423423423, 'almfkjaf');

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
