-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS ClinicaDB;
USE ClinicaDB;

-- Crear la tabla 'Pacientes'
CREATE TABLE Pacientes (
    paciente_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    direccion VARCHAR(200) NOT NULL,
    telefono VARCHAR(15) NOT NULL
);

-- Crear la tabla 'Medicos'
CREATE TABLE Especialidades (
    especialidad_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
	descripcion TEXT NOT NULL
	);

-- Crear la tabla 'Medicos'
CREATE TABLE Medicos (
    medico_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
	apellido VARCHAR(100) NOT NULL,
    especialidad_id INT NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    email VARCHAR(50) NOT NULL,
	FOREIGN KEY (especialidad_id) REFERENCES Especialidades(especialidad_id)
);

-- Crear la tabla 'Citas'
CREATE TABLE Citas (
    cita_id INT AUTO_INCREMENT PRIMARY KEY,
    paciente_id INT NOT NULL,
    medico_id INT NOT NULL,
    fecha_cita DATETIME NOT NULL,
    motivo TEXT,
    FOREIGN KEY (paciente_id) REFERENCES Pacientes(paciente_id),
    FOREIGN KEY (medico_id) REFERENCES Medicos(medico_id)
);



-- Crear la tabla 'Consultas' que se deriva de una cita
CREATE TABLE Consultas (
    consulta_id INT AUTO_INCREMENT PRIMARY KEY,
    cita_id INT NOT NULL,
    diagnostico TEXT,
    tratamiento TEXT,
    fecha_consulta DATETIME NOT NULL,
    FOREIGN KEY (cita_id) REFERENCES Citas(cita_id)
);

--- inserts 

INSERT INTO Pacientes (nombre, apellido, direccion, telefono) VALUES
('Juan', 'Pérez', 'Av. Siempre Viva 123', '0999101191'),
('María', 'García', 'Calle Falsa 456', '0999202292'),
('Luis', 'Martínez', 'Blvd. Las Flores 789', '0999303393'),
('Ana', 'López', 'Ruta del Sol 101', '0999404494'),
('Carlos', 'Sanchez', 'Camino Largo 212', '0999505595'),
('Lucía', 'Morales', 'Av. Principal 323', '0999606696'),
('David', 'Díaz', 'Paseo de la Reforma 434', '0999707797'),
('Sofía', 'Ramírez', 'Jardines del Valle 545', '0999808898'),
('Daniel', 'González', 'Urb. El Bosque 656', '0999909999'),
('Marta', 'Ruiz', 'Av. Los Pinos 767', '0999010101'),
('Pedro', 'Moreno', 'Alameda del Río 878', '0999020202'),
('Isabel', 'Jiménez', 'Residencial La Palma 989', '0999030303'),
('Diego', 'Torres', 'Sector Norte 090', '0999040404'),
('Sara', 'Alvarez', 'Colonia del Parque 191', '0999050505'),
('Jorge', 'Gutierrez', 'Av. Del Mar 292', '0999060606'),
('Laura', 'Romero', 'Calzada del Ángel 393', '0999070707'),
('Oscar', 'Navarro', 'Ronda del Lago 494', '0999080808'),
('Teresa', 'Soto', 'Paseo Colón 595', '0999090909'),
('Eduardo', 'Blanco', 'Sector Sur 696', '0999019191'),
('Carla', 'Molina', 'Barrio del Centro 797', '0999029292');


INSERT INTO Especialidades (nombre, descripcion) VALUES
('Cardiología', 'Tratamiento de enfermedades relacionadas con el corazón y el sistema circulatorio.'),
('Dermatología', 'Tratamiento de enfermedades de la piel, cabello y uñas.'),
('Endocrinología', 'Tratamiento de trastornos hormonales y metabólicos.'),
('Gastroenterología', 'Tratamiento de enfermedades del sistema digestivo.'),
('Nefrología', 'Tratamiento de enfermedades del riñón.'),
('Neurología', 'Tratamiento de trastornos del sistema nervioso.'),
('Oncología', 'Tratamiento del cáncer.'),
('Pediatría', 'Cuidado médico para infantes, niños y adolescentes.'),
('Psiquiatría', 'Tratamiento de trastornos mentales.'),
('Reumatología', 'Tratamiento de enfermedades que afectan las articulaciones y tejidos blandos.'),
('Urología', 'Tratamiento de enfermedades del tracto urinario y el sistema reproductor masculino.'),
('Otorrinolaringología', 'Tratamiento de condiciones del oído, nariz y garganta.'),
('Oftalmología', 'Tratamiento de enfermedades de los ojos.'),
('Ortopedia', 'Tratamiento de lesiones y enfermedades del sistema musculoesquelético.'),
('Cirugía General', 'Realización de procedimientos quirúrgicos generales.'),
('Anestesiología', 'Manejo del dolor y anestesia durante procedimientos quirúrgicos.'),
('Medicina Interna', 'Atención integral de adultos, diagnóstico y tratamiento no quirúrgico.'),
('Radiología', 'Uso de imágenes para diagnosticar y tratar enfermedades.'),
('Inmunología', 'Tratamiento de enfermedades del sistema inmunológico.'),
('Geriatría', 'Cuidado médico especializado para personas mayores.');


INSERT INTO Medicos (nombre, apellido, especialidad_id, telefono, email) VALUES
('Roberto', 'Hernández', 1, '0999123123', 'roberto.hernandez@email.com'),
('Carmen', 'Lara', 2, '0999234234', 'carmen.lara@email.com'),
('Francisco', 'Ortiz', 3, '0999345345', 'francisco.ortiz@email.com'),
('Diana', 'Prado', 4, '0999456456', 'diana.prado@email.com'),
('Miguel', 'Arroyo', 5, '0999567567', 'miguel.arroyo@email.com'),
('Susana', 'Barrera', 6, '0999678678', 'susana.barrera@email.com'),
('Ricardo', 'Quintana', 7, '0999789789', 'ricardo.quintana@email.com'),
('Amelia', 'Vega', 8, '0999890890', 'amelia.vega@email.com'),
('Julio', 'Mendez', 9, '0999901901', 'julio.mendez@email.com'),
('Paula', 'Cano', 10, '0999012012', 'paula.cano@email.com'),
('Sergio', 'Campos', 11, '0999123123', 'sergio.campos@email.com'),
('Beatriz', 'Gil', 12, '0999234234', 'beatriz.gil@email.com'),
('Álvaro', 'Fuentes', 13, '0999345345', 'alvaro.fuentes@email.com'),
('Clara', 'Salas', 14, '0999456456', 'clara.salas@email.com'),
('Pablo', 'Mora', 15, '0999567567', 'pablo.mora@email.com'),
('Lorena', 'Rojas', 16, '0999678678', 'lorena.rojas@email.com'),
('Alberto', 'Prieto', 17, '0999789789', 'alberto.prieto@email.com'),
('Rosa', 'Vidal', 18, '0999890890', 'rosa.vidal@email.com'),
('César', 'Benitez', 19, '0999901901', 'cesar.benitez@email.com'),
('Noelia', 'Herrera', 20, '0999012012', 'noelia.herrera@email.com');


INSERT INTO Citas (paciente_id, medico_id, fecha_cita, motivo) VALUES
(1, 1, '2024-08-01 08:30:00', 'Chequeo anual'),
(2, 2, '2024-08-02 09:00:00', 'Consulta dermatológica'),
(3, 3, '2024-08-03 10:30:00', 'Revisión de tiroides'),
(4, 4, '2024-08-04 11:00:00', 'Dolor abdominal'),
(5, 5, '2024-08-05 08:45:00', 'Consulta renal'),
(6, 6, '2024-08-06 09:15:00', 'Chequeo neurológico'),
(7, 7, '2024-08-07 10:50:00', 'Tratamiento oncológico'),
(8, 8, '2024-08-08 11:25:00', 'Control pediátrico'),
(9, 9, '2024-08-09 08:00:00', 'Consulta psiquiátrica'),
(10, 10, '2024-08-10 09:30:00', 'Revisión reumatológica'),
(11, 11, '2024-08-11 10:00:00', 'Consulta urológica'),
(12, 12, '2024-08-12 08:20:00', 'Problemas de oído'),
(13, 13, '2024-08-13 09:50:00', 'Examen de la vista'),
(14, 14, '2024-08-14 11:10:00', 'Lesión ortopédica'),
(15, 15, '2024-08-15 08:40:00', 'Cirugía menor programada'),
(16, 16, '2024-08-16 09:20:00', 'Manejo de anestesia'),
(17, 17, '2024-08-17 10:45:00', 'Chequeo de medicina interna'),
(18, 18, '2024-08-18 11:30:00', 'Radiografía'),
(19, 19, '2024-08-19 08:55:00', 'Consulta de inmunología'),
(20, 20, '2024-08-20 09:35:00', 'Cuidado geriátrico');

INSERT INTO Consultas (cita_id, diagnostico, tratamiento, fecha_consulta) VALUES
(1, 'Todo en orden', 'Continuar con dieta balanceada', '2024-08-01 09:30:00'),
(2, 'Acné moderado', 'Prescripción de cremas tópicas', '2024-08-02 10:00:00'),
(3, 'Hipotiroidismo', 'Ajuste de levotiroxina', '2024-08-03 11:30:00'),
(4, 'Gastritis', 'Medicamento antiácido', '2024-08-04 12:00:00'),
(5, 'Piedras en el riñón', 'Planificación de litotripsia', '2024-08-05 09:45:00'),
(6, 'Migraña', 'Tratamiento preventivo', '2024-08-06 10:15:00'),
(7, 'Revisión de quimioterapia', 'Ajustar dosis', '2024-08-07 11:50:00'),
(8, 'Vacunas al día', 'Programar próxima vacuna', '2024-08-08 12:25:00'),
(9, 'Ansiedad', 'Terapia cognitiva conductual', '2024-08-09 09:00:00'),
(10, 'Artritis reumatoide', 'Iniciar terapia biológica', '2024-08-10 10:30:00'),
(11, 'Infección urinaria', 'Antibióticos', '2024-08-11 11:00:00'),
(12, 'Infección de oídos', 'Gotas óticas antibióticas', '2024-08-12 09:20:00'),
(13, 'Miopía', 'Prescripción de lentes', '2024-08-13 10:50:00'),
(14, 'Fractura de tobillo', 'Inmovilización con yeso', '2024-08-14 12:10:00'),
(15, 'Apendicitis', 'Cirugía de apéndice', '2024-08-15 09:40:00'),
(16, 'Preparación para cirugía', 'Protocolos preoperatorios', '2024-08-16 10:20:00'),
(17, 'Control de diabetes', 'Ajuste de insulina', '2024-08-17 11:45:00'),
(18, 'Fractura de brazo', 'Radiografía de seguimiento', '2024-08-18 12:30:00'),
(19, 'Alergia estacional', 'Inmunoterapia', '2024-08-19 09:55:00'),
(20, 'Chequeo general', 'Actualizar medicamentos', '2024-08-20 10:35:00');

