-- Creación de la tabla "users"
CREATE TABLE IF NOT EXISTS users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  email_verified_at TIMESTAMP NULL,
  password VARCHAR(255) NOT NULL,
  cedula VARCHAR(255) NOT NULL UNIQUE,
  fecha_nacimiento DATE NOT NULL,
  tipo_sangre VARCHAR(255) NOT NULL,
  ciudad_nacimiento VARCHAR(255) NOT NULL,
  celular VARCHAR(255) NOT NULL,
  rango VARCHAR(255) NOT NULL,
  id_dependencia INT NOT NULL,
  rol VARCHAR(255) NOT NULL,
  remember_token VARCHAR(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_dependencia) REFERENCES dependencias (id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Creación de la tabla "dependencias"
CREATE TABLE IF NOT EXISTS dependencias (
  id INT PRIMARY KEY AUTO_INCREMENT,
  dependencia VARCHAR(255) NOT NULL,
  idProvincia INT NOT NULL,
  idParroquia INT NOT NULL,
  idDistrito INT NOT NULL,
  idCircuito INT NOT NULL,
  idSubcircuito INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (idProvincia) REFERENCES provincias (id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (idParroquia) REFERENCES parroquias (id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (idDistrito) REFERENCES distritos (id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (idCircuito) REFERENCES circuitos (id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (idSubcircuito) REFERENCES subcircuitos (id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Creación de la tabla "provincias"
CREATE TABLE IF NOT EXISTS provincias (
  id INT PRIMARY KEY AUTO_INCREMENT,
  provincia VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Creación de la tabla "parroquias"
CREATE TABLE IF NOT EXISTS parroquias (
  id INT PRIMARY KEY AUTO_INCREMENT,
  parroquia VARCHAR(255) NOT NULL,
  idProvincia INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (idProvincia) REFERENCES provincias (id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Creación de la tabla "distritos"
CREATE TABLE IF NOT EXISTS distritos (
  id INT PRIMARY KEY AUTO_INCREMENT,
  distrito VARCHAR(255) NOT NULL,
  idParroquia INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (idParroquia) REFERENCES parroquias (id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Creación de la tabla "circuitos"
CREATE TABLE IF NOT EXISTS circuitos (
  id INT PRIMARY KEY AUTO_INCREMENT,
  circuito VARCHAR(255) NOT NULL,
  idDistrito INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (idDistrito) REFERENCES distritos (id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Creación de la tabla "subcircuitos"
CREATE TABLE IF NOT EXISTS subcircuitos (
  id INT PRIMARY KEY AUTO_INCREMENT,
  subcircuito VARCHAR(255) NOT NULL,
  idCircuito INT NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (idCircuito) REFERENCES circuitos (id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Creación de la tabla "vehiculos"
CREATE TABLE IF NOT EXISTS vehiculos (
id INT PRIMARY KEY AUTO_INCREMENT,
tipo_vehiculo VARCHAR(255) NOT NULL,
placa VARCHAR(255) NOT NULL UNIQUE,
chasis VARCHAR(255) DEFAULT 'desconocido',
marca VARCHAR(255) DEFAULT 'policial',
modelo VARCHAR(255) DEFAULT '2000',
motor VARCHAR(255) DEFAULT 'desconocido',
kilometraje INT DEFAULT 99999,
cilindraje INT DEFAULT 99,
capacidad_carga INT NOT NULL,
capacidad_pasajeros INT NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Creación de la tabla "mantenimientos"
CREATE TABLE IF NOT EXISTS mantenimientos (
id INT PRIMARY KEY AUTO_INCREMENT,
id_vehiculo INT NOT NULL,
fecha_mantenimiento DATE NOT NULL,
descripcion VARCHAR(255) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (id_vehiculo) REFERENCES vehiculos (id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Creación de la tabla "repuestos"
CREATE TABLE IF NOT EXISTS repuestos (
id INT PRIMARY KEY AUTO_INCREMENT,
nombre VARCHAR(255) NOT NULL,
marca VARCHAR(255) NOT NULL,
precio DECIMAL(10, 2) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
