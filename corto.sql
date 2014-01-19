
CREATE DATABASE IF NOT EXISTS corto 
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE corto;

DROP TABLE IF EXISTS urls;
CREATE TABLE urls (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    url VARCHAR(50),
    titulo varchar (30),
    descripcion varchar(150),
    usuario INT REFERENCES usuarios(id_usuario)
);
DROP TABLE IF EXISTS links;
CREATE TABLE links (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    url VARCHAR(100),
    titulo varchar (10),
    descripcion varchar(150),
    usuario INT REFERENCES usuarios(id_usuario)
);
DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(15) UNIQUE,
    password VARCHAR(255),
    nombre VARCHAR(20),
    apellidos varchar(30),
    correo varchar (50)
);
DROP TABLE IF EXISTS visitas;
CREATE TABLE visitas (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    urlMini INT REFERENCES links(id),
    fecha DATE,
    web varchar (50),
    pais varchar (20),
    navegador varchar (20)
);
