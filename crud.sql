-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-01-2024 a las 11:48:51
-- Versión del servidor: 10.3.27-MariaDB-0+deb10u1
-- Versión de PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdsge`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crud`
--

CREATE TABLE `crud` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `crud`
--

INSERT INTO `crud` (`id`, `nombre`, `apellidos`, `direccion`, `telefono`, `email`) VALUES
(1, 'Juan', 'Pérez', 'Calle 123', '123456789', 'juan@email.com'),
(2, 'María', 'Gómez', 'Avenida 456', '987654321', 'maria@email.com'),
(3, 'Pedro', 'López', 'Calle Principal', '555112233', 'pedro@email.com'),
(4, 'Ana', 'Martínez', 'Plaza Central', '111222333', 'ana@email.com'),
(5, 'Carlos', 'Rodríguez', 'Paseo del Sol', '555444333', 'carlos@email.com'),
(6, 'Laura', 'Fernández', 'Avenida 789', '123789456', 'laura@email.com'),
(7, 'Diego', 'Hernández', 'Calle de la Luna', '789123456', 'diego@email.com'),
(8, 'Sofía', 'Sánchez', 'Camino Real', '456789123', 'sofia@email.com'),
(9, 'Falillo', 'vacio', 'calle que haya lujo', '+34687546522', 'falillo@gmail.com'),
(10, 'Rafael ', 'González ', 'calle paco granada', '+34634547877', 'gonzalezmartinrafael21@gmail.com'),
(11, 'Miguel', 'López', 'Calle 567', '456789123', 'miguel@email.com'),
(12, 'Carmen', 'Torres', 'Callejón del Río', '789123456', 'carmen@email.com'),
(13, 'Javier', 'Ramírez', 'Avenida del Bosque', '123789456', 'javier@email.com'),
(14, 'Isabel', 'Gómez', 'Paseo de las Flores', '456789123', 'isabel@email.com'),
(15, 'Daniel', 'Ruiz', 'Calle 890', '789123456', 'daniel@email.com'),
(16, 'Adriana', 'Santos', 'Avenida del Mar', '123789456', 'adriana@email.com'),
(17, 'Santiago', 'Fuentes', 'Callejón del Sol', '456789123', 'santiago@email.com'),
(18, 'Elena', 'Pérez', 'Calle de las Estrellas', '789123456', 'elena@email.com'),
(19, 'Iván', 'Molina', 'Avenida 123', '123789456', 'ivan@email.com'),
(20, 'Marta', 'Ortega', 'Paseo de los Sueños', '456789123', 'marta@email.com'),
(21, 'Roberto', 'Cabrera', 'Calle del Recuerdo', '789123456', 'roberto@email.com'),
(22, 'Natalia', 'Ríos', 'Avenida de las Mariposas', '123789456', 'natalia@email.com'),
(23, 'Fernando', 'Serrano', 'Callejón de los Sueños', '456789123', 'fernando@email.com'),
(24, 'Valeria', 'Gutierrez', 'Avenida 456', '789123456', 'valeria@email.com'),
(25, 'Hugo', 'Martín', 'Calle 890', '123789456', 'hugo@email.com'),
(26, 'Sara', 'Salgado', 'Paseo del Sol', '456789123', 'sara@email.com'),
(27, 'Raúl', 'Figueroa', 'Calle de la Luna', '789123456', 'raul@email.com'),
(28, 'Alicia', 'Ortiz', 'Camino Real', '123789456', 'alicia@email.com'),
(29, 'Alberto', 'Navarro', 'Paseo de la Montaña', '456789123', 'alberto@email.com'),
(30, 'Ana', 'Fuentes', 'Avenida Central', '789123456', 'ana@email.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
