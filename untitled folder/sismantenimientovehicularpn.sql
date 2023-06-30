-- Creación de la tabla "PersonalPolicial"
CREATE TABLE PersonalPolicial (
  Identificacion INT PRIMARY KEY,
  Nombres VARCHAR(100),
  Apellidos VARCHAR(100),
  FechaNacimiento DATE,
  TipoSangre VARCHAR(10),
  CiudadNacimiento VARCHAR(100),
  TelefonoCelular VARCHAR(15),
  Rango VARCHAR(100),
  DependenciaID INT,
  FOREIGN KEY (DependenciaID) REFERENCES Dependencias(ID)
);

-- Creación de la tabla "Dependencias"
CREATE TABLE Dependencias (
  ID INT PRIMARY KEY,
  Provincia VARCHAR(100),
  NoDistritos INT,
  Parroquia VARCHAR(100),
  CodDistrito VARCHAR(10),
  NombreDistrito VARCHAR(100),
  NoCircuitos INT,
  CodCircuito VARCHAR(10),
  NombreCircuito VARCHAR(100),
  NoSubcircuitos INT,
  CodSubcircuito VARCHAR(10),
  NombreSubcircuito VARCHAR(100)
);

-- Creación de la tabla "FlotaVehicular"
CREATE TABLE FlotaVehicular (
  ID INT PRIMARY KEY,
  TipoVehiculo VARCHAR(100),
  Placa VARCHAR(20),
  Chasis VARCHAR(50),
  Marca VARCHAR(100),
  Modelo VARCHAR(100),
  Motor VARCHAR(50),
  Kilometraje DECIMAL(10,2),
  Cilindraje INT,
  CapacidadCarga DECIMAL(10,2),
  CapacidadPasajeros INT
);

-- Creación de la tabla "VehiculoResponsable"
CREATE TABLE VehiculoResponsable (
  VehiculoID INT,
  PersonalPolicialID INT,
  DistritoID INT,
  Turno VARCHAR(100),
  RutaPatrullaje VARCHAR(100),
  PRIMARY KEY (VehiculoID, PersonalPolicialID),
  FOREIGN KEY (VehiculoID) REFERENCES FlotaVehicular(ID),
  FOREIGN KEY (PersonalPolicialID) REFERENCES PersonalPolicial(Identificacion),
  FOREIGN KEY (DistritoID) REFERENCES Dependencias(ID)
);

-- Creación de la tabla "AsignacionPersonalPolicial"
CREATE TABLE AsignacionPersonalPolicial (
  PersonalPolicialID INT,
  SubcircuitoID INT,
  PRIMARY KEY (PersonalPolicialID, SubcircuitoID),
  FOREIGN KEY (PersonalPolicialID) REFERENCES PersonalPolicial(Identificacion),
  FOREIGN KEY (SubcircuitoID) REFERENCES Dependencias(ID)
);

-- Creación de la tabla "AsignacionVehiculoSubcircuito"
CREATE TABLE AsignacionVehiculoSubcircuito (
  VehiculoID INT,
  SubcircuitoID INT,
  PRIMARY KEY (VehiculoID, SubcircuitoID),
  FOREIGN KEY (VehiculoID) REFERENCES FlotaVehicular(ID),
  FOREIGN KEY (SubcircuitoID) REFERENCES Dependencias(ID)
);

-- Creación de la tabla "SolicitudMantenimiento"
CREATE TABLE SolicitudMantenimiento (
  ID INT PRIMARY KEY,
  PersonalPolicialID INT,
  VehiculoID INT,
  FechaHoraSolicitud DATETIME,
  KilometrajeActual DECIMAL(10,2),
  Observaciones VARCHAR(200),
  FOREIGN KEY (PersonalPolicialID) REFERENCES PersonalPolicial(Identificacion),
  FOREIGN KEY (VehiculoID) REFERENCES FlotaVehicular(ID)
);

-- Creación de la tabla "

-- Tabla de asignación de personal policial a subcircuito
CREATE TABLE AsignacionPersonalSubcircuito (
  id INT PRIMARY KEY AUTO_INCREMENT,
  id_personal INT,
  id_subcircuito INT,
  fecha_asignacion DATE,
  CONSTRAINT fk_asignacionpersonal_subcircuito_personal FOREIGN KEY (id_personal) REFERENCES PersonalPolicial(id),
  CONSTRAINT fk_asignacionpersonal_subcircuito_subcircuito FOREIGN KEY (id_subcircuito) REFERENCES Subcircuito(id)
);

-- Tabla de asignación de vehículo a subcircuito
CREATE TABLE AsignacionVehiculoSubcircuito (
  id INT PRIMARY KEY AUTO_INCREMENT,
  id_vehiculo INT,
  id_subcircuito INT,
  fecha_asignacion DATE,
  CONSTRAINT fk_asignacionvehiculo_subcircuito_vehiculo FOREIGN KEY (id_vehiculo) REFERENCES Vehiculo(id),
  CONSTRAINT fk_asignacionvehiculo_subcircuito_subcircuito FOREIGN KEY (id_subcircuito) REFERENCES Subcircuito(id)
);

-- Tabla de solicitud de mantenimiento preventivo
CREATE TABLE SolicitudMantenimiento (
  id INT PRIMARY KEY AUTO_INCREMENT,
  id_personal INT,
  id_vehiculo INT,
  fecha_solicitud DATE,
  kilometraje_actual DECIMAL(10, 2),
  observaciones VARCHAR(255),
  CONSTRAINT fk_solicitudmantenimiento_personal FOREIGN KEY (id_personal) REFERENCES PersonalPolicial(id),
  CONSTRAINT fk_solicitudmantenimiento_vehiculo FOREIGN KEY (id_vehiculo) REFERENCES Vehiculo(id)
);

-- Tabla de mantenimiento preventivo
CREATE TABLE MantenimientoPreventivo (
  id INT PRIMARY KEY AUTO_INCREMENT,
  id_solicitud INT,
  tipo_mantenimiento ENUM('Mantenimiento 1', 'Mantenimiento 2', 'Mantenimiento 3'),
  subtotal DECIMAL(10, 2),
  iva DECIMAL(10, 2),
  total DECIMAL(10, 2),
  CONSTRAINT fk_mantenimientopreventivo_solicitud FOREIGN KEY (id_solicitud) REFERENCES SolicitudMantenimiento(id)
);

-- Tabla de orden de trabajo
CREATE TABLE OrdenTrabajo (
  id INT PRIMARY KEY AUTO_INCREMENT,
  id_mantenimiento INT,
  fecha_ingreso DATE,
  kilometraje_actual DECIMAL(10, 2),
  tipo_vehiculo ENUM('Auto', 'Motocicleta', 'Camioneta'),
  numero_placa VARCHAR(20),
  marca VARCHAR(100),
  modelo VARCHAR(100),
  id_personal_responsable INT,
  asunto VARCHAR(255),
  detalle VARCHAR(255),
  CONSTRAINT fk_ordentrabajo_mantenimientopreventivo FOREIGN KEY (id_mantenimiento) REFERENCES MantenimientoPreventivo(id),
  CONSTRAINT fk_ordentrabajo_personal FOREIGN KEY (id_personal_responsable) REFERENCES PersonalPolicial(id)
);

-- Tabla de entrega de vehículo posterior a mantenimiento
CREATE TABLE EntregaVehiculo (
  id INT PRIMARY KEY AUTO_INCREMENT,
  id_ordentrabajo INT,
  fecha_entrega DATE,
  id_personal_entrega INT,
  id_personal_retira INT,
  kilometraje_actual DECIMAL(10, 2),
  proximo_mantenimiento DECIMAL(10, 2),
  tipo_mantenimiento_realizado ENUM('Mantenimiento 1', 'Mantenimiento 2', 'Mantenimiento 3'),
  observaciones VARCHAR(255),
  CONSTRAINT fk_entregavehiculo_ordentrabajo FOREIGN KEY (id_ordentrabajo) REFERENCES OrdenTrabajo(id),
  CONSTRAINT fk_entregavehiculo_personal_entrega FOREIGN KEY (id_personal_entrega) REFERENCES PersonalPolicial(id),
  CONSTRAINT fk_entregavehiculo_personal_retira FOREIGN KEY (id_personal_retira) REFERENCES PersonalPolicial(id)
);

-- Tabla de reporte de incidentes
CREATE TABLE ReporteIncidente (
  id INT PRIMARY KEY AUTO_INCREMENT,
  id_personal_reporta INT,
  fecha_reporte DATE,
  hora_reporte TIME,
  tipo_incidente ENUM('Robo', 'Accidente', 'Altercado'),
  descripcion VARCHAR(255),
  CONSTRAINT fk_reporteincidente_personal FOREIGN KEY (id_personal_reporta) REFERENCES PersonalPolicial(id)
);

-- Tabla de investigación de incidentes
CREATE TABLE InvestigacionIncidente (
  id INT PRIMARY KEY AUTO_INCREMENT,
  id_reporte INT,
  fecha_inicio DATE,
  fecha_cierre DATE,
  descripcion VARCHAR(255),
  CONSTRAINT fk_investigacionincidente_reporte FOREIGN KEY (id_reporte) REFERENCES ReporteIncidente(id)
);

-- Tabla de informe final de investigación
CREATE TABLE InformeFinal (
  id INT PRIMARY KEY AUTO_INCREMENT,
  id_investigacion INT,
  fecha_creacion DATE,
  conclusiones TEXT,
  recomendaciones TEXT,
  CONSTRAINT fk_informefinal_investigacion FOREIGN KEY (id_investigacion) REFERENCES InvestigacionIncidente(id)
);

-- Tabla de registro de arrestos
CREATE TABLE RegistroArresto (
  id INT PRIMARY KEY AUTO_INCREMENT,
  id_personal_arrestador INT,
  id_personal_detenido INT,
  fecha_arresto DATE,
  hora_arresto TIME,
  motivo VARCHAR(255),
  CONSTRAINT fk_registroarresto_personal_arrestador FOREIGN KEY (id_personal_arrestador) REFERENCES PersonalPolicial(id),
  CONSTRAINT fk_registroarresto_personal_detenido FOREIGN KEY (id_personal_detenido) REFERENCES PersonalPolicial(id)
);

CREATE TABLE InventarioEquipos (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    TipoEquipo VARCHAR(50) NOT NULL,
    NumeroSerie VARCHAR(50) NOT NULL,
    Estado VARCHAR(50) NOT NULL,
    Ubicacion VARCHAR(100),
    Observaciones TEXT
);




    
