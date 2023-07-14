DROP DATABASE IF EXISTS CIISGYM;
CREATE DATABASE CIISGYM;
USE CIISGYM;

CREATE TABLE prueba_dia (
cod_prueba int AUTO_INCREMENT,
nombre varchar(60),
apellido varchar(60),
email varchar(60),
turno varchar(25),
hora varchar(15),
fecha date,
PRIMARY KEY (cod_prueba)
);

CREATE TABLE blog (
cod_publicacion int AUTO_INCREMENT,
imagen varchar(200),
descripcion varchar(200),
PRIMARY KEY (cod_publicacion)
);

CREATE TABLE membrecia (
cod_plan int AUTO_INCREMENT,
nombre_plan varchar(50),
costo double,
duracion varchar(50),
PRIMARY KEY (cod_plan)
);

CREATE TABLE empleados (
cod_empleado int AUTO_INCREMENT,
puesto varchar(50),
nombre varchar(60),
apellido varchar(60),
DNI int,
telefono varchar(20),
email varchar(50),
acargo_prueba date,
PRIMARY KEY (cod_empleado)
);

CREATE TABLE sesion (
cod_turno int AUTO_INCREMENT,
cod_empleado int,
fecha date,
hora varchar(20),
turno varchar(20),
PRIMARY KEY (cod_turno),
FOREIGN KEY (cod_empleado) REFERENCES empleados(cod_empleado)
);

CREATE TABLE cliente (
id int AUTO_INCREMENT,
cod_turno int,
cod_publicacion int,
cod_plan int,
cod_prueba int,
nombre varchar(60),
apellido varchar(60),
email varchar(50),
DNI int,
telefono varchar(20),
contrasena varchar(50),
enfermedad varchar(50),
PRIMARY KEY (id),
FOREIGN KEY (cod_prueba) REFERENCES prueba_dia(cod_prueba),
FOREIGN KEY (cod_publicacion) REFERENCES blog(cod_publicacion),
FOREIGN KEY (cod_plan) REFERENCES membrecia(cod_plan),
FOREIGN KEY (cod_turno) REFERENCES sesion(cod_turno)
);
