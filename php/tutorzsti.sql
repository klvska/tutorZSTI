-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2024 at 11:11 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutorzsti`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `tutor_name` varchar(255) NOT NULL,
  `tutor_surname` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(500) NOT NULL,
  `date` date DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `communicator` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `likes` int(11) DEFAULT 0,
  `dislikes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `tutor_id`, `tutor_name`, `tutor_surname`, `title`, `content`, `date`, `subject`, `communicator`, `file`, `likes`, `dislikes`) VALUES
(1, 1, 'Jakub', 'Sierant', 'edycja', 'edycja edycja ', '2024-04-01', 'coding', NULL, '434614195_412103885105589_2013108966900846174_n.jpg', 2, 2),
(2, 1, 'Jakub', 'Sierant', 'edycja', 'edycja edycja ', '2024-04-01', 'coding', NULL, '434614195_412103885105589_2013108966900846174_n.jpg', 1, 1),
(3, 7, 'jakub', 'ciesla', 'edycja', 'edycja edycja ', '2024-04-01', 'coding', NULL, '434614195_412103885105589_2013108966900846174_n.jpg', 6, 4),
(4, 7, 'jakub', 'ciesla', 'edycja', 'edycja edycja ', '2024-04-01', 'coding', NULL, '434614195_412103885105589_2013108966900846174_n.jpg', 1, 1),
(5, 8, 'matematyk', 'matematykowski', 'edycja', 'edycja edycja ', '2024-04-01', 'math', NULL, '434614195_412103885105589_2013108966900846174_n.jpg', 2, 0),
(6, 8, 'matematyk', 'matematykowski', 'edycja', 'edycja edycja ', '2024-04-01', 'math', NULL, '434614195_412103885105589_2013108966900846174_n.jpg', 1, 1),
(9, 10, 'sigma', 'ciesla', 'gownogownogowno', '•− −/• • • • /•−/−//• • • • /•−/−/• • • •//− − •/− − −/− • •//• − −/• − •/− − −/• • −/ − − •/• • • •/', '2024-04-10', 'history', NULL, 'mors.cpp', 0, 1),
(10, 10, 'sigma', 'ciesla', 'testowa lekcja ', 'testuje lekcje i rating', '2024-04-10', 'history', NULL, '', 1, 0),
(11, 10, 'sigma', 'ciesla', 'adadadadad', 'adaddada', '2024-04-10', 'history', NULL, '', 1, 0),
(12, 10, 'sigma', 'ciesla', 'fifarafa', 'Fatal error\r\n: Uncaught mysqli_sql_exception: Unknown column \'tutor_id\' in \'where clause\' in C:\\xampp\\htdocs\\tutorZSTI\\tutorZSTI\\lesson.php:72 Stack trace: #0 C:\\xampp\\htdocs\\tutorZSTI\\tutorZSTI\\lesson.php(72): mysqli_query(Object(mysqli), \'UPDATE tutors S...\') #1 {main} thrown in\r\nC:\\xampp\\htdocs\\tutorZSTI\\tutorZSTI\\lesson.php\r\non line\r\n72', '2024-04-10', 'history', NULL, '', 2, 0),
(13, 11, 'Jakub', 'ciesla', 'jak dobrze plakac', 'trzeba sie poplakac ale tak zeby kazdy widzial i sie z ciebie smial, pozdro', '2024-04-10', 'coding', NULL, '', 2, 1),
(16, 11, 'Jakub', 'ciesla', 'ddd', 'ddd', '2024-04-10', 'coding', NULL, '', 1, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tutors`
--

CREATE TABLE `tutors` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `f_name` varchar(55) NOT NULL,
  `s_name` varchar(55) NOT NULL,
  `subject` varchar(55) NOT NULL,
  `skype` varchar(55) DEFAULT NULL,
  `discord` varchar(55) DEFAULT NULL,
  `teams` varchar(55) DEFAULT NULL,
  `topics` varchar(250) NOT NULL,
  `about_me` varchar(250) NOT NULL,
  `rating` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`id`, `user_id`, `f_name`, `s_name`, `subject`, `skype`, `discord`, `teams`, `topics`, `about_me`, `rating`) VALUES
(1, 9, 'Jakub', 'Sierant', 'coding', NULL, '#klvska', NULL, 'sranie w banie. \r\ntestowanie.', 'siema jstem kuba lubie se pograc w kosza pozdro', NULL),
(2, 11, 'Jan', 'Sztukowski', 'coding', 'mam', 'tez', '', 'Równania kwadratowe i funkcje kwadratowe.\r\nAnaliza funkcji trygonometrycznych.\r\nRównania z wartością', 'Cześć! Jestem Jasiu, uczniem z pasją do matematyki i ch', NULL),
(3, 12, 'sigma', 'sigmowy', 'coding', '#sigma321', '#sigma123', '', 'Równania kwadratowe i funkcje kwadratowe.\r\nAnaliza funkcji trygonometrycznych.\r\nRównania z wartością bezwzględną.\r\nLogarytmy i funkcje logarytmiczne.\r\nGeometria analityczna w przestrzeni.\r\nTrygonometria', 'Cześć! Jestem Jasiu, uczniem z pasją do matematyki i chęcią dzielenia się wiedzą z innymi. Pomagam w zrozumieniu trudnych zagadnień matematycznych i wspieram w osiąganiu lepszych wyników w nauce. Moje podejście jest cierpliwe, a wyjaśnienia klarowne.', NULL),
(6, 6, 'murzynek', 'bambo', 'math', NULL, '#gitson13', NULL, 'testowanie.\r\nw. \r\nbanie.\r\n', 'siema jestem ciemny i lubie jesc kfc i grac w koszykowke pozdro dla wszystkich negrow z fartem elo', NULL),
(7, 2, 'jakub', 'ciesla', 'coding', NULL, '#placzek123', NULL, 'kocham.\r\nlekcje.\r\noprogramowania.', 'hejka jestem kubus', NULL),
(8, 14, 'matematyk', 'matematykowski', 'math', 'mam', 'sddsdsdsds', NULL, 'temat.\r\ntemat.\r\ntemat.\r\ntemat.\r\ntemat.', 'matematyka to cos co kocham serio nie klamie', NULL),
(9, 15, 'murzynek', 'ligmowy', 'chemistry', 'chemia', NULL, NULL, 'ggggggg.\r\ngggggg.\r\ndziala.', 'dziala dziala dziala dziala dziala dziala dziala dziala dziala dziala dziala dziala dziala dziala dziala dziala dziala ', NULL),
(10, 16, 'sigma', 'ciesla', 'history', NULL, 'swinkachudzinka', NULL, 'jakub.\r\nciesla.\r\nzsti.\r\n', 'nazywam sie kuba, mm ale pyszny ten epapieros, dobra popalilem sobiem, a teraz zwale sobie konia moim masturbatorem 2000', 2.7),
(11, 17, 'Jakub', 'ciesla', 'coding', NULL, '#swinkachudzinka', NULL, 'programowanie.\r\ntworzenie stron.\r\nnarzekanie/plakanie.\r\njedzenie.\r\n', 'Nazywam sie jakub ciecka, czemu? bo tak nazwala mnie mama ale nie o tym dzisiaj.\r\nmmm ale pyszny ten epapieros, dobra popalilem sobie ide do kompa programowac', 3.33);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `PasswordHash` char(64) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `PasswordHash`, `Email`) VALUES
(2, 'tester', '$2y$10$HwWU/irZydMbBeAa525/j.HatUvpAN4CO1UBuVpOUMGEqVKMeIQgC', 'test@test.pl'),
(4, 'kanye', '$2y$10$wcMusPdBViBW253enSNGyeXl24a0wWTJLxHErk9/8tgeIlgad7oH2', 'kanye@gmail.com'),
(6, 'czarnuch', '$2y$10$U79vGtEbfe4ER.r09Ey2LuBWOCSSlZph1uCCZ88Ro3cRHVxuyfdC.', 'niga@gmail.com'),
(7, 'czarnuch2', '$2y$10$aEoqAGPQsPfKQ65XFkL7geSAngK.Ph2Xkf1I1V2p.BIKo.QMehd32', 'nigaa@gmail.com'),
(8, 'czarnuch22', '$2y$10$MiN3hlv2jRO1LiXEOnzYWOwnL69xW80HafMI86zKPI2now1BVZ7zm', 'nigaaa@gmail.com'),
(9, 'tester', '$2y$10$PU0nNzDUT4a2g6nql9sjseWrSIBnS5GTXF62..2sbFBwVh6eNnGXe', 'tester1@gmail.com'),
(10, 'bimbam', '$2y$10$3cZI9b1odKlGtzbXChXfuu52jaD.yA3ACuasZutMhVnJUop708EmG', 'bimbam@gmail.com'),
(11, 'programista', '$2y$10$sphNv4As/xiDLX23e4WXTOXB4qKDfinmcG5V5TH6ZmLuJe7ma5g5.', 'programista@gmail.com'),
(12, 'sigma', '$2y$10$8KXB1a.UUlKY6REzk5HMCu9VkrGUDHMKX0r9SSMQwn3oy4tqqGsb6', 'test2@gmail.com'),
(13, 'ligma', '$2y$10$XXwb/aGdJctUOntXk96oROKpN0DH928TV5V/BFjg8mGQYE3v8wl9W', 'ligma@gmail.com'),
(14, 'matemaks', '$2y$10$c/CD91VSq92ysdO29Noq..fn/6.Tjh7eqxmX0hCIYOuoCSbuRDKrK', 'matematyk@gmail.com'),
(15, '1234', '$2y$10$m7zkwFRaz/kRf9YqOWTA5.s0TkpjPEwWaYqI4PiaEQ5VcTJF8CoGi', 'gowno@gowno'),
(16, '1234', '$2y$10$jCWK8/qwMIF54JJkOkcbDOLdsl5f6g5BSL2OeyyoOXB7CXIS6vdoC', 'bimbam@g.pl'),
(17, 'admin', '$2y$10$Xa4WjHEwuXLQSN8SKAKmoeYPEw7FBVnZuCu0E1WVRoaODVBdrvksy', 'jakub@ciesla.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_actions`
--

CREATE TABLE `user_actions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `action` enum('like','dislike') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_actions`
--

INSERT INTO `user_actions` (`id`, `user_id`, `lesson_id`, `action`) VALUES
(4, 2, 3, 'like'),
(5, 2, 4, 'dislike'),
(6, 9, 2, 'like'),
(7, 9, 1, 'dislike'),
(8, 9, 3, 'like'),
(9, 9, 4, 'like'),
(10, 14, 5, 'like'),
(11, 14, 1, 'like'),
(12, 14, 6, 'like'),
(14, 15, 1, 'dislike'),
(15, 16, 5, 'like'),
(16, 16, 1, 'like'),
(17, 16, 6, 'dislike'),
(18, 16, 9, 'dislike'),
(19, 16, 2, 'dislike'),
(20, 16, 10, 'like'),
(21, 16, 11, 'like'),
(23, 16, 12, 'like'),
(24, 17, 13, 'like'),
(27, 17, 16, 'dislike'),
(28, 2, 16, 'like'),
(29, 2, 13, 'like'),
(30, 9, 16, 'dislike'),
(31, 9, 13, 'dislike');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- Indeksy dla tabeli `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indeksy dla tabeli `user_actions`
--
ALTER TABLE `user_actions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `lesson_id` (`lesson_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_actions`
--
ALTER TABLE `user_actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`id`);

--
-- Constraints for table `tutors`
--
ALTER TABLE `tutors`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `user_actions`
--
ALTER TABLE `user_actions`
  ADD CONSTRAINT `user_actions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `user_actions_ibfk_2` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
