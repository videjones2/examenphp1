-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2023 a las 00:42:28
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examenphp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `changelog`
--

CREATE TABLE `changelog` (
  `id` varchar(20) NOT NULL,
  `dextarget` int(11) DEFAULT NULL,
  `autor` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `comentario` text DEFAULT NULL,
  `undoquery` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokedex`
--

CREATE TABLE `pokedex` (
  `idnumber` int(4) NOT NULL,
  `pokename` text DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `abilityA` text DEFAULT NULL,
  `abilityB` text DEFAULT NULL,
  `captureTS` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pokedex`
--

INSERT INTO `pokedex` (`idnumber`, `pokename`, `photo`, `summary`, `abilityA`, `abilityB`, `captureTS`) VALUES
(287, 'Slakoth', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/287.png', 'A Slakoth le late el corazón una vez por minuto. Ya puede\r\npasar lo que pase, que este Pokémon no mueve un dedo.\r\nEstá todo el día holgazaneando. Es muy raro verlo en\r\nmovimiento.', 'truant', '', '2023-06-04 22:36:59'),
(365, 'Walrein', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/365.png', 'Walrein va nadando por mares glaciales y destrozando\r\nicebergs con los enormes e imponentes colmillos que tiene.\r\nLa gruesa capa de grasa que tiene en el cuerpo hace que los\r\nataques enemigos reboten y no le hagan ningún daño.', 'thick-fat', 'ice-body', '2023-06-04 22:11:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `displayname` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`username`, `displayname`, `pass`) VALUES
('s2credit', 'Joshua Leal Diaz', 'c653bc574ddc88111af2d81e4455a1fd');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `changelog`
--
ALTER TABLE `changelog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor` (`autor`);

--
-- Indices de la tabla `pokedex`
--
ALTER TABLE `pokedex`
  ADD PRIMARY KEY (`idnumber`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `changelog`
--
ALTER TABLE `changelog`
  ADD CONSTRAINT `changelog_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
