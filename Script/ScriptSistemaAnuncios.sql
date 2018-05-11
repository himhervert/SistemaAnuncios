
CREATE DATABASE sistemaanuncios;

CREATE TABLE Usuario (
    NombreUsuario VARCHAR(16) NOT NULL,
    Passwd VARCHAR(100) NOT NULL,
    TipoUsuario ENUM('Administrador','Becario','Profesor') DEFAULT 'Becario',
    Nombre VARCHAR(100) NOT NULL,
    ApellidoPaterno VARCHAR(100) NOT NULL,
    ApellidoMaterno VARCHAR(100) NOT NULL,
    Email VARCHAR(200) NOT NULL,
    Telefono VARCHAR(30) NOT NULL,
    CONSTRAINT Pk_Usuario PRIMARY KEY (NombreUsuario),
    CONSTRAINT Un_Usuario UNIQUE (NombreUsuario,Email,Telefono)
);

CREATE TABLE Anuncio (
    IdAnuncio BIGINT NOT NULL AUTO_INCREMENT,
    Titulo VARCHAR(100) NOT NULL,
    Descripcion VARCHAR(400) NOT NULL,
    FechaInicio DATE NOT NULL,
    FechaFin DATE NOT NULL,
    Usuario VARCHAR(16) NOT NULL,
    CONSTRAINT Pk_Anuncio PRIMARY KEY (IdAnuncio),
    CONSTRAINT Fk_Anuncio_Usuario FOREIGN KEY (Usuario) REFERENCES Usuario (NombreUsuario)
);

CREATE TABLE Imagen (
    IdImagen BIGINT NOT NULL AUTO_INCREMENT,
    Nombre VARCHAR(50) NOT NULL,
    Tipo ENUM('.PNG','.JPG','BMP') NOT NULL,
    TamImagen FLOAT NOT NULL,
    Tempo INT DEFAULT 10 NOT NULL,
    FechaInicio DATE NOT NULL,
    FechaFinal DATE NOT NULL,
    Usuario VARCHAR(16) NOT NULL,
    CONSTRAINT Pk_Imagen PRIMARY KEY (IdImagen),
    CONSTRAINT Fk_Imagen_Usuario FOREIGN KEY (Usuario) REFERENCES Usuario (NombreUsuario)
);
