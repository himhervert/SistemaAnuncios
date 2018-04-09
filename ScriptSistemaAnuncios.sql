
CREATE DATABASE sistemaanuncios;

CREATE TABLE Usuario (
    IdUsuario BIGINT NOT NULL AUTO_INCREMENT,
    NombreUsuario VARCHAR(16) NOT NULL,
    Passwd VARCHAR(100) DEFAULT NULL,
    TipoUsuario ENUM('Administrador','Becario','Profesor') DEFAULT 'Becario',
    Nombre VARCHAR(100) NOT NULL,
    ApellidoPaterno VARCHAR(100) NOT NULL,
    ApellidoMaterno VARCHAR(100) NOT NULL,
    Email VARCHAR(200) NOT NULL,
    Telefono VARCHAR(30) NOT NULL,
    CONSTRAINT Pk_Usuario PRIMARY KEY (IdUsuario),
    CONSTRAINT Un_Usuario UNIQUE (NombreUsuario),
    CONSTRAINT Un_Correo UNIQUE (Email)
);

CREATE TABLE Anuncio (
    IdAnuncio BIGINT NOT NULL AUTO_INCREMENT,
    Titulo VARCHAR(100) DEFAULT NULL,
    Descripcion VARCHAR(400) DEFAULT NULL,
    FechaInicio DATE DEFAULT NULL,
    FechaFin DATE DEFAULT NULL,
    IdUsuario BIGINT NOT NULL,
    CONSTRAINT Pk_Anuncio PRIMARY KEY (IdAnuncio),
    CONSTRAINT Fk_Anuncio_Usuario FOREIGN KEY (IdUsuario) REFERENCES Usuario (IdUsuario)
);

CREATE TABLE Imagen (
    IdImagen BIGINT NOT NULL AUTO_INCREMENT,
    Nombre VARCHAR(50) NOT NULL,
    Tipo ENUM('.PNG','.JPG','BMP') NOT NULL,
    TamImagen FLOAT NOT NULL,
    Tempo INT DEFAULT 10 NOT NULL,
    FechaInicio DATE DEFAULT NULL,
    FechaFinal DATE DEFAULT NULL,
    IdUsuario BIGINT NOT NULL,
    CONSTRAINT Pk_Imagen PRIMARY KEY (IdImagen),
    CONSTRAINT Fk_Imagen_Usuario FOREIGN KEY (IdUsuario) REFERENCES Usuario (IdUsuario)
);
