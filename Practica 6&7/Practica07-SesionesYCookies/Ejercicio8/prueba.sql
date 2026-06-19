CREATE DATABASE IF NOT EXISTS prueba
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_spanish_ci;

USE prueba;

DROP TABLE IF EXISTS buscador;

CREATE TABLE buscador (
  id        INT AUTO_INCREMENT PRIMARY KEY,
  canciones VARCHAR(150) NOT NULL
);

INSERT INTO buscador (canciones) VALUES
  ('Bohemian Rhapsody'),
  ('Imagine'),
  ('Hotel California'),
  ('Billie Jean'),
  ('Smells Like Teen Spirit');
