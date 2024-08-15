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

