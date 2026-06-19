CREATE DATABASE IF NOT EXISTS Compras
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_spanish_ci;

USE Compras;

DROP TABLE IF EXISTS catalogo;

CREATE TABLE catalogo (
  id        INT AUTO_INCREMENT PRIMARY KEY,
  producto  VARCHAR(100)   NOT NULL,
  precio    DECIMAL(9,2)   NOT NULL
);

INSERT INTO catalogo (producto, precio) VALUES
  ('Mouse inalámbrico',     5500.00),
  ('Teclado mecánico',     18900.00),
  ('Monitor 24"',          95000.00),
  ('Auriculares Bluetooth', 12300.00),
  ('Webcam HD',              8700.00);
