-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-08-2024 a las 00:01:31
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinicadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `cita_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `medico_id` int(11) NOT NULL,
  `fecha_cita` datetime NOT NULL,
  `motivo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`cita_id`, `paciente_id`, `medico_id`, `fecha_cita`, `motivo`) VALUES
(1, 1, 1, '2024-08-01 08:30:00', 'Chequeo anual'),
(2, 2, 2, '2024-08-02 09:00:00', 'Consulta dermatológica'),
(3, 3, 3, '2024-08-03 10:30:00', 'Revisión de tiroides'),
(4, 4, 4, '2024-08-04 11:00:00', 'Dolor abdominal'),
(5, 5, 5, '2024-08-05 08:45:00', 'Consulta renal'),
(6, 6, 6, '2024-08-06 09:15:00', 'Chequeo neurológico'),
(7, 7, 7, '2024-08-07 10:50:00', 'Tratamiento oncológico'),
(8, 8, 8, '2024-08-08 11:25:00', 'Control pediátrico'),
(9, 9, 9, '2024-08-09 08:00:00', 'Consulta psiquiátrica'),
(10, 10, 10, '2024-08-10 09:30:00', 'Revisión reumatológica'),
(11, 11, 11, '2024-08-11 10:00:00', 'Consulta urológica'),
(12, 12, 12, '2024-08-12 08:20:00', 'Problemas de oído'),
(13, 13, 13, '2024-08-13 09:50:00', 'Examen de la vista'),
(14, 14, 14, '2024-08-14 11:10:00', 'Lesión ortopédica'),
(15, 15, 15, '2024-08-15 08:40:00', 'Cirugía menor programada'),
(16, 16, 16, '2024-08-16 09:20:00', 'Manejo de anestesia'),
(17, 17, 17, '2024-08-17 10:45:00', 'Chequeo de medicina interna'),
(18, 18, 18, '2024-08-18 11:30:00', 'Radiografía'),
(19, 19, 19, '2024-08-19 08:55:00', 'Consulta de inmunología'),
(20, 10, 10, '2024-08-15 18:35:00', 'Reagendamiento de la prueba'),
(22, 1, 2, '0000-00-00 00:00:00', 'Revisión de la prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `consulta_id` int(11) NOT NULL,
  `cita_id` int(11) NOT NULL,
  `diagnostico` text DEFAULT NULL,
  `tratamiento` text DEFAULT NULL,
  `fecha_consulta` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`consulta_id`, `cita_id`, `diagnostico`, `tratamiento`, `fecha_consulta`) VALUES
(1, 1, 'Todo en orden', 'Continuar con dieta balanceada', '2024-08-01 09:30:00'),
(2, 2, 'Acné moderado', 'Prescripción de cremas tópicas', '2024-08-02 10:00:00'),
(3, 3, 'Hipotiroidismo', 'Ajuste de levotiroxina', '2024-08-03 11:30:00'),
(4, 4, 'Gastritis', 'Medicamento antiácido', '2024-08-04 12:00:00'),
(5, 5, 'Piedras en el riñón', 'Planificación de litotripsia', '2024-08-05 09:45:00'),
(6, 6, 'Migraña', 'Tratamiento preventivo', '2024-08-06 10:15:00'),
(7, 7, 'Revisión de quimioterapia', 'Ajustar dosis', '2024-08-07 11:50:00'),
(8, 8, 'Vacunas al día', 'Programar próxima vacuna', '2024-08-08 12:25:00'),
(9, 9, 'Ansiedad', 'Terapia cognitiva conductual', '2024-08-09 09:00:00'),
(10, 10, 'Artritis reumatoide', 'Iniciar terapia biológica', '2024-08-10 10:30:00'),
(11, 11, 'Infección urinaria', 'Antibióticos', '2024-08-11 11:00:00'),
(12, 12, 'Infección de oídos', 'Gotas óticas antibióticas', '2024-08-12 09:20:00'),
(13, 13, 'Miopía', 'Prescripción de lentes', '2024-08-13 10:50:00'),
(14, 14, 'Fractura de tobillo', 'Inmovilización con yeso', '2024-08-14 12:10:00'),
(15, 15, 'Apendicitis', 'Cirugía de apéndice', '2024-08-15 09:40:00'),
(16, 16, 'Preparación para cirugía', 'Protocolos preoperatorios', '2024-08-16 10:20:00'),
(17, 17, 'Control de diabetes', 'Ajuste de insulina', '2024-08-17 11:45:00'),
(18, 18, 'Fractura de brazo', 'Radiografía de seguimiento', '2024-08-18 12:30:00'),
(19, 19, 'Alergia estacional', 'Inmunoterapia', '2024-08-19 09:55:00'),
(20, 20, 'Chequeo general', 'Actualizar medicamentos', '2024-08-20 10:35:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `especialidad_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`especialidad_id`, `nombre`, `descripcion`) VALUES
(1, 'especialidad modificada', '0'),
(2, 'especialidad modificada', '0'),
(3, 'especialidad modificada', '0'),
(4, 'especialidad modificada', '0'),
(5, 'especialidad modificada', '0'),
(6, 'especialidad modificada', '0'),
(7, 'especialidad modificada', '0'),
(8, 'especialidad modificada', '0'),
(9, 'especialidad modificada', '0'),
(10, 'especialidad modificada', '0'),
(11, 'especialidad modificada', '0'),
(12, 'especialidad modificada', '0'),
(13, 'especialidad modificada', '0'),
(14, 'especialidad modificada', '0'),
(15, 'especialidad modificada', '0'),
(16, 'especialidad modificada', '0'),
(17, 'especialidad modificada', '0'),
(18, 'especialidad modificada', '0'),
(19, 'especialidad modificada', '0'),
(20, 'especialidad modificada', '0'),
(22, 'especialidad modificada', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `medico_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `especialidad_id` int(11) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`medico_id`, `nombre`, `apellido`, `especialidad_id`, `telefono`, `email`) VALUES
(1, 'Roberto', 'Hernández', 1, '0999123123', 'roberto.hernandez@email.com'),
(2, 'Carmen', 'Lara', 2, '0999234234', 'carmen.lara@email.com'),
(3, 'Francisco', 'Ortiz', 3, '0999345345', 'francisco.ortiz@email.com'),
(4, 'Diana', 'Prado', 4, '0999456456', 'diana.prado@email.com'),
(5, 'Miguel', 'Arroyo', 5, '0999567567', 'miguel.arroyo@email.com'),
(6, 'Susana', 'Barrera', 6, '0999678678', 'susana.barrera@email.com'),
(7, 'Ricardo', 'Quintana', 7, '0999789789', 'ricardo.quintana@email.com'),
(8, 'Amelia', 'Vega', 8, '0999890890', 'amelia.vega@email.com'),
(9, 'Julio', 'Mendez', 9, '0999901901', 'julio.mendez@email.com'),
(10, 'Paula', 'Cano', 10, '0999012012', 'paula.cano@email.com'),
(11, 'Sergio', 'Campos', 11, '0999123123', 'sergio.campos@email.com'),
(12, 'Beatriz', 'Gil', 12, '0999234234', 'beatriz.gil@email.com'),
(13, 'Álvaro', 'Fuentes', 13, '0999345345', 'alvaro.fuentes@email.com'),
(14, 'Clara', 'Salas', 14, '0999456456', 'clara.salas@email.com'),
(15, 'Pablo', 'Mora', 15, '0999567567', 'pablo.mora@email.com'),
(16, 'Lorena', 'Rojas', 16, '0999678678', 'lorena.rojas@email.com'),
(17, 'Alberto', 'Prieto', 17, '0999789789', 'alberto.prieto@email.com'),
(18, 'Rosa', 'Vidal', 18, '0999890890', 'rosa.vidal@email.com'),
(19, 'César', 'Benitez', 19, '0999901901', 'cesar.benitez@email.com'),
(20, 'Noelia', 'Herrera', 20, '0999012012', 'noelia.herrera@email.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `paciente_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`paciente_id`, `nombre`, `apellido`, `direccion`, `telefono`) VALUES
(1, 'Juan', 'Pérez', 'Av. Siempre Viva 123', '0999101191'),
(2, 'María', 'García', 'Calle Falsa 456', '0999202292'),
(3, 'Luis', 'Martínez', 'Blvd. Las Flores 789', '0999303393'),
(4, 'Ana', 'López', 'Ruta del Sol 101', '0999404494'),
(5, 'Carlos', 'Sanchez', 'Camino Largo 212', '0999505595'),
(6, 'Lucía', 'Morales', 'Av. Principal 323', '0999606696'),
(7, 'David', 'Díaz', 'Paseo de la Reforma 434', '0999707797'),
(8, 'Sofía', 'Ramírez', 'Jardines del Valle 545', '0999808898'),
(9, 'Daniel', 'González', 'Urb. El Bosque 656', '0999909999'),
(10, 'Marta', 'Ruiz', 'Av. Los Pinos 767', '0999010101'),
(11, 'Pedro', 'Moreno', 'Alameda del Río 878', '0999020202'),
(12, 'Isabel', 'Jiménez', 'Residencial La Palma 989', '0999030303'),
(13, 'Diego', 'Torres', 'Sector Norte 090', '0999040404'),
(14, 'Sara', 'Alvarez', 'Colonia del Parque 191', '0999050505'),
(15, 'Jorge', 'Gutierrez', 'Av. Del Mar 292', '0999060606'),
(16, 'Laura', 'Romero', 'Calzada del Ángel 393', '0999070707'),
(17, 'Oscar', 'Navarro', 'Ronda del Lago 494', '0999080808'),
(18, 'Teresa', 'Soto', 'Paseo Colón 595', '0999090909'),
(19, 'Eduardo', 'Blanco', 'Sector Sur 696', '0999019191'),
(20, 'Carla', 'Molina', 'Barrio del Centro 797', '0999029292'),
(22, 'otorrinolaringologo espacial', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`cita_id`),
  ADD KEY `paciente_id` (`paciente_id`),
  ADD KEY `medico_id` (`medico_id`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`consulta_id`),
  ADD KEY `cita_id` (`cita_id`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`especialidad_id`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`medico_id`),
  ADD KEY `especialidad_id` (`especialidad_id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`paciente_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `cita_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `consulta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `especialidad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `medico_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `paciente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`paciente_id`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`medico_id`) REFERENCES `medicos` (`medico_id`);

--
-- Filtros para la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`cita_id`);

--
-- Filtros para la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `medicos_ibfk_1` FOREIGN KEY (`especialidad_id`) REFERENCES `especialidades` (`especialidad_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
