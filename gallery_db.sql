-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Okt 06. 21:01
-- Kiszolgáló verziója: 10.4.14-MariaDB
-- PHP verzió: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `gallery_db`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `comments`
--

INSERT INTO `comments` (`id`, `photo_id`, `author`, `body`) VALUES
(4, 6, 'EDWIN INSTUCTOR', 'Some comment'),
(5, 9, 'EDWIN INSTUCTOR', 'some comment');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `alternate_text` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `photos`
--

INSERT INTO `photos` (`id`, `title`, `caption`, `description`, `filename`, `alternate_text`, `type`, `size`, `user_id`) VALUES
(10, 'car 4', '', '', '_large_image_3.jpg', '', 'image/jpeg', 165053, 0),
(11, 'car 5', '', '', '_large_image_4.jpg', '', 'image/jpeg', 554659, 1),
(12, 'car 6', '', '', 'images-2.jpg', '', 'image/jpeg', 18578, 0),
(13, 'car 6', '', '', 'images-3.jpg', '', 'image/jpeg', 18096, 0),
(14, 'car 5', '', '', 'images-5.jpg', '', 'image/jpeg', 33192, 0),
(15, 'car 7', '', '', 'images-6.jpg', '', 'image/jpeg', 21886, 0),
(16, '', '', '', 'images-28.jpg', '', 'image/jpeg', 17662, 0),
(17, '', '', '', 'images-35.jpg', '', 'image/jpeg', 23672, 0),
(18, '', '', '', 'images-27.jpg', '', 'image/jpeg', 17662, 0),
(19, '', '', '', 'images-28.jpg', '', 'image/jpeg', 17662, 0),
(20, '', '', '', 'images-27.jpg', '', 'image/jpeg', 17662, 0),
(21, '', '', '', 'images-35.jpg', '', 'image/jpeg', 23672, 0),
(22, '', '', '', 'images-25.jpg', '', 'image/jpeg', 19363, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `user_image`) VALUES
(1, 'rico', '123', '', '', '_large_image_3.jpg'),
(7, 'WHATEVER 2000', 'justpassword', '', '', ''),
(8, 'WILLIAMSON', '', '', '', ''),
(9, 'David45', 'david1989', 'David', 'WILLIAMS', ''),
(10, '', '', '', '', ''),
(11, 'tolita197453', 'secret_password', 'TOLITA', 'APELLIDO', ''),
(12, 'Student', 'something_wierd', 'SOL', 'Don\'t know', ''),
(17, '', '', '', '', ''),
(18, '', '', '', '', ''),
(19, '', '', '', '', ''),
(20, '', '', '', '', ''),
(22, 'Mariana23', '12345678', 'Williams', 'sdfsdfsdfsdf', 'images-20.jpg');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photo_id_index` (`photo_id`);

--
-- A tábla indexei `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
