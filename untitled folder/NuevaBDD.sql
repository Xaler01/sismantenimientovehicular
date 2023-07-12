-- Creación de la base de datos
CREATE DATABASE nombre_base_de_datos;

-- Uso de la base de datos
USE nombre_base_de_datos;

-- Creación de la tabla provincias
CREATE TABLE provincias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Creación de la tabla ciudades
CREATE TABLE ciudades (
  id INT AUTO_INCREMENT PRIMARY KEY,
  provincia_id INT,
  nombre VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (provincia_id) REFERENCES provincias(id)
);

-- Creación de la tabla parroquias
CREATE TABLE parroquias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  ciudad_id INT,
  nombre VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (ciudad_id) REFERENCES ciudades(id)
);

-- Creación de la tabla circuitos
CREATE TABLE circuitos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Creación de la tabla subcircuitos
CREATE TABLE subcircuitos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  circuito_id INT,
  nombre VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (circuito_id) REFERENCES circuitos(id)
);

-- Creación de la tabla dependencias
CREATE TABLE dependencias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  provincia_id INT,
  num_distritos INT,
  parroquia_id INT,
  cod_distrito VARCHAR(255),
  nombre_distrito VARCHAR(255),
  cod_circuito VARCHAR(255),
  nombre_circuito VARCHAR(255),
  cod_subcircuito VARCHAR(255),
  nombre_subcircuito VARCHAR(255),
  circuito_id INT,
  estado_id INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (provincia_id) REFERENCES provincias(id),
  FOREIGN KEY (parroquia_id) REFERENCES parroquias(id),
  FOREIGN KEY (circuito_id) REFERENCES circuitos(id)
);

-- Creación de la tabla reclamos
CREATE TABLE reclamos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  circuito_id INT,
  subcircuito_id INT,
  tipo_reclamo_id INT,
  detalle TEXT,
  contacto VARCHAR(255),
  apellidos VARCHAR(255),
  nombres VARCHAR(255),
  fecha_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (circuito_id) REFERENCES circuitos(id),
  FOREIGN KEY (subcircuito_id) REFERENCES subcircuitos(id),
  FOREIGN KEY (tipo_reclamo_id) REFERENCES tipos_reclamo(id)
);

-- Creación de la tabla tipos_reclamo
CREATE TABLE tipos_reclamo (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255)
);

-- Insertar registros iniciales en la tabla tipos_reclamo
INSERT INTO tipos_reclamo (nombre) VALUES
  ('Reclamo'),
  ('Sugerencia'),
  ('Pregunta');




--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


-- Creación de la base de datos
CREATE DATABASE nombre_base_de_datos;

-- Uso de la base de datos
USE nombre_base_de_datos;

-- Creación de la tabla provincias
CREATE TABLE provincias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Creación de la tabla ciudades
CREATE TABLE ciudades (
  id INT AUTO_INCREMENT PRIMARY KEY,
  provincia_id INT,
  nombre VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (provincia_id) REFERENCES provincias(id)
);

-- Creación de la tabla parroquias
CREATE TABLE parroquias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  ciudad_id INT,
  nombre VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (ciudad_id) REFERENCES ciudades(id)
);

-- Creación de la tabla circuitos
CREATE TABLE circuitos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Creación de la tabla subcircuitos
CREATE TABLE subcircuitos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  circuito_id INT,
  nombre VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (circuito_id) REFERENCES circuitos(id)
);

-- Creación de la tabla dependencias
CREATE TABLE dependencias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  provincia_id INT,
  num_distritos INT,
  parroquia_id INT,
  cod_distrito VARCHAR(255),
  nombre_distrito VARCHAR(255),
  cod_circuito VARCHAR(255),
  nombre_circuito VARCHAR(255),
  cod_subcircuito VARCHAR(255),
  nombre_subcircuito VARCHAR(255),
  estado_id INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (provincia_id) REFERENCES provincias(id),
  FOREIGN KEY (parroquia_id) REFERENCES parroquias(id)
);

-- Creación de la tabla policias
CREATE TABLE policias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  dependencia_id INT,
  nombres VARCHAR(255),
  apellidos VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (dependencia_id) REFERENCES dependencias(id)
);

-- Creación de la tabla vehiculos
CREATE TABLE vehiculos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  dependencia_id INT,
  marca VARCHAR(255),
  modelo VARCHAR(255),
  placa VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (dependencia_id) REFERENCES dependencias(id)
);

-- Creación de la tabla personal_subcircuito
CREATE TABLE personal_subcircuito (
  id INT AUTO_INCREMENT PRIMARY KEY,
  subcircuito_id INT,
  nombres VARCHAR(255),
  apellidos VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (subcircuito_id) REFERENCES subcircuitos(id)
);

-- Creación de la tabla vehiculo_subcircuito
CREATE TABLE vehiculo_subcircuito (
  id INT AUTO_INCREMENT PRIMARY KEY,
  subcircuito_id INT,
  vehiculo_id INT,
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (subcircuito_id) REFERENCES subcircuitos(id),
  FOREIGN KEY (vehiculo_id) REFERENCES vehiculos(id)
);

-- Creación de la tabla solicitud_mantenimiento
CREATE TABLE solicitud_mantenimiento (
  id INT AUTO_INCREMENT PRIMARY KEY,
  vehiculo_id INT,
  fecha_solicitud DATE,
  estado ENUM('Pendiente', 'Aprobada', 'Rechazada') DEFAULT 'Pendiente',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (vehiculo_id) REFERENCES vehiculos(id)
);

-- Creación de la tabla asignar_vehiculo
CREATE TABLE asignar_vehiculo (
  id INT AUTO_INCREMENT PRIMARY KEY,
  solicitud_mantenimiento_id INT,
  vehiculo_id INT,
  personal_subcircuito_id INT,
  fecha_asignacion DATE,
  estado ENUM('Asignado', 'No asignado') DEFAULT 'No asignado',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (solicitud_mantenimiento_id) REFERENCES solicitud_mantenimiento(id),
  FOREIGN KEY (vehiculo_id) REFERENCES vehiculos(id),
  FOREIGN KEY (personal_subcircuito_id) REFERENCES personal_subcircuito(id)
);





--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-- Creación de la base de datos
CREATE DATABASE nombre_base_de_datos;

-- Uso de la base de datos
USE nombre_base_de_datos;

-- Creación de la tabla provincias
CREATE TABLE provincias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Creación de la tabla ciudades
CREATE TABLE ciudades (
  id INT AUTO_INCREMENT PRIMARY KEY,
  provincia_id INT,
  nombre VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (provincia_id) REFERENCES provincias(id)
);

-- Creación de la tabla parroquias
CREATE TABLE parroquias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  ciudad_id INT,
  nombre VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (ciudad_id) REFERENCES ciudades(id)
);

-- Creación de la tabla circuitos
CREATE TABLE circuitos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  dependencia_id INT,
  nombre VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (dependencia_id) REFERENCES dependencias(id)
);

-- Creación de la tabla subcircuitos
CREATE TABLE subcircuitos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  circuito_id INT,
  nombre VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (circuito_id) REFERENCES circuitos(id)
);

-- Creación de la tabla dependencias
CREATE TABLE dependencias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  provincia_id INT,
  num_distritos INT,
  parroquia_id INT,
  cod_distrito VARCHAR(255),
  nombre_distrito VARCHAR(255),
  estado_id INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (provincia_id) REFERENCES provincias(id),
  FOREIGN KEY (parroquia_id) REFERENCES parroquias(id)
);

-- Creación de la tabla policias
CREATE TABLE policias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  dependencia_id INT,
  nombres VARCHAR(255),
  apellidos VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (dependencia_id) REFERENCES dependencias(id)
);

-- Creación de la tabla vehiculos
CREATE TABLE vehiculos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  dependencia_id INT,
  marca VARCHAR(255),
  modelo VARCHAR(255),
  placa VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (dependencia_id) REFERENCES dependencias(id)
);

-- Creación de la tabla personal_subcircuito
CREATE TABLE personal_subcircuito (
  id INT AUTO_INCREMENT PRIMARY KEY,
  subcircuito_id INT,
  nombres VARCHAR(255),
  apellidos VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (subcircuito_id) REFERENCES subcircuitos(id)
);

-- Creación de la tabla vehiculo_subcircuito
CREATE TABLE vehiculo_subcircuito (
  id INT AUTO_INCREMENT PRIMARY KEY,
  subcircuito_id INT,
  vehiculo_id INT,
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (subcircuito_id) REFERENCES subcircuitos(id),
  FOREIGN KEY (vehiculo_id) REFERENCES vehiculos(id)
);

-- Creación de la tabla reclamos
CREATE TABLE reclamos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  circuito_id INT,
  subcircuito_id INT,
  tipo_reclamo_id INT,
  detalle TEXT,
  contacto VARCHAR(255),
  apellidos VARCHAR(255),
  nombres VARCHAR(255),
  fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (circuito_id) REFERENCES circuitos(id),
  FOREIGN KEY (subcircuito_id) REFERENCES subcircuitos(id),
  FOREIGN KEY (tipo_reclamo_id) REFERENCES tipos_reclamo(id)
);

-- Creación de la tabla tipos_reclamo
CREATE TABLE tipos_reclamo (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);



--++++++++++++++++++++++++++++++++++++++++************************************************
-- Creación de la base de datos
CREATE DATABASE nombre_base_de_datos;

-- Uso de la base de datos
USE nombre_base_de_datos;

-- Creación de la tabla provincias
CREATE TABLE provincias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Creación de la tabla ciudades
CREATE TABLE ciudades (
  id INT AUTO_INCREMENT PRIMARY KEY,
  provincia_id INT,
  nombre VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (provincia_id) REFERENCES provincias(id)
);

-- Creación de la tabla parroquias
CREATE TABLE parroquias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  ciudad_id INT,
  nombre VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (ciudad_id) REFERENCES ciudades(id)
);

-- Creación de la tabla circuitos
CREATE TABLE circuitos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Creación de la tabla subcircuitos
CREATE TABLE subcircuitos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  circuito_id INT,
  nombre VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (circuito_id) REFERENCES circuitos(id)
);

-- Creación de la tabla dependencias
CREATE TABLE dependencias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  provincia_id INT,
  num_distritos INT,
  parroquia_id INT,
  cod_distrito VARCHAR(255),
  nombre_distrito VARCHAR(255),
  cod_circuito VARCHAR(255),
  nombre_circuito VARCHAR(255),
  cod_subcircuito VARCHAR(255),
  nombre_subcircuito VARCHAR(255),
  estado_id INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (provincia_id) REFERENCES provincias(id),
  FOREIGN KEY (parroquia_id) REFERENCES parroquias(id)
);

-- Creación de la tabla policias
CREATE TABLE policias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  dependencia_id INT,
  nombres VARCHAR(255),
  apellidos VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (dependencia_id) REFERENCES dependencias(id)
);

-- Creación de la tabla vehiculos
CREATE TABLE vehiculos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  dependencia_id INT,
  marca VARCHAR(255),
  modelo VARCHAR(255),
  placa VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (dependencia_id) REFERENCES dependencias(id)
);

-- Creación de la tabla personal_subcircuito
CREATE TABLE personal_subcircuito (
  id INT AUTO_INCREMENT PRIMARY KEY,
  subcircuito_id INT,
  nombres VARCHAR(255),
  apellidos VARCHAR(255),
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (subcircuito_id) REFERENCES subcircuitos(id)
);

-- Creación de la tabla vehiculo_subcircuito
CREATE TABLE vehiculo_subcircuito (
  id INT AUTO_INCREMENT PRIMARY KEY,
  subcircuito_id INT,
  vehiculo_id INT,
  estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (subcircuito_id) REFERENCES subcircuitos(id),
  FOREIGN KEY (vehiculo_id) REFERENCES vehiculos(id)
);

-- Creación de la tabla solicitud_mantenimiento
CREATE TABLE solicitud_mantenimiento (
  id INT AUTO_INCREMENT PRIMARY KEY,
  vehiculo_id INT,
  fecha_solicitud DATE,
  estado ENUM('Pendiente', 'Aprobada', 'Rechazada') DEFAULT 'Pendiente',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (vehiculo_id) REFERENCES vehiculos(id)
);

-- Creación de la tabla asignar_vehiculo
CREATE TABLE asignar_vehiculo (
  id INT AUTO_INCREMENT PRIMARY KEY,
  solicitud_mantenimiento_id INT,
  vehiculo_id INT,
  personal_subcircuito_id INT,
  fecha_asignacion DATE,
  estado ENUM('Asignado', 'No asignado') DEFAULT 'No asignado',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (solicitud_mantenimiento_id) REFERENCES solicitud_mantenimiento(id),
  FOREIGN KEY (vehiculo_id) REFERENCES vehiculos(id),
  FOREIGN KEY (personal_subcircuito_id) REFERENCES personal_subcircuito(id)
);

