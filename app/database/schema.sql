DROP DATABASE IF EXISTS RescuesPets;
CREATE DATABASE RescuesPets;
use RescuesPets;
CREATE TABLE Rescues(
	idRescate INT AUTO_INCREMENT PRIMARY KEY,
	nombreRescatista VARCHAR (120) NOT NULL,
    DNI CHAR(8)NOT NULL,
	telefonoContacto VARCHAR(20) NOT NULL,
    ocupacion VARCHAR(50) NOT NULL,
    especie VARCHAR(20)NOT NULL,
    genero VARCHAR(10)NOT NULL,
    raza VARCHAR(50)NOT NULL DEFAULT 'Mestizo',
    colorCaracteristica VARCHAR (100),
    lugarRescate VARCHAR(150)NOT NULL,
    fechaEncontrado DATE NOT NULL,
    fechaRegistrado DATETIME NOT NULL DEFAULT NOW(),
    estadoSalud VARCHAR(50),
    condiciones VARCHAR(100),
    estado CHAR(1) DEFAULT '1'
)ENGINE=INNODB;

CREATE TABLE Adoptions (
    idAdopcion INT AUTO_INCREMENT PRIMARY KEY,
    idRescate INT NOT NULL,
    nombreAdoptante VARCHAR(120) NOT NULL,
    dniAdoptante CHAR(8) NOT NULL,
    telefonoAdoptante VARCHAR(20) NOT NULL,
    direccionAdoptante VARCHAR(150) NOT NULL,
    fechaAdopcion DATETIME NOT NULL DEFAULT NOW(),
	estado CHAR(1) DEFAULT '1',
    FOREIGN KEY (idRescate) REFERENCES Rescues(idRescate)
) ENGINE=INNODB;

INSERT INTO Rescues (
    nombreRescatista, telefonoContacto, ocupacion, DNI, especie, genero, raza, colorCaracteristica, lugarRescate, FechaEncontrado ,estadoSalud, condiciones
) VALUES 
('Juan Pérez', '987654321', 'Voluntario','23423234', 'Perro', 'Macho', 'Pitbull','Negro con manchas blancas', 'Parque Central','2025-08-14', 'Herido', 'Abandonado'),
('María López', '912345678', 'Ciudadano','44332244', 'Gato', 'Hembra', 'No identificado','Gris atigrado', 'Avenida Principal','2025-09-15', 'Sano', 'Perdido');

SELECT * FROM adoptions;
SELECT * FROM rescues;
update Rescues SET raza = 'Mestizo' where idRescate = 2;