-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 06:14 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academia1`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
  `dni` varchar(10) NOT NULL,
  `rol` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`dni`, `rol`) VALUES
('666666666d', 'administrador');

-- --------------------------------------------------------

--
-- Table structure for table `alumno`
--

CREATE TABLE `alumno` (
  `dni` varchar(10) NOT NULL,
  `centro` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumno`
--

INSERT INTO `alumno` (`dni`, `centro`) VALUES
('111111113t', 'Triana'),
('111111114f', 'Triana'),
('111111115y', 'Becquer'),
('111111117u', 'Triana'),
('111111119k', 'Azahar'),
('222222221k', 'Becquer'),
('222222222b', 'Becquer'),
('222222223e', 'Salesianos'),
('222222224h', 'Salesianos'),
('222222225z', 'Triana'),
('222222226v', 'Triana'),
('222222227a', 'Azahar'),
('222222228n', 'Triana'),
('222222229x', 'Salesianos'),
('333333333h', 'Azahar'),
('333333333s', 'Triana'),
('555555555g', 'Becquer'),
('919191999h', 'Triana'),
('999999999w', 'Salesianos');

-- --------------------------------------------------------

--
-- Table structure for table `asignatura`
--

CREATE TABLE `asignatura` (
  `id` int(10) NOT NULL,
  `dni_profesor` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asignatura`
--

INSERT INTO `asignatura` (`id`, `dni_profesor`, `nombre`) VALUES
(2, '111111111m', 'fisica'),
(3, '777777777f', 'matematicas'),
(5, '123123444r', 'ingles');

-- --------------------------------------------------------

--
-- Table structure for table `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` int(10) NOT NULL,
  `dni_alumno` varchar(10) NOT NULL,
  `id_asignatura` int(10) NOT NULL,
  `calificacion` int(3) NOT NULL,
  `fecha` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calificaciones`
--

INSERT INTO `calificaciones` (`id`, `dni_alumno`, `id_asignatura`, `calificacion`, `fecha`) VALUES
(2, '111111113t', 2, 5, '09.01'),
(3, '111111113t', 2, 6, '17.01'),
(4, '111111113t', 2, 7, '01.02'),
(5, '111111113t', 2, 8, '27.01'),
(6, '111111113t', 2, 5, '15.01'),
(7, '111111113t', 2, 9, '11.02'),
(8, '111111113t', 3, 6, '11.01');

-- --------------------------------------------------------

--
-- Table structure for table `horario`
--

CREATE TABLE `horario` (
  `id` int(10) NOT NULL,
  `dni_profesor` varchar(10) NOT NULL,
  `dia` varchar(10) NOT NULL,
  `hora` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `horario`
--

INSERT INTO `horario` (`id`, `dni_profesor`, `dia`, `hora`) VALUES
(1, '777777777f', 'lunes', '16'),
(2, '777777777f', 'martes', '17'),
(3, '777777777f', 'lunes', '17'),
(4, '777777777f', 'martes', '18'),
(5, '777777777f', 'miercoles', '16'),
(6, '777777777f', 'miercoles', '17'),
(7, '777777777f', 'miercoles', '18'),
(8, '777777777f', 'miercoles', '19'),
(9, '777777777f', 'miercoles', '20'),
(10, '777777777f', 'jueves', '16'),
(11, '777777777f', 'jueves', '17'),
(12, '777777777f', 'jueves', '18'),
(13, '777777777f', 'jueves', '19'),
(14, '777777777f', 'jueves', '20'),
(15, '777777777f', 'viernes', '16'),
(16, '777777777f', 'viernes', '17'),
(17, '777777777f', 'viernes', '18'),
(18, '777777777f', 'viernes', '19'),
(19, '111111111m', 'lunes', '16'),
(20, '111111111m', 'lunes', '17'),
(21, '111111111m', 'lunes', '18'),
(22, '111111111m', 'lunes', '19'),
(23, '111111111m', 'lunes', '20'),
(24, '111111111m', 'martes', '16'),
(25, '111111111m', 'martes', '17'),
(26, '111111111m', 'martes', '18'),
(27, '111111111m', 'martes', '19'),
(28, '111111111m', 'martes', '20'),
(29, '111111111m', 'miercoles', '16'),
(30, '111111111m', 'miercoles', '17'),
(31, '111111111m', 'miercoles', '18'),
(32, '111111111m', 'miercoles', '19'),
(33, '111111111m', 'miercoles', '20'),
(34, '111111111m', 'jueves', '16'),
(35, '111111111m', 'jueves', '17'),
(36, '111111111m', 'jueves', '18'),
(37, '111111111m', 'jueves', '19'),
(39, '123123444r', 'lunes', '16'),
(40, '123123444r', 'lunes', '17'),
(41, '123123444r', 'lunes', '18'),
(42, '123123444r', 'lunes', '19'),
(44, '111111111m', 'jueves', '20');

-- --------------------------------------------------------

--
-- Table structure for table `imparte`
--

CREATE TABLE `imparte` (
  `dni_profesor` varchar(10) NOT NULL,
  `id_horario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imparte`
--

INSERT INTO `imparte` (`dni_profesor`, `id_horario`) VALUES
('111111111m', 19),
('111111111m', 24),
('111111111m', 29),
('111111111m', 34),
('123123444r', 39),
('123123444r', 40),
('123123444r', 41),
('123123444r', 42),
('777777777f', 1),
('777777777f', 2),
('777777777f', 3),
('777777777f', 4),
('777777777f', 5),
('777777777f', 6),
('777777777f', 7),
('777777777f', 8),
('777777777f', 9),
('777777777f', 10),
('777777777f', 11),
('777777777f', 12),
('777777777f', 13),
('777777777f', 14),
('777777777f', 15),
('777777777f', 16),
('777777777f', 17),
('777777777f', 18);

-- --------------------------------------------------------

--
-- Table structure for table `matricula`
--

CREATE TABLE `matricula` (
  `dni_alumno` varchar(10) NOT NULL,
  `id_asignatura` int(10) NOT NULL,
  `id_horario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matricula`
--

INSERT INTO `matricula` (`dni_alumno`, `id_asignatura`, `id_horario`) VALUES
('111111113t', 2, 19),
('111111113t', 2, 24),
('111111113t', 2, 29),
('111111113t', 2, 34),
('111111113t', 3, 2),
('111111114f', 2, 19),
('111111114f', 2, 24),
('111111114f', 2, 29),
('111111114f', 2, 34),
('555555555g', 2, 19),
('555555555g', 2, 34),
('919191999h', 2, 19);

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
  `dni` varchar(10) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`dni`, `nombre`, `apellidos`, `email`) VALUES
('111111111m', 'Luis', 'Montero', 'montero@hotmail.com'),
('111111112u', 'Daniel', 'Romero', 'romero@msn.com'),
('111111113t', 'Alonso', 'Torres', 'torres@msn.com'),
('111111114f', 'Andres', 'Dominguez', 'adominguez@msn.com'),
('111111115y', 'Bruno ', 'Navarro', 'navarro@msn.com'),
('111111116f', 'Sara', 'Castro', 'castro@msn.com'),
('111111117u', 'Emma', 'Ortega', 'ortega@msn.com'),
('111111119k', 'Alan', 'Diaz', 'diaz@msn.com'),
('121212121n', 'Nuria', 'Vidal', 'vidal@msn.com'),
('123123444r', 'Tamara', 'Reyes', 'reyes@msn.com'),
('222222221k', 'Olivia', 'Ortiz', 'ortiz@hotmail.com'),
('222222222b', 'Carina', 'Lopez', 'lopezc@hotmail.com'),
('222222223e', 'Aitana', 'Delgado', 'delgado@hotmail.com'),
('222222224h', 'Adriana', 'Rubio', 'rubio@msn.com'),
('222222225z', 'Elena', 'Medina', 'medina@msn.com'),
('222222226v', 'Blanca', 'Castillo', 'castillo@hotmail.com'),
('222222227a', 'Ainhoa', 'Cano', 'cano@hotmail.com'),
('222222227m', 'Nora', 'Sanz', 'sanz@hotmail.com'),
('222222228n', 'Nerea', 'Iglesias', 'iglesias@msn.com'),
('222222229x', 'Marco', 'Gallego', 'gallego@hotmail.com'),
('333333333h', 'Gonzalo', 'Lozano', 'lozano@hotmal.com'),
('333333333s', 'Miguel', 'Perez', 'perez@hotmail.com'),
('555555555g', 'Margarita', 'Garcia', 'garcia@hotmail.com'),
('666666666d', 'Marta', 'Rodriguez', 'rodriguez@hotmail.com'),
('777777777f', 'Hugo', 'Ramos', 'ramos@hotmail.com'),
('888888889e', 'Epifanio', 'Ordoñez', 'ordoñez@hotmail.com'),
('919191999h', 'Milena', 'Heno', 'heno@msn.com'),
('999888111r', 'Rodrigo', 'Mora', 'mora@msn.com'),
('999999999w', 'Mateo', 'Gomez', 'gomez@msn.com');

-- --------------------------------------------------------

--
-- Table structure for table `profesor`
--

CREATE TABLE `profesor` (
  `dni` varchar(10) NOT NULL,
  `tipo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profesor`
--

INSERT INTO `profesor` (`dni`, `tipo`) VALUES
('111111111m', 'fisica'),
('111111112u', 'ingles'),
('111111116f', 'lengua'),
('121212121n', 'fisica'),
('123123444r', 'ingles'),
('777777777f', 'matematicas'),
('888888889e', 'historia'),
('999888111r', 'historia');

--
-- Triggers `profesor`
--
DELIMITER $$
CREATE TRIGGER `insertar_en_asignatura` AFTER INSERT ON `profesor` FOR EACH ROW BEGIN
    INSERT INTO Asignatura (dni_profesor, nombre)
    VALUES (NEW.dni, NEW.tipo);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `recursos`
--

CREATE TABLE `recursos` (
  `id` int(10) NOT NULL,
  `dni_alumno` varchar(10) NOT NULL,
  `id_asignatura` int(10) NOT NULL,
  `ruta_recurso` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recursos`
--

INSERT INTO `recursos` (`id`, `dni_alumno`, `id_asignatura`, `ruta_recurso`) VALUES
(4, '111111113t', 2, 'Recuperación.pdf');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vistahorarioclases`
-- (See below for the actual view)
--
CREATE TABLE `vistahorarioclases` (
`dia` varchar(10)
,`hora` varchar(5)
,`id_horario` int(10)
,`nombre` varchar(40)
,`dni` varchar(10)
,`tipo` varchar(40)
,`id_asignatura` int(10)
,`num_alumnos` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `vistahorarioclases`
--
DROP TABLE IF EXISTS `vistahorarioclases`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistahorarioclases`  AS SELECT `horario`.`dia` AS `dia`, `horario`.`hora` AS `hora`, `horario`.`id` AS `id_horario`, `persona`.`nombre` AS `nombre`, `profesor`.`dni` AS `dni`, `profesor`.`tipo` AS `tipo`, `asignatura`.`id` AS `id_asignatura`, count(`matricula`.`dni_alumno`) AS `num_alumnos` FROM (((((`horario` join `imparte` on(`horario`.`id` = `imparte`.`id_horario`)) join `profesor` on(`imparte`.`dni_profesor` = `profesor`.`dni`)) join `persona` on(`profesor`.`dni` = `persona`.`dni`)) join `asignatura` on(`asignatura`.`dni_profesor` = `profesor`.`dni`)) left join `matricula` on(`horario`.`id` = `matricula`.`id_horario`)) GROUP BY `horario`.`dia`, `horario`.`hora`, `horario`.`id`, `persona`.`nombre`, `profesor`.`tipo`, `asignatura`.`nombre` ORDER BY CASE WHEN `horario`.`dia` = 'lunes' THEN 1 WHEN `horario`.`dia` = 'martes' THEN 2 WHEN `horario`.`dia` = 'miercoles' THEN 3 WHEN `horario`.`dia` = 'jueves' THEN 4 WHEN `horario`.`dia` = 'viernes' THEN 5 WHEN `horario`.`dia` = 'sabado' THEN 6 WHEN `horario`.`dia` = 'domingo' THEN 7 END ASC, `horario`.`hora` ASC  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`dni`);

--
-- Indexes for table `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`dni`);

--
-- Indexes for table `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dni_profesor` (`dni_profesor`);

--
-- Indexes for table `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_alumno` (`dni_alumno`),
  ADD KEY `fk_asign` (`id_asignatura`);

--
-- Indexes for table `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_profesor` (`dni_profesor`);

--
-- Indexes for table `imparte`
--
ALTER TABLE `imparte`
  ADD PRIMARY KEY (`dni_profesor`,`id_horario`),
  ADD KEY `fk_horario` (`id_horario`);

--
-- Indexes for table `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`dni_alumno`,`id_asignatura`,`id_horario`),
  ADD KEY `fk_id_asignatura` (`id_asignatura`),
  ADD KEY `fk_id_horario` (`id_horario`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`dni`);

--
-- Indexes for table `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`dni`);

--
-- Indexes for table `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_asignatura` (`id_asignatura`),
  ADD KEY `fk_alumn` (`dni_alumno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_dni_administrador` FOREIGN KEY (`dni`) REFERENCES `persona` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `persona` (`dni`) ON UPDATE CASCADE;

--
-- Constraints for table `asignatura`
--
ALTER TABLE `asignatura`
  ADD CONSTRAINT `asignatura_ibfk_1` FOREIGN KEY (`dni_profesor`) REFERENCES `profesor` (`dni`),
  ADD CONSTRAINT `fk_dni_profesor_imparte` FOREIGN KEY (`dni_profesor`) REFERENCES `imparte` (`dni_profesor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `fk_alumno` FOREIGN KEY (`dni_alumno`) REFERENCES `alumno` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_asign` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `fk_profesor` FOREIGN KEY (`dni_profesor`) REFERENCES `profesor` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imparte`
--
ALTER TABLE `imparte`
  ADD CONSTRAINT `fk_dni_prof` FOREIGN KEY (`dni_profesor`) REFERENCES `profesor` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_horario` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `fk_dni_alumno` FOREIGN KEY (`dni_alumno`) REFERENCES `alumno` (`dni`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_asignatura` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_horario` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `fk_dni_profesor` FOREIGN KEY (`dni`) REFERENCES `persona` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recursos`
--
ALTER TABLE `recursos`
  ADD CONSTRAINT `fk_alumn` FOREIGN KEY (`dni_alumno`) REFERENCES `alumno` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_asignatura` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
