-- Crear la tabla "users" para gestionar el personal
CREATE TABLE users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255),
  email VARCHAR(255),
  email_verified_at TIMESTAMP,
  password VARCHAR(255),
  cedula VARCHAR(255),
  fecha_nacimiento DATE,
  tipo_sangre VARCHAR(255),
  ciudad_nacimiento VARCHAR(255),
  celular VARCHAR(255),
  rango VARCHAR(255),
  rol VARCHAR(255),
  dependencia_id INT,
  estado VARCHAR(15),
  remember_token VARCHAR(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear la tabla "vehiculos" para gestionar la flota vehicular
CREATE TABLE vehiculos (
  id INT PRIMARY KEY AUTO_INCREMENT,
  tipo_vehiculo VARCHAR(255),
  placa VARCHAR(255),
  chasis VARCHAR(255),
  marca VARCHAR(255),
  modelo VARCHAR(255),
  motor VARCHAR(255),
  kilometraje INT,
  cilindraje INT,
  capacidad_carga INT,
  capacidad_pasajeros INT,
  dependencia_id INT,
  estado VARCHAR(15),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear la tabla "dependencias" para gestionar las dependencias policiales
CREATE TABLE dependencias (
  id INT PRIMARY KEY AUTO_INCREMENT,
  provincia VARCHAR(255),
  num_distritos INT,
  parroquia VARCHAR(255),
  cod_distrito VARCHAR(255),
  nombre_distrito VARCHAR(255),
  num_circuitos INT,
  cod_circuito VARCHAR(255),
  nombre_circuito VARCHAR(255),
  num_subcircuitos INT,
  cod_subcircuito VARCHAR(255),
  nombre_subcircuito VARCHAR(255),
  estado VARCHAR(15),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear la tabla "personal_subcircuito" para vincular el personal policial a subcircuitos
CREATE TABLE personal_subcircuito (
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT,
  dependencia_id INT,
  fecha_asignacion DATE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (dependencia_id) REFERENCES dependencias(id)
);

-- Crear la tabla "vehiculo_subcircuito" para vincular los vehículos a subcircuitos y usuarios
CREATE TABLE vehiculo_subcircuito (
  id INT PRIMARY KEY AUTO_INCREMENT,
  vehiculo_id INT,
  dependencia_id INT,
  user1_id INT,
  user2_id INT,
  user3_id INT,
  user4_id INT,
  fecha_asignacion DATE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (vehiculo_id) REFERENCES vehiculos(id),
  FOREIGN KEY (dependencia_id) REFERENCES dependencias(id),
  FOREIGN KEY (user1_id) REFERENCES users(id),
  FOREIGN KEY (user2_id) REFERENCES users(id),
  FOREIGN KEY (user3_id) REFERENCES users(id),
  FOREIGN KEY (user4_id) REFERENCES users(id)
);

-- Crear la tabla "solicitudes_mantenimiento" para gestionar las solicitudes de mantenimiento
CREATE TABLE solicitudes_mantenimiento (
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT,
  vehiculo_id INT,
  tipo_mantenimiento TEXT,
  fecha_solicitud DATE,
  hora_solicitud TIME,
  kilometraje_actual INT,
  observaciones TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (vehiculo_id) REFERENCES vehiculos(id)
);

  -- Crear la tabla "tipo_mantenimiento"
  CREATE TABLE tipo_mantenimiento (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    detalle TEXT,
    valor FLOAT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  );

-- Crear la tabla "ciudades"
CREATE TABLE ciudades (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear la tabla "tipo_sangre"
CREATE TABLE tipo_sangre (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear la tabla "rango"
CREATE TABLE rango (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear la tabla "marca"
CREATE TABLE marca (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear la tabla "tipo_vehiculo"
CREATE TABLE tipo_vehiculo (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
