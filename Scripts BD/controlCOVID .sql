CREATE DATABASE IF NOT EXISTS COVIDBCS;
USE COVIDBCS;

CREATE TABLE Usuario(
idUsuario INT PRIMARY KEY AUTO_INCREMENT,
adminUsuario TINYINT,
nombreUsuario VARCHAR(60),
apellidosUsuario VARCHAR(60),
emailUsuario VARCHAR(60) UNIQUE,
passUsuario VARCHAR(20)
);

INSERT INTO `usuario` (`idUsuario`, `adminUsuario`, `nombreUsuario`, `apellidosUsuario`, `emailUsuario`, `passUsuario`) VALUES 
(2, '0', 'El cacas', 'El cacotas', 'ejemplo@a', '1234'), 
(5, '1', 'David', 'Contreras', 'david@c', '1234'), 
(7, '1', 'da', 'vi', 'ejemplo@b', '1'),
(8, '1', 'Farid', 'Mendez', 'luna@m', '1235'),
(9, '1', 'Hugo', 'Sanchez', 'hugo@', '1'),
(10, '0', 'David', 'Contreras', 'ponchitosexi@gmail.com', 'a'),
(11, '0', 'Kilero', 'Tryhard', 'kilerito@gmail.com', 'kilerito'), 
(12, '0', 'Juan', 'Perez', 'd@r', 'dani'),  
(13, '0', 'Hugo', 'Sanchez', 'hugo@menso', 'menso'), 
(14, '0', 'ejemplo', 'ejemplo', 'ejemplo@ejemplo', 'ejemplo');

CREATE TABLE Reportes(
idReporte INT PRIMARY KEY AUTO_INCREMENT,
idReportador INT NOT NULL,
nombreReportador VARCHAR(60),
apellidosReportador VARCHAR(60),
descReporte VARCHAR(60),
municipioReporte VARCHAR(60),
ciudadReporte VARCHAR(60),
direccionReporte VARCHAR(60),
fechaReporte DATETIME,
estatusReporte VARCHAR(20) DEFAULT 'Pendiente',
hiddenReporte TINYINT,
CONSTRAINT fkSospechosoReporte FOREIGN KEY (idReportador) REFERENCES Usuario(idUsuario) ON UPDATE CASCADE ON DELETE RESTRICT
);

INSERT INTO `reportes` (`idReporte`, `idReportador`, `nombreReportador`, `apellidosReportador`, `descReporte`, `municipioReporte`, `ciudadReporte`, `direccionReporte`, `fechaReporte`, `estatusReporte`, `hiddenReporte`) VALUES
(NULL, '2', 'Elcacas', 'El cacotas', 'Covidioso', 'caca', 'caca', 'aki', '2020-12-06 03:08:45', 'Rechazado', '0'),
(NULL, '12', 'Daniel', 'Perez', 'Covidioso', 'La Paz', 'Los Cabos', 'Aqui', '2020-12-06 03:09:28', 'Confirmado', '1'), 
(NULL, '12', 'Daniel', 'Perez', 'Covidioso', 'La Paz', 'La Paz', 'Aqui', '2020-12-06 03:10:05', 'Pendiente', '0'), 
(NULL, '12', 'Daniel', 'Perez', 'Covidioso', 'La Paz', 'La Paz', 'Aqui', '2020-12-06 03:10:59', 'Confirmado', '0'), 
(NULL, '12', 'Daniel', 'Perez', 'Covidioso', 'La Paz', 'La Paz', 'Aqui', '2020-12-06 03:19:43', 'En proceso', '0'),
(NULL, '12', 'Daniel', 'Perez', 'Covidiota vecino', 'Los Cabos', 'Cartolandia', 'aki', '2020-12-06 03:31:15', 'Pendiente', '0'),
(NULL, '12', 'Daniel', 'Perez', 'A', 'A', 'A', 'A', '2020-12-06 03:31:42', 'Confirmado', '0'),
(NULL, '12', 'Daniel', 'Perez', 'A', 'A', 'A', 'A', '2020-12-06 03:32:49', 'Pendiente', '0'), 
(NULL, '12', 'Daniel', 'Perez', 'Covidioso', 'Loreto', 'Loreto', 'Malecon', '2020-12-06 03:35:50', 'En proceso', '1'), 
(NULL, '12', 'Daniel', 'Perez', 'Covidioso', 'La Paz', 'A', 'Aqui', '2020-12-06 03:36:02', 'Pendiente', '0'), 
(NULL, '12', 'Daniel', 'Perez', 'Covidioso', 'La Paz', 'A', 'Aqui', '2020-12-06 03:36:07', 'Pendiente', '0'), 
(NULL, '12', 'Daniel', 'Perez', 'Covidioso', 'La Paz', 'A', 'Aqui', '2020-12-06 03:37:15', 'Pendiente', '0'), 
(NULL, '12', 'Daniel', 'Perez', 'Covidioso', 'La Paz', 'A', 'Aqui', '2020-12-06 03:37:21', 'Pendiente', '0'), 
(NULL, '12', 'Daniel', 'Perez', 'Covidioso', 'La Paz', '', 'Aqui', '2020-12-06 03:42:21', 'Pendiente', '0'), 
(NULL, '12', 'Daniel', 'Perez', 'Covidioso', 'La Paz', 'A', 'Aqui', '2020-12-06 03:44:01', 'Pendiente', '0'), 
(NULL, '13', 'Hugo', 'Sanchez', 'Covi', 'La Paz', 'La Paz', 'aca', '2020-12-06 05:20:56', 'Pendiente', '0');

CREATE TABLE Localidad(
Mapa VARCHAR(8),
ClaveAGEE VARCHAR(2),
NombreAGEE VARCHAR(50),
ClaveAGEM VARCHAR(3),
NombreAGEM VARCHAR(50),
ClaveLocalidadG VARCHAR(4),
NombreLocalidadG VARCHAR(50),
Ambito VARCHAR(1),
Latitud VARCHAR(15),
Longitud VARCHAR(15),
Altitud VARCHAR(5),
ClaveCarta VARCHAR(6)
);