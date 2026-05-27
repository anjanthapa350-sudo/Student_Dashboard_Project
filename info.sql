-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2025 at 12:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `course` varchar(255) NOT NULL,
  `profilephoto` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `full_name`, `email`, `password`, `phone`, `course`, `profilephoto`) VALUES
(1, 'aj', 'thapaanjan000@gmail.com', '$2y$10$WyhXCBOwSAl5ogfCjZT35.iKAgFpN19/ZuH2KXf2BilBFVB68iYPe', '9860385387', 'Compute', '133725737318643658.jpg'),
(2, 'anjanthapa', 'thapaanjan000@gmail.com', '$2y$10$ipkN87WMz0lNrNIJnFSwYOaeC7/AP83tswlRj0.YpukLq4ewxdWE6', '9860385387', 'Computer Science', '1.png'),
(3, 'anjanthapa', 'thapaanjan000@gmail.com', '$2y$10$KC3Jnb4PCry8BIJVvFky6.4SjOwAmYlKvlXNZGRSbQHQ3Ls/mN9XG', '9860385387', 'Computer Science', '1.png'),
(4, 'anjanthapa', 'thapaanjan000@gmail.com', '$2y$10$FcNX3LPS5wvcWeu7MK6t.ey5zH9RVbOgUk9.P3C7Q.DlFOLJPSdEu', '9860385387', 'Computer Science', '1.png'),
(5, 'anjanthapa', 'thapaanjan000@gmail.com', '$2y$10$cSd3xi.hOde2tO38u.pcpO35bMbKgL.C.3ORncgvcsjpKaDan7JrG', '9860385387', 'Computer Science', '1.png'),
(6, 'anjanthapa', 'thapaanjan000@gmail.com', '$2y$10$DrLmylkRVRzmlvK9seJVxuZp81wYoU6E1OAKwOdWDzsxzM7qUFYHq', '9860385387', 'Computer Science', '1.png'),
(7, 'anjanthapa', 'thapaanjan000@gmail.com', '$2y$10$7Q4626hrVuIfFD0QdjzQYOg9QYl6AvAoUfe5LcS3H5qxDsuF5Wr6m', '9860385387', 'Computer Science', '133725737318643658.jpg'),
(11, 'an', 'anusha@gmail.com', '$2y$10$MPIqU298OQjca5VpcdToLezDmAr9A.9nuyYRaDEFmi9TgjSxPhYx2', '986038999999', 'Science', 'Screenshot_2025-03-30_210006.png'),
(12, 'Jk', 'john.doe@student.edu', '$2y$10$8y30LmZn8jwFSlQx1j/Xpunps9cc.0f.GWO/to8PcVNchq/wtVNfS', '986038999999', ' Science', 'Screenshot_2025-03-30_210006.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
