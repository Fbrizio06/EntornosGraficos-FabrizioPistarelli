CREATE DATABASE IF NOT EXISTS base2
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_spanish_ci;

USE base2;

DROP TABLE IF EXISTS alumnos;

CREATE TABLE alumnos (
  codigo       INT AUTO_INCREMENT PRIMARY KEY,
  nombre       VARCHAR(100) NOT NULL,
  codigocurso  VARCHAR(20)  NOT NULL,
  mail         VARCHAR(150) NOT NULL UNIQUE
);

INSERT INTO alumnos (nombre, codigocurso, mail) VALUES
  ('Fabrizio Gómez',   'K3041', 'fabrizio@ejemplo.com'),
  ('Ana Pérez',        'K3041', 'ana.perez@ejemplo.com'),
  ('Martín Rodríguez', 'K3042', 'martin.r@ejemplo.com');
