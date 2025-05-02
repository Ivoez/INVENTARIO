-- Crear base de datos
CREATE DATABASE IF NOT EXISTS gym;
USE gym;

-- Tabla de socios
CREATE TABLE socios (
  id INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  apellido VARCHAR(100) NOT NULL,
  dni VARCHAR(10) UNIQUE NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  celular VARCHAR(20) NOT NULL,
  password VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

-- Tabla de administradores
CREATE TABLE administradores (
  id INT NOT NULL AUTO_INCREMENT,
  dni VARCHAR(10) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

-- Tabla de profesores
CREATE TABLE profesores (
  id INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  apellido VARCHAR(100) NOT NULL,
  dni VARCHAR(10) UNIQUE NOT NULL,
  email VARCHAR(100) NOT NULL,
  celular VARCHAR(20) NOT NULL,
  foto_perfil VARCHAR(255),
  PRIMARY KEY (id)
);

-- Tabla de actividades
CREATE TABLE actividades (
  id INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  dia VARCHAR(20) NOT NULL,
  hora TIME NOT NULL,
  profesor_id INT,
  PRIMARY KEY (id),
  FOREIGN KEY (profesor_id) REFERENCES profesores(id)
);

-- Tabla de inscripciones (socios a actividades)
CREATE TABLE inscripciones (
  id INT NOT NULL AUTO_INCREMENT,
  socio_id INT NOT NULL,
  actividad_id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (socio_id) REFERENCES socios(id),
  FOREIGN KEY (actividad_id) REFERENCES actividades(id)
);

-- Tabla de consultas de socios
CREATE TABLE consultas (
  id INT NOT NULL AUTO_INCREMENT,
  socio_id INT NOT NULL,
  mensaje TEXT NOT NULL,
  fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  FOREIGN KEY (socio_id) REFERENCES socios(id)
);

-- Insertar un administrador por defecto
INSERT INTO administradores (dni, password) VALUES ('11111111', '12gym34');

-- Insertar un socio de prueba
INSERT INTO socios (nombre, apellido, dni, email, celular, password) 
VALUES ('Juan', 'Perez', '12345678', 'juan@mail.com', '1122334455', 
'$2y$10$hH4HEl6kZueg0vSP7kP2oOC9QqTqLxxhXwNXY.f51eKR6iXXcwJ5q'); 
-- Contraseña: clave123
